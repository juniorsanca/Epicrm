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
            'date' => $row[0],
            'client' => $row[1],
            'company' => $row[2],
            'state_id' => 1,
            'coast' => $row[3],
            'origin' => $row[4],
            'next_action'=> $row[5],
            'action_state'=> $row[6],
            'email' => $row[7],
            'phone' => $row[8],
            'description' => $row[9],

        ]);
    }
}
