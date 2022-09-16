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
use App\Services\TpsConnection;
use Dompdf\Dompdf;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;

class StoreController extends Controller
{
    use ResponseApi;

    public function printTag(Request $request)
    {


        // foreach(json_decode($data, true) as $key => $elem)
        // {
        //     dump(json_decode($data, true));
        // }
        $data = (object) $request->all();
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
                    'barcode_vendor' => $data->barcode_vendor];

        // $dompdf = new Dompdf();
        // $dompdf->getOptions()->setChroot(public_path());
        // $dompdf->loadHtml(view('pages.partials.hard_tag',['data' => $compact]));
        // $dompdf->render();
        // $dompdf->stream();

        switch ($request->type)
        {
            case 1 : // Hard Tag
                return view('pages.partials.hard_tag',['data' => $compact]);
            break;

            case 2 : // Hard Tag Markdown
                return view('pages.partials.hard_tag',['data' => $compact]);
            break;

            case 3 : //Sticker Tag (Ballpen)
                return view('pages.partials.ballpen_tag',['data' => $compact]);
            break;

            case 4 : // Sticker Tag Markdownn
                return view('pages.partials.sticker_tag',['data' => $compact]);
            break;

            case 5 : //Shelf Tag
                return view('pages.partials.shelf_tag',['data' => $compact]);
            break;

            default:
                echo 'Wala';
        }

        // $connector = new FilePrintConnector("php://stdout");

        // $printer = new Printer($connector);
        // $printer -> text("Hello World!\n");
        // dd($printer);
        // $printer -> cut();
        // $printer -> close();
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
                throw new Error('Invalid Code', 400);
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


}
