<?php

namespace App\Repositories\BlogArticle;

use App\Models\BlogArticle;
use App\Repositories\Repository;


/**
 * Class BlogArticleRepository
 * @package App\Repositories\BlogArticle
 */
class BlogArticleRepository extends Repository implements BlogArticleRepositoryInterface
{
    /**
     * @var int Limit for retrieve data
     */
    protected $limit;

    /**
     * @var BlogArticle
     */
    protected $model;

    /**
     * BlogArticleRepository constructor.
     * @param BlogArticle $blog_article
     */
    public function __construct()
    {
        $this->model = new BlogArticle();
        parent::__construct($this->model);
        $this->limit = 5;
    }

    public function getIndexData()
    {
        return $this->model->published()->datePast()->limit($this->limit)->get();
    }

    public function getBlogArticle($slug)
    {
        return $this->model->published()->datePast()->whereSlug($slug)->firstOrFail();
    }
}
