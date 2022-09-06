<?php

namespace App\Services;
use Illuminate\Support\Facades\DB;
class TpsConnection {
    protected  $db;

    public function __construct($dsn)
    {
        $this->db = DB::connection($dsn);
    }

    public function getItemBySKU($sku)
    {
        return $this->db->table('invmst')->select('sku','upc','short_descr','price','ven_no','vendor','buy_unit')->where('sku',$sku)->get()->toArray();
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
