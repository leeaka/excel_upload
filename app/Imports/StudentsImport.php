<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;

class StudentsImport implements ToModel, WithChunkReading
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        return new Student([
            'Serial_Number' => $row[0],
            'Employee_Markme' => $row[1],
            'Description' => $row[2],
            'Leave' => $row[3],
        ]);
    }

    public function rules(): array
    {
        return [
            'Serial_Number' => [
                'required',
                'string',
            ],
            'Employee_Markme' => [
                'required',
                'string',
            ],
            'Description' => [
                'required',
                'string',
            ],
            'Leave' => [
                'required',
                'string',
            ],
        ];
    }

    public function startRow(): int
    {
        return 1;
    }

    public function batchSize(): int
    {
        return 500;
    }

    public function chunkSize(): int
    {
        return 500;
    }


}
