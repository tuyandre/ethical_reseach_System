<?php

namespace App\Imports;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if ($row[0] !="first_name") {

                $user = User::create([
                    'first_name' => $row[0],
                    'last_name' => $row[1],
                    'full_name' => $row[2],
                    'telephone' => $row[3],
                    'date' =>date("Y-m-d ", $row[4]) ,
                    'email' => $row[5],
                    'password' => Hash::make($row[6]),
                    'gender' => $row[7],
                    'district1' => $row[8],
                    'district2' => $row[9],
                    'district3' => $row[10],
                    'education' => $row[11],
                    'fields' => $row[12],
                    'country' => $row[13],
                ]);

        }
    }
}
