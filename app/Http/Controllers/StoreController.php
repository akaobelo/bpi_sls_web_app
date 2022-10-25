<?php

namespace App\Http\Controllers;

use App\Imports\MasterStoreImport;
use Illuminate\Http\Request;
use App\Traits\ResponseApi;
use Illuminate\Support\Facades\Storage;
use App\Models\StoreMigration;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Store;
use App\Models\StoreCode;
use App\Models\BusinessUnit;
use App\Models\MasterPassword;
use App\Services\TpsConnection;
use Dompdf\Dompdf;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Throwable;
use Exception;

class StoreController extends Controller
{
    use ResponseApi;

    public function printBipTag(Request $request)
    {
        $data = (object) $request->all();
        $store_code = str_split($data->store_code);
        $trimedUPC = ltrim($data->upc,'0');
        $compact = ['store' => $data->store,
                    'receivedDate' => $data->receivedDate,
                    'sku' => $data->sku,
                    'quantity' => $data->quantity,
                    'type' => $data->type,
                    'short_descr' => $data->short_descr,
                    'buy_unit' => $data->buy_unit,
                    'ven_no' => $data->ven_no,
                    'price' => $data->price,
                    'after_price' => $data->after_price,
                    'barcode_vendor' => $data->barcode_vendor,
                    'store_code' => $store_code[0],
                    'upc' => $trimedUPC];

        $dompdf = new Dompdf();

        $dompdf->getOptions()->setChroot(public_path());

        switch ($request->type)
        {
            case 1 : // Hard Tag
                $dompdf->loadHtml(view('pages.partials.hard_tag',['data' => $compact]));
                $dompdf->set_option('dpi','60');
                $dompdf->render();
                $dompdf->stream('Hard-Tag.pdf', array('Attachment'=> 0));
                exit(0);
                // return view('pages.partials.hard_tag',['data' => $compact]);
            break;

            case 2 : // Hard Tag Markdown
                $dompdf->loadHtml(view('pages.partials.hard_tag',['data' => $compact]));
                $dompdf->set_option('dpi','60');
                $dompdf->render();
                $dompdf->stream('Hard-Tag-Markdown.pdf', array("Attachment" => 0));
                exit(0);
                // return view('pages.partials.hard_tag',['data' => $compact]);
            break;

            case 3 : //Sticker Tag (Ballpen)
                $dompdf->loadHtml(view('pages.partials.ballpen_tag',['data' => $compact]));
                $dompdf->set_option('dpi','45');
                $dompdf->render();
                $dompdf->stream('Sticker-Tag.pdf',array("Attachment" => 0));
                exit(0);
                // return view('pages.partials.ballpen_tag',['data' => $compact]);
            break;

            case 4 : // Sticker Tag Markdownn
                $dompdf->loadHtml(view('pages.partials.sticker_tag',['data' => $compact]));
                $dompdf->set_option('dpi','44');
                $dompdf->render();
                $dompdf->stream('Sticker-Tag-Markdown.pdf',array("Attachment" => 0));
                exit(0);
                // return view('pages.partials.sticker_tag',['data' => $compact]);
            break;

            case 5 : //Shelf Tag
                $dompdf->loadHtml(view('pages.partials.shelf_tag',['data' => $compact]));
                $dompdf->set_option('dpi','45');
                $dompdf->render();
                $dompdf->stream('Shelf-Tag.pdf',array("Attachment" => 0));
                exit(0);
                // return view('pages.partials.shelf_tag',['data' => $compact]);
            break;

            default:
                echo 'Empty';
        }
    }

    public function printSlsTag(Request $request)
    {

        $data = (object) $request->all();
        $trimedUPC = ltrim($data->upc,'0');
        $compact = ['store' => $data->store,
        'sku' => $data->sku,
        'quantity' => $data->quantity,
        'type' => $data->printing_type,
        'short_descr' => $data->short_descr,
        'color'   => $data->color,
        'material' => $data->material,
        'size' => $data->size,
        'price' => $data->price,
        'sale_price' => (isset($data->sale_price) ?  number_format($data->sale_price,2,'.',',') : ''),
        'product_specification' => $data->product_specification,
        'barcode_vendor' => $data->barcode_vendor,
        'upc' => $trimedUPC,
        'signageOption' => ($data->signage_option ? $data->signage_option : 'false')];

        $dompdf = new Dompdf();
        $dompdf->getOptions()->setChroot(public_path());
        switch($request->printing_type)
        {
            case 1:
                $dompdf->loadHtml(view('pages.partials.shelf_label',['data' => $compact]));
                $dompdf->set_option('dpi','85');
                $dompdf->set_paper('letter', 'portrait');
                $dompdf->render();
                $dompdf->stream('Shelf-Label.pdf',array("Attachment" => 0));
                exit(0);
                // return view('pages.partials.shelf_label',['data' => $compact]);
                break;
            case 2:
                $dompdf->loadHtml(view('pages.partials.signage',['data' => $compact]));
                $dompdf->set_option('dpi','180');
                $dompdf->setPaper('A4', 'landscape');
                $dompdf->render();
                $dompdf->stream('Signage.pdf', array("Attachment" => 0));
                exit(0);
                // return view('pages.partials.signage',['data' => $compact]);
                break;
            default:
                echo 'Empty';
        }
    }

    public function formData(Request $request)
    {
        return $request->all();
    }

    public function storeMigration()
    {
        $files = Storage::files('imports');
        $flag = false;

        foreach($files as $file)
        {
            $filename = explode('/',$file)[1];
           if(!StoreMigration::where('migration', $filename)->first()){
                Excel::import(new MasterStoreImport, $file);
                StoreMigration::create(['migration' => $filename]);
                $flag = true;
           }
        }

        if(!$flag) return $this->error('Nothing to migrate', 400);

        return $this->success('Success', null, 201);
    }

    public function bipIndexView()
    {
        return view('pages.bip.bip_index',['businessUnits' => BusinessUnit::get()]);
    }

    public function slsIndexView()
    {
        return view('pages.sls.sls_index',['businessUnits' => BusinessUnit::get()]);
    }

    public function getStoreInformation(Request $request, $barcode)
    {
        switch($request->code)
        {
            case 2001 :
                $tps = new TpsConnection('odbc_2001');
                return $tps->getItemBySKU($barcode);
                break;
            case 2003 :
                $tps = new TpsConnection('odbc_2003');
                return $tps->getItemBySKU($barcode);
                break;
            case 2006 :
                $tps = new TpsConnection('odbc_2006');
                return $tps->getItemBySKU($barcode);
                break;
            case 2008 :
                $tps = new TpsConnection('odbc_2008');
                return $tps->getItemBySKU($barcode);
                break;
            case 2009 :
                $tps = new TpsConnection('odbc_2009');
                return $tps->getItemBySKU($barcode);
                break;
            default:
                echo "Invalid Code";
                break;
        }

    }

    public function getStoreCodes($store_name)
    {
        $store = new TpsConnection('store_tps');
        return $store->getStoreByID($store_name);
    }

    public function fetchStoreData()
    {
        $tps = new TpsConnection('store_tps');
        $filtered_tps = array();
        foreach($tps->getStorelist() as $tps_data)
        {
            if(strlen($tps_data->store)  == 4)
            {
                $filtered_tps[] = $tps_data;
            }
        }
        return $filtered_tps;

    }

    // public function validateMasterKey($master_key)
    // {
    //     $currentPassword = MasterPassword::get();
    //     if(Hash::check($currentPassword[0]['master_key'],$master_key))
    //          $this->error('Invalid password', 404);
    //     return view('pages.master_settings');
    // }

    public function validatedData($storeCode)
    {
        $tps =  new TpsConnection('odbc_2001');
        return $tps->getValidatedData();
    }

}
