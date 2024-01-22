<?php

namespace App\Imports;

use App\Models\City;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\RemembersRowNumber;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Validators\Failure;

class CustomerImport implements ToModel, WithBatchInserts, WithChunkReading, WithHeadingRow, WithProgressBar, WithUpserts
{
    use Importable, RemembersRowNumber;

    /**
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $city = City::updateOrCreate([
            'name' => $row['city'],
        ]);

        return $city->customers()->create([
            'name' => $row['name'],
            'email' => $row['email'],

        ]);

    }

    public function batchSize(): int
    {
        return 20;
    }

    public function uniqueBy()
    {
        return 'email';
    }

    public function chunkSize(): int
    {
        return 500;
    }

    public function onFailure(Failure ...$failures)
    {

    }
}
