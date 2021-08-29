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
        $role = Role::where('name', $row[0])->first();

        $user = User::create([
            'role_id'          => $role->id,
            'first_name'          => $row[1],
            'last_name'          => $row[2],
            'full_name'          => $row[1]." ".$row[2],
            'telephone'          => $row[4],
            'country'            => $row[16],
            'confirmed'          => $row[8],
            'activated'          => $row[9],
            'date'               => $row[5],
            'district1'          => $row[11],
            'district2'          => $row[12],
            'district3'          => $row[13],
            'education'          => $row[14],
            'fields'            => $row[15],
            'gender'            => $row[10],
            'email'             => $row[6],
            'password'          =>Hash::make($row[7]),
        ]);
        $user->attachRole($role);
//        return $user;

    }
}
