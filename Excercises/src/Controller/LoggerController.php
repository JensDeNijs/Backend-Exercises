<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoggerController extends AbstractController
{

    public function logger($text)
    {
        error_log($text."\n", 3,'D:\WebPages\Backend-Exercises\Excercises\src\Logger\log.info');
    }


}
