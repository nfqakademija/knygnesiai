<?php

namespace App\Controller\ControllerApi;


use App\Service\CategoryService;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * Class CategoryController
 * @package App\Controller\
 */
class CategoryController extends FOSRestController
{
    /**
     * @Rest\Get("/categories")
     * @param CategoryService $categoryService
     *
     * @return View
     */
    public function index(CategoryService $categoryService): View
    {
        $categories= $categoryService->setReturnQuery(false)->getAll();
        return View::create($categories, Response::HTTP_OK);

    }

}