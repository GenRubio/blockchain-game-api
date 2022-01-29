<?php

namespace App\Repositories\BlogArticle;

/**
 * Interface BlogArticleRepositoryInterface
 * @package App\Repositories\BlogArticle
 */
interface BlogArticleRepositoryInterface
{
    public function getIndexData();
    public function getBlogArticle($slug);
}
