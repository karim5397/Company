<?php

namespace App\Exports;

use App\Models\ContactForm;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportForm implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Phone',
            'Message',
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ContactForm::select('name','email','subject','message')->get();
    }
}
