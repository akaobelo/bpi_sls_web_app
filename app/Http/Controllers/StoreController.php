<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ResponseApi;
use App\Models\Configuration;
use Illuminate\Support\Facades\DB;
use App\Interfaces\StoreInterface;
use Throwable;
use Exception;



class StoreController extends Controller
{
    protected $storeInterface;

    public function __construct(StoreInterface $storeInterface)
    {
        $this->storeInterface = $storeInterface;
    }

    public function index(){
        return view('pages.index',['configuration' => Configuration::firstOrFail()]);
    }
    public function updateConfiguration(Request $request)
    {
        return $this->storeInterface->updateConfiguration($request);
    }

    public function printSlsTag(Request $request)
    {
        return $this->storeInterface->printSlsTag($request);
    }
    public function bipIndexView()
    {
        $COMPUTERNAME = $_SERVER['REMOTE_ADDR'];
        return view('pages.bip.bip_index',['configuration' => Configuration::firstOrFail(),
                                           'compName' => $COMPUTERNAME]);
    }

    public function slsIndexView()
    {
        return view('pages.sls.sls_index',['configuration' => Configuration::firstOrFail()]);
    }

    public function getStoreInformation(Request $request, $barcode)
    {
        return $this->storeInterface->getStoreInformation($request, $barcode);

    }

    public function getStoreCodes($store_name)
    {
        return $this->storeInterface->getStoreCodes($store_name);
    }

    public function fetchStoreData()
    {
        return $this->storeInterface->fetchStoreData();
    }

    public function validateMasterKey($master_key)
    {
       return $this->storeInterface->validateMasterKey($master_key);
    }

}
