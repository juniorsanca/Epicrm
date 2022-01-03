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
            //'state_id' => $row[2],
            'state' => $row[2],
            'coast' => $row[3],
            'origin' => $row[4],
            'next_action'=> $row[5],
            'date_action' => $row[6],
            'action_state'=> $row[7],
            'email' => $row[8],
            'phone' => $row[9],
            'description' => $row[10]
        ]);
    }
}
