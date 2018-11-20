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
        $_categories = [];
        $categories= $categoryService->setReturnQuery(false)->getAll();
        foreach ($categories as $category) {
            $_category['id'] = $category->getId();
            $_category['name'] = $category->getName();
            $_category['createdAt'] = $category->getCreatedAt();
            $_category['updatedAt'] = $category->getUpdatedAt();
            $_categories[] = $_category;
        }
        return new JsonResponse($_categories, 200);
    }

}
