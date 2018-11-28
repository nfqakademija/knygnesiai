<?php

namespace App\Controller;

use App\Entity\User\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class RegisterController
 */
class RegisterController extends controller
{
    /**
     * @Route("/api/login_check")
     * @param Request $request
     */
    public function authentication(Request $request)
    {
//
    }
}