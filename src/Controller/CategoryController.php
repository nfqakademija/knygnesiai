<?php

namespace App\Controller;


use App\Service\CategoryService;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CategoryController
 * @Route("/categories")
 * @package App\Controller\
 */
class CategoryController extends FOSRestController
{
    /**
     * @Route("/list")
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