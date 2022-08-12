<?php

namespace App\Imports;


use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Store;

class MasterStoreImport implements ToCollection{

    public function collection(Collection $rows)
    {
        $customer_number = '';
        foreach ($rows as $key => $row)
        {
            if($key > 1){
                if(!in_array('',[$row[0],$row[1],$row[2]]))
                {
                    Store::updateOrCreate(['store_code' => $row[2]],[
                        'business_unit' => $row[0],
                        'store' =>         $row[1],
                        'store_code' =>    $row[2]
                    ]);
                }
            }
        }

    }

}
