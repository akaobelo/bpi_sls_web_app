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
}
