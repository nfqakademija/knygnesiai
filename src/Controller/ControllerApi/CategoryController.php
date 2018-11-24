<?php

namespace App\Controller\ControllerApi;


use App\Service\CategoryService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CategoryController
 * @package App\Controller\
 */
class CategoryController extends Controller
{
    /**
     * @Route("/categories")
     * @param CategoryService $categoryService
     *
     * @return JsonResponse
     */
    public function index(CategoryService $categoryService)
    {
        $categories= $categoryService->setReturnQuery(false)->getAll();
        return new JsonResponse($categories, 200);
    }

}