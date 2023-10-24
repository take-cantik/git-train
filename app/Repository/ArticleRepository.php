<?php

namespace app\Repository;

use App\Entity\Article;

interface ArticleRepository
{
    /**
     * @param Article $article
     * @return void
     */
    public function save(Article $article): void;
}
