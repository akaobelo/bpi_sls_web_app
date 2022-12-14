<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Hash;
use App\Interfaces\StoreInterface;
use App\Models\MasterPassword;
use App\Models\Configuration;
use App\Services\TpsConnection;
use Dompdf\Dompdf;

use App\Traits\ResponseApi;

class StoreRepository implements StoreInterface
{
    use ResponseApi;

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

    public function getStoreCodes($store_name)
    {
        $store = new TpsConnection('store_tps');
        return $store->getStoreByID($store_name);
    }

    public function updateConfiguration($request)
    {
        $configuration = Configuration::firstOrFail();
        switch($request->disabling)
        {
            case 1:
                $configuration->update(['printer_name' => $request->printer_name,
                                        'bip_config' => 2,
                                        'sls_config' => 1]);
            break;
            case 2:
                $configuration->update(['printer_name' => $request->printer_name,
                                        'bip_config' => 1,
                                        'sls_config' => 2]);
            break;
            case 3:
                $configuration->update(['printer_name' => $request->printer_name,
                                        'bip_config' => 2,
                                        'sls_config' => 2]);
            break;
            case 4:
                $configuration->update(['printer_name' => $request->printer_name,
                                        'bip_config' => 1,
                                        'sls_config' => 1]);
            break;

        }
        return $this->success('Configuration updated', $configuration, 201);
    }

    public function printSlsTag($request)
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
        'product_specification' => (isset($data->product_specification) ? $data->product_specification : array()),
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
                break;
            case 2:
                $dompdf->loadHtml(view('pages.partials.signage',['data' => $compact]));
                $dompdf->set_option('dpi','180');
                $dompdf->setPaper('A4', 'landscape');
                $dompdf->render();
                $dompdf->stream('Signage.pdf', array("Attachment" => 0));
                exit(0);
                break;
            default:
                echo 'Empty';
        }
    }

    public function validateMasterKey($master_key)
    {
        $currentPassword = MasterPassword::get();
        if(Hash::check($master_key,$currentPassword[0]['master_key'])){
            return $this->success('Success', null, 201);
        }else{return $this->error('Error', 400);}
    }

    public function getStoreInformation($request, $barcode)
    {
        $barcode_append = str_pad($barcode,18,"0",STR_PAD_LEFT);
        $tps = new TpsConnection("odbc_".$request->code);
        switch($request->code)
        {
            case 2001 :
                return $this->resultItemBySku($tps->getItemBySKU($barcode_append));
                break;
            case 2003 :
                return $this->resultItemBySku($tps->getItemBySKU($barcode_append));
                break;
            case 2006 :
                return $this->resultItemBySku($tps->getItemBySKU($barcode_append));
                break;
            case 2008 :
                return $this->resultItemBySku($tps->getItemBySKU($barcode_append));
                break;
            case 2009 :
                return $this->resultItemBySku($tps->getItemBySKU($barcode_append));
                break;
            case 1001 :
                return $this->resultItemBySku($tps->getItemBySKU($barcode_append));
                break;
            case 1010 :
                return $this->resultItemBySku($tps->getItemBySKU($barcode_append));
                break;
            case 2010 :
                return $this->resultItemBySku($tps->getItemBySKU($barcode_append));
                break;
            case 3001 :
                return $this->resultItemBySku($tps->getItemBySKU($barcode_append));
                break;
            case 3009 :
                return $this->resultItemBySku($tps->getItemBySKU($barcode_append));
                break;
            case 6001 :
                return $this->resultItemBySku($tps->getItemBySKU($barcode_append));
                break;
            default:
                return "Item Not Found";
                break;
        }

    }

    private function resultItemBySku($result)
    {
        return ($result ? $result : $result);
    }


}
