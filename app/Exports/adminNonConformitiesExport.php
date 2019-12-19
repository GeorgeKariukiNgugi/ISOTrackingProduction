<?php

namespace App\Exports;

use App\NonConformities;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class adminNonConformitiesExport implements FromQuery,ShouldAutoSize,WithHeadings
{

    use Exportable;

    public function __construct(string $type)
    {
        $this->type = $type;
        // $this->status = $status;
    }

    public function query()
    {
        $excelData =  NonConformities::query()->where('openClosed',$this->type)->get();
    
         //!counting the returned results.
         if (count($excelData) <1) {
             # code...
             return "No data has been found.";
         } else {
             # code..
             return  NonConformities::query()->where('openClosed',$this->type);
         }
                                       
    }

    public function headings(): array
    {
        return [
            '#',
            'Year',
            'Quater',
            'Root Cause',
            'Status',
            'Permanent Solution',
            'Closure Date'
        ];
    }
    
}
