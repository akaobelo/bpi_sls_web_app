<?php

namespace App\Services;
use Illuminate\Support\Facades\DB;
class TpsConnection {
    protected  $db;

    public function __construct($dsn)
    {
        $this->db = DB::connection($dsn);
    }

    public function getValidatedData()
    {
        // $this->db->table('invmst')
        //         ->join('invupc','invmst.sku', '=', 'invupc.sku')
        //         ->select('invmst.sku','invmst.short_descr','invmst.price','invmst.ven_no','invupc.upc')
        //         ->get();

        // return $data;
    }

    public function getItemBySKU($sku)
    {
        $data = $this->db->table('invmst')->select('sku','upc','short_descr','price','ven_no','vendor','buy_unit');
        if(strlen($sku) == 9)
        {
           return $data->where('sku',$sku)->get()->toArray();
        }else
        {
          return  $data->Where('upc',$sku)->get()->toArray();
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
