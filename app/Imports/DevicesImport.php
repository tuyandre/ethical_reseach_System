<?php

namespace App\Imports;

use App\Models\Device;
use Maatwebsite\Excel\Concerns\ToModel;

class DevicesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Device([
            'device_name'          => $row[0],
            'device_brand'         => $row[1],
            'device_model'          => $row[2],
            'device_serialNo'       => $row[3],
            'device_imei1'          => $row[4],
            'device_imei2'          => $row[5],
        ]);
    }
}
