<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ResponseApi;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\MasterPassword;
use App\Models\Configuration;
use App\Services\TpsConnection;
use Dompdf\Dompdf;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Throwable;
use Exception;

class StoreController extends Controller
{
    use ResponseApi;

    function index()
        return view('pages.index',['configuration' => Configuration::firstOrFail()]);
    }
    function updateConfiguration(Request $request)
    {
        $configuration = Configuration::firstOrFail();
        switch($request->disabling)
        {
            case 1:
                $configuration->update(['printer_name' => $request->printer_name,
                                        'bip_config' => 2,
                                        'sls_config' => 1]);
            case 2:
                $configuration->update(['printer_name' => $request->printer_name,
                                        'bip_config' => 1,
                                        'sls_config' => 2]);
            case 3:
                $configuration->update(['printer_name' => $request->printer_name,
                                        'bip_config' => 2,
                                        'sls_config' => 2]);
            case 4:
                $configuration->update(['printer_name' => $request->printer_name,
                                        'bip_config' => 1,
                                        'sls_config' => 1]);

        return $this->success('Configuration updated', $configuration, 201);

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
    public function bipIndexView()
    {
        return view('pages.bip.bip_index',['configuration' =>  Configuration::firstOrFail()]);
    }

    public function slsIndexView()
    {
        return view('pages.sls.sls_index',['configuration' => Configuration::firstOrFail()]);
    }

    public function getStoreInformation(Request $request, $barcode)
    {
        $barcode_append = str_pad($barcode,18,"0",STR_PAD_LEFT);
        switch($request->code)
        {
            case 2001 :
                $tps = new TpsConnection('odbc_2001');
                return $tps->getItemBySKU($barcode_append);
                break;
            case 2003 :
                $tps = new TpsConnection('odbc_2003');
                return $tps->getItemBySKU($barcode_append);
                break;
            case 2006 :
                $tps = new TpsConnection('odbc_2006');
                return $tps->getItemBySKU($barcode_append);
                break;
            case 2008 :
                $tps = new TpsConnection('odbc_2008');
                return $tps->getItemBySKU($barcode_append);
                break;
            case 2009 :
                $tps = new TpsConnection('odbc_2009');
                return $tps->getItemBySKU($barcode_append);
                break;
            case 1001 :
                $tps = new TpsConnection('odbc_1001');
                return $tps->getItemBySKU($barcode_append);
                break;
            case 1010 :
                $tps = new TpsConnection('odbc_1010');
                return $tps->getItemBySKU($barcode_append);
                break;
            case 2010 :
                $tps = new TpsConnection('odbc_2010');
                return $tps->getItemBySKU($barcode_append);
                break;
            case 3001 :
                $tps = new TpsConnection('odbc_3001');
                return $tps->getItemBySKU($barcode_append);
                break;
            case 3009 :
                $tps = new TpsConnection('odbc_3009');
                return $tps->getItemBySKU($barcode_append);
                break;
            case 6001 :
                $tps = new TpsConnection('odbc_6001');
                return $tps->getItemBySKU($barcode_append);
                break;
            default:
                echo "Item Not Found";
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
        if(Hash::check($master_key,$currentPassword[0]['master_key'])){
            return $this->success('Success', null, 201);
        }else{return $this->error('Error', 400);}
    // }

}
