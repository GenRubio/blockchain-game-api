<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Repositories\BlogArticle\BlogArticleRepository;
use App\Repositories\BlogArticle\BlogArticleRepositoryInterface;

/**
 * Class BlogArticleService
 * @package App\Services\BlogArticle
 */
class BlogArticleService extends Controller
{
    private $blogArticleRepository;

    /**
     * BlogArticleService constructor.
     * @param BlogArticleRepositoryInterface $blogArticleRepository
     */
    public function __construct()
    {
        $this->blogArticleRepository = new BlogArticleRepository();
    }

    public function index()
    {
        return $this->blogArticleRepository->getIndexData();
    }

    public function show($sonPageSlug)
    {
        return $this->blogArticleRepository->getBlogArticle($sonPageSlug);
    }
}
