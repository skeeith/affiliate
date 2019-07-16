<?php

namespace App\Repositories;

use App\Brand;

class BrandRepository extends Repository
{
    /**
     * Create new instance of brand repository.
     *
     * @param Brand $brand Brand model
     */
    public function __construct(Brand $brand)
    {
        parent::__construct($brand);
        $this->brand = $brand;
    }
}
