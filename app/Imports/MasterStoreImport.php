<?php

namespace App\Imports;


use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\BusinessUnit;
use App\Models\Store;
use App\Models\StoreCode;

class MasterStoreImport implements ToCollection{

    public function collection(Collection $rows)
    {
        $customer_number = '';
        foreach ($rows as $key => $row)
        {
            if($key > 1){
                if(!in_array('',[$row[0],$row[1],$row[2]]))
                {
                  $bu = BusinessUnit::updateOrCreate(['business_unit' => $row[0]],['business_unit' => $row[0]]);
                  $store = $bu->stores()->create(['store' => $row[1]]);
                  $storeCode = $store->storeCode()->create(['store_code' => $row[2]]);

                }
            }
        }

    }

}
