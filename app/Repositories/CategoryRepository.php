<?php

namespace App\Repositories;

use App\Category;

class CategoryRepository extends Repository
{
    /**
     * Create new instance of category repository.
     *
     * @param Category $category Category model
     */
    public function __construct(Category $category)
    {
        parent::__construct($category);
        $this->category = $category;
    }
}
