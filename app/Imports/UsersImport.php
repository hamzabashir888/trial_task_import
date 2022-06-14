<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class UsersImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function startRow(): int
    {
        return 2;
    }
    public function model(array $row)
    {
//        dd($row);
        return new User([
            'name'     => $row[0],
            'email'    => $row[1],
            'department' => $row[2],
            'title' => $row[3],
        ]);
    }

//    public function uniqueBy()
//    {
//        return 'email';
//    }
}
