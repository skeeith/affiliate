<?php

namespace App\Imports;

use App\Category;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CategoriesImport implements ToCollection, WithHeadingRow, WithChunkReading, WithBatchInserts
{
    use Importable, SkipsFailures, SkipsErrors;

    /**
     *
     * @param \Illuminate\Support\Collection $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $project_id = 2;

            // for no delimiter
            /*if ($row['merchant_product_category_path'] != '' || $row['merchant_product_category_path'] != null) {
                if (! cache()->has($project_id . $row['merchant_product_category_path'])) {
                    cache()->put($project_id . $row['merchant_product_category_path'], $project_id . $row['merchant_product_category_path'], 600);

                    Category::firstOrCreate([
                        'project_id' => $project_id,
                        'name'       => $row['merchant_product_category_path']
                    ]);
                }
            }*/

            // for with delimiter ">"
            if ($row['merchant_product_category_path'] != '' || $row['merchant_product_category_path'] != null) {
                if (! cache()->has($project_id . $row['merchant_product_category_path'])) {
                    cache()->put($project_id . $row['merchant_product_category_path'], $project_id . $row['merchant_product_category_path'], 600);

                    $categories = explode('>', $row['merchant_product_category_path']);
                    $total = count($categories) - 1;

                    for ($i = 0; $i <= $total; $i++) {
                        $category = trim($categories[$i]);

                        if ($i == 0) {
                            Category::firstOrCreate([
                                'project_id' => $project_id,
                                'name'       => $category
                            ]);
                        } else {
                            $i--;
                            $category = trim($categories[$i]);
                            $parentCategory = Category::where('project_id', $project_id)->where('name', $category)->first();

                            $i++;
                            $category = trim($categories[$i]);
                            $newCategory = Category::firstOrCreate([
                                'project_id' => $project_id,
                                'name'       => $category
                            ]);

                            if ($parentCategory) {
                                $newCategory->parent_id = $parentCategory->id;
                                $newCategory->save();
                            }
                        }
                    }
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
