<?php

namespace App\Controller;

use Monolog\Handler\FirePHPHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Config\MonologConfig;

class MonologgerController extends AbstractController
{

    /**
     * @Route("/monologger", name="monologger")
     */

    public function index(Request $request): Response
    {
        $message = $request->query->get("message");
        $type= $request->query->get("type");

        var_dump($message);
        var_dump($type);


        return $this->render('monologger/index.html.twig', [
            'controller_name' => 'MonologgerController',
        ]);
    }
}
