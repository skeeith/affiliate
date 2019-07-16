<?php

namespace App\Repositories;

use App\Article;

class ArticleRepository extends Repository
{
    /**
     * Create new instance of article repository.
     *
     * @param Article $article Article model
     */
    public function __construct(Article $article)
    {
        parent::__construct($article);
        $this->article = $article;
    }
}
