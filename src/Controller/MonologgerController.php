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


    #[Route('/monologger', name: 'monologger', methods: ['GET', 'POST'])]
    public function index(Request $request): Response
    {



        /*    $message = $request->query->get("message");
            $type = $request->query->get("type");

            var_dump($message);
            var_dump($type);


            $log = new Logger('name');
            $log->pushHandler(new StreamHandler('path/to/your.log', Logger::WARNING));

            $log->warning($message);
            $log->error('Bar');*/

        return $this->render('monologger/index.html.twig', [
            'controller_name' => 'MonologgerController',
        ]);
    }

    #[Route('/monologger/info', name: 'info', methods: ['POST'])]
    public function info(Request $request):Response
    {
        $message = $request->get("message");
        $type = $request->get("type");
        
        $log = new Logger('info');
        $log->pushHandler(new StreamHandler('../src/logs/info.log', Logger::INFO));
        $log->info($type.': '.$message);

        return $this->render('monologger/index.html.twig', [
            'controller_name' => 'MonologgerController',
        ]);
    }

    #[Route('/monologger/error', name: 'error', methods: ['POST'])]
    public function error(Request $request):Response
    {
        $message = $request->get("message");
        $type = $request->get("type");

        $log = new Logger('error');
        $log->pushHandler(new StreamHandler('../src/logs/warning.log', Logger::WARNING));
        $log->warning($type.': '.$message);

        return $this->render('monologger/index.html.twig', [
            'controller_name' => 'MonologgerController',
        ]);
    }

    #[Route('/monologger/warning', name: 'warning', methods: [ 'POST'])]
    public function warning(Request $request):Response
    {
        $message = $request->get("message");
        $type = $request->get("type");

        var_dump($type);
        $log = new Logger('warning');
        $log->pushHandler(new StreamHandler('../src/logs/warning.log', Logger::WARNING));
        $log->warning($type.': '.$message);

        return $this->render('monologger/index.html.twig', [
            'controller_name' => 'MonologgerController',
        ]);
    }

    #[Route('/monologger/emergency', name: 'emergency', methods: [ 'POST'])]
    public function emergency(Request $request):Response
    {
        $message = $request->get("message");
        $type = $request->get("type");

        $log = new Logger('emergency');
        $log->pushHandler(new StreamHandler('../src/logs/emergency.log', Logger::EMERGENCY));
        $log->emergency($type.': '.$message);

        return $this->render('monologger/index.html.twig', [
            'controller_name' => 'MonologgerController',
        ]);
    }
}
