<?php

namespace App\Services;
use App\Traits\ResponseApi;
use Illuminate\Support\Facades\DB;
class TpsConnection {
    protected  $db;
    use ResponseApi;

    public function __construct($dsn)
    {
        $this->db = DB::connection($dsn);
    }

    public function getItemBySKU($sku)
    {

        $data = $this->db->table('invmst')->select('sku','upc','short_descr','price','ven_no','vendor','buy_unit');
        if(strlen($sku) == 9)
        {
           return $data->where('sku',$sku)->get()->toArray();
        }else
        {
          $invupc = $this->db->table('invupc')->select('sku','upc')->Where('upc',$sku)->get();
        if(!empty($invupc[0])){
            $invmst = $data->where('sku',$invupc[0]->sku)->get();
            $compact = [
            'sku' => $invupc[0]->sku,
            'short_descr' => $invmst[0]->short_descr,
            'buy_unit' => $invmst[0]->buy_unit,
            'ven_no' => $invmst[0]->ven_no,
            'price' => $invmst[0]->price,
            'vendor' => $invmst[0]->vendor,
            'upc' => $invupc[0]->upc];
            return array($compact);
        }else{
            return $this->error('Not Found!', 400);
        }

        }
    }

    public function getStorelist()
    {
        return $this->db->table('strmst')->select('store','name')->get()->toArray();
    }

    public function getStoreByID($store_name)
    {
        return $this->db->table('strmst')->select('store')->where('name', $store_name)->get()->toArray();
    }
}
