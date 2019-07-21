<?php

namespace App\Imports;

use App\Brand;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BrandsImport implements ToCollection, WithHeadingRow, WithChunkReading, WithBatchInserts
{
    use Importable, SkipsFailures, SkipsErrors;

    /**
     *
     * @param \Illuminate\Support\Collection $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        $partner_id = 2;

        foreach ($rows as $row) {
            if ($row['brand_name'] != '' || $row['brand_name'] != null) {
                if (! cache()->has($partner_id . $row['brand_name']) && (strpos($row['brand_name'], 'http://') === false || strpos($row['brand_name'], 'https://') === false)) {
                    cache()->put($row['brand_name'], $row['brand_name'], 600);

                    Brand::firstOrCreate([
                        'partner_id' => $partner_id,
                        'name'       => $row['brand_name']
                    ]);
                }
            }
        }
    }

    /**
     * Batch inserts.
     *
     * @return int
     */
    public function batchSize(): int
    {
        return 5000;
    }

    /**
     * Chunk reading.
     *
     * @return int
     */
    public function chunkSize(): int
    {
        return 5000;
    }
}
