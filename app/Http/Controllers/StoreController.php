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

class StoreController extends Controller
{
    use ResponseApi;

    public function printTag(Request $request)
    {
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('pages.partials.printOutTags'));
        $dompdf->render();
        $dompdf->stream();
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
