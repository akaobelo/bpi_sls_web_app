<?php

namespace App\Imports;

use App\Models\MasterContract;
use App\Models\MasterTenant;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;


class MasterTenantImport implements ToCollection{

    public function collection(Collection $rows)
    {
        $customer_number = '';
        foreach ($rows as $key => $row)
        {
            if($key > 5){

                if(!in_array('',[$row[0],$row[1],$row[2],$row[3],$row[4]]) && $row[13] == 'Operational'){
                    if($customer_number != $row[4]){

                        MasterTenant::updateOrCreate(['lease_number' => $row[1]],[
                            'lease_number' => $row[1],
                            'person_responsible'=> $row[0],
                            'tenant' => $row[2],
                            'customer_name' => $row[3],
                            'tenant_number' => $row[4],
                            'location' => $row[7].''.$row[8]
                        ]);

                        MasterContract::updateOrCreate(['lease_number' => $row[1]],[
                            'lease_number' => $row[1],
                            'location' => $row[7].''.$row[8],
                            'unit_code' => $row[9],
                            'business_type' => $row[10],
                            'business_line' => $row[11],
                            'unit_type' => $row[12],
                            'status' => $row[13],
                            'floor_area' => $row[16],
                            'lease_term_start' => date("Y-m-d",strtotime($row[19])),
                            'lease_term_end' => date("Y-m-d",strtotime($row[20])),
                            'tenant_number' => $row[4],
                            'lessee' => $row[45],
                            'owner' => $row[46],
                            'address' => $row[47]
                        ]);
                    }

                }
                $customer_number = $row[4];
            }
        }

    }

}
