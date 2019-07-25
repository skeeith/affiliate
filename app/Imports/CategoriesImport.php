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
            $project_id = 1;

            // for no delimiter
            if ($row['merchant_category'] != '' || $row['merchant_category'] != null) {
                if (! cache()->has($project_id . $row['merchant_category'])) {
                    cache()->put($project_id . $row['merchant_category'], $project_id . $row['merchant_category'], 600);

                    $categoryName = trim($row['merchant_category']);
                    $categoryName = utf8_encode($categoryName);
                    Category::firstOrCreate([
                        'project_id' => $project_id,
                        'name'       => $categoryName
                    ]);
                }
            }

            // for with delimiter ">"
            /*if ($row['merchant_product_category_path'] != '' || $row['merchant_product_category_path'] != null) {
                if (! cache()->has($project_id . $row['merchant_product_category_path'])) {
                    cache()->put($project_id . $row['merchant_product_category_path'], $project_id . $row['merchant_product_category_path'], 600);

                    $categories = explode('>', $row['merchant_product_category_path']);
                    $total = count($categories) - 1;

                    for ($i = 0; $i <= $total; $i++) {
                        if ($i == 0) {
                            $categoryName = trim($categories[$i]);
                            $categoryName = utf8_encode($categoryName);

                            Category::firstOrCreate([
                                'project_id' => $project_id,
                                'name'       => $categoryName
                            ]);
                        } else {
                            $i--;
                            $categoryName = trim($categories[$i]);
                            $categoryName = utf8_encode($categoryName);
                            $parentCategory = Category::where('project_id', $project_id)->where('name', $categoryName)->first();

                            $i++;
                            $categoryName = trim($categories[$i]);
                            $categoryName = utf8_encode($categoryName);

                            $newCategory = Category::firstOrCreate([
                                'project_id' => $project_id,
                                'name'       => $categoryName
                            ]);

                            if ($parentCategory) {
                                $newCategory->parent_id = $parentCategory->id;
                                $newCategory->save();
                            }
                        }
                    }
                }
            }*/
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
