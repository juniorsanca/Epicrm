<?php

namespace App\Imports;

use App\Lead;
use Maatwebsite\Excel\Concerns\ToModel;
//use Maatwebsite\Excel\Concerns\withHeadingRow;

class LeadsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Lead([
            'client' => $row[0],
            'company' => $row[1],
            'coast' => $row[2],
            'origin' => $row[3],
            'state' => $row[4],
            'email' => $row[5],
            'phone' => $row[6],
            'description' => $row[7],
        ]);
    }
}
