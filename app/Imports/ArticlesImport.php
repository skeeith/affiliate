<?php

namespace App\Imports;

use App\Article;
use App\Brand;
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

class ArticlesImport implements ToCollection, WithHeadingRow, WithChunkReading, WithBatchInserts
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
            $categoryId   = null;
            $brandId      = null;
            $product_id   = null;
            $displayPrice = null;
            $oldPrice     = null;
            $number       = null;
            $stockStatus  = 0;
            $partner_id   = 2;
            $project_id   = 2;

            $cache = $row['aw_image_url'] . $row['product_name'] . $row['merchant_product_id'] . $row['merchant_deep_link'] . $row['product_short_description'] . $row['display_price'] . $row['product_price_old'] . $row['in_stock'] . $row['is_for_sale'] . $row['stock_status'];

            if (! cache()->has($cache)) {
                cache()->put($cache, $cache, 600);

                if ($row['brand_name'] != '' || $row['brand_name'] != null) {
                    $brandId = Brand::where('name', $row['brand_name'])->where('partner_id', $partner_id)->first()->id;
                } else {
                    $brandId = null;
                }

                // for no delimiter
                /*if ($row['merchant_category'] != '' || $row['merchant_category'] != null) {
                    $categoryId = Category::where('name', $row['merchant_category'])->first()->id;
                } else {
                    $categoryId = null;
                }*/

                // for with delimiter >
                if ($row['merchant_product_category_path'] != '' || $row['merchant_product_category_path'] != null) {
                    $categories = explode('>', $row['merchant_product_category_path']);
                    $index = count($categories) - 1;
                    $categoryName = trim($categories[$index]);

                    cache()->put('category', $categoryName, 600);
                    $categoryId = Category::where('name', $categoryName)->where('project_id', $project_id)->value('id');
                } else {
                    $categoryId = null;
                }

                if ($row['merchant_product_id'] != '' || $row['merchant_product_id'] != null) {
                    $product_id = $row['merchant_product_id'];
                } else {
                    $product_id = null;
                }

                if ($row['display_price'] != '' || $row['display_price'] != null) {
                    $price = (double) str_replace('EUR', '', $row['display_price']);

                    if ($price != 0 && $price < 99999) {
                        $diplayPrice = $price;
                    } else {
                        $diplayPrice = null;
                    }
                } else {
                    $diplayPrice = null;
                }

                if ($row['product_price_old'] != '' || $row['product_price_old'] != null) {
                    $price = (double) $row['product_price_old'];

                    if ($price != 0 && $price < 99999) {
                        $oldPrice = $price;
                    } else {
                        $oldPrice = null;
                    }
                } else {
                    $oldPrice = null;
                }

                if ($row['stock_status'] != '' || $row['stock_status'] != null) {
                    $number = (int) $row['stock_status'];

                    if ($number == 1) {
                        $stockStatus = 1;
                    } else {
                        $stockStatus = 0;
                    }
                } else {
                    $stockStatus = 0;
                }

                Article::firstOrCreate([
                    'user_id'           => 1,
                    'partner_id'        => 2,
                    'category_id'       => $categoryId, // merchant_category_name or merchant_product_category_path
                    'brand_id'          => $brandId, // brand_name
                    'image'             => $row['aw_image_url'],
                    'name'              => $row['product_name'],
                    'number'            => $product_id, // merchant_product_id
                    'deep_link'         => $row['merchant_deep_link'],
                    'short_description' => $row['product_short_description'],
                    'price'             => $diplayPrice, // display_price
                    'old_price'         => $oldPrice, // product_price_old
                    'in_stock'          => $row['in_stock'],
                    'is_for_sale'       => $row['is_for_sale'],
                    'stock_status'      => $stockStatus
                ]);
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
