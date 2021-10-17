<?php

namespace App\Exports;

use App\Models\Patient;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PatientsExport implements FromQuery, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    public function query()
    {
        return Patient::query();
    }

    public function headings(): array
    {
        return [
            '#',
            'First Name',
            'Last Name',
            'Gender',
            'DOB',
            'Date Created',
            'BP readings'
        ];
    }

    public function map($patient): array
    {
        return [
            $patient->id,
            $patient->first_name,
            $patient->last_name,
            $patient->gender,
            $patient->date_of_birth,
            $patient->created_at,
            $patient->readings->count
        ];
    }

    public function fields(): array
    {
        return [
            'id',
            'first_name',
            'last_name',
            'gender',
            'date_of_birth',
            'created_at',
            'readings'
        ];
    }
}
