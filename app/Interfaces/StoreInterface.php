<?php

namespace App\Interfaces;

interface StoreInterface
{
    public function updateConfiguration($request);

    public function validateMasterKey($master_key);

    public function printSlsTag($request);

    public function getStoreInformation($request, $barcode);

    public function getStoreCodes($store_name);

    public function fetchStoreData();
}
