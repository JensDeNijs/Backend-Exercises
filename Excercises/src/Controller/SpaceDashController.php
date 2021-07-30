<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SpaceDashController extends AbstractController implements TransformController
{

    public function transformString(string $word): string
    {
        return str_replace(' ', '-', $word);
    }


}
