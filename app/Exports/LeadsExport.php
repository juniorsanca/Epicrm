<?php

namespace App\Exports;

use App\Lead;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LeadsExport implements FromCollection, WithHeadings
{
    public function headings():array{
        return[
            'date',
            'client',
            'company',
            'state_id',
            'coast',
            'origin',
            'next_action',
            'action_state',
            'email',
            'phone',
            'description',

        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        //return Lead::all();
        return collect(Lead::getLead());
    }
}
