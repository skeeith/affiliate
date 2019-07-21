<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow, WithChunkReading, WithBatchInserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name'     => $row['name'],
            'email'    => $row['email'],
            'password' => $row['password']
        ]);
    }

    /**
     * Batch inserts.
     *
     * @return int
     */
    public function batchSize(): int
    {
        return 1000;
    }

    /**
     * Chunk reading.
     *
     * @return int
     */
    public function chunkSize(): int
    {
        return 1000;
    }
}
