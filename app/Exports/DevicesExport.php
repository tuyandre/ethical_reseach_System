<?php

namespace App\Exports;

use App\Models\Device;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DevicesExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Device::all();
    }
    public function headings(): array
    {
        return [
            'ID',
            'Device Name',
            'Device Brand',
            'Device Model',
            'Device Serial No',
            'Device IMEI 1',
            'Device IMEI 2',
            'Status',
            'User Id',
            'Created At',
            'Updated At',
        ];
    }
}
