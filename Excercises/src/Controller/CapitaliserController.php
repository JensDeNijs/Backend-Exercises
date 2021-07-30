<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CapitaliserController extends AbstractController implements TransformController
{

    public function transformString(string $word): string
    {
       /* return preg_replace('/(\w)(.)?/', strtoupper('$1') . strtolower('$2'), $word);*/


        $str_implode = str_split($word);

        $caps = true;
        foreach($str_implode as $key=>$letter){
            if($caps){
                $out = strtoupper($letter);
                if($out <> " ") //not a space character
                    $caps = false;
            }
            else{
                $out = strtolower($letter);
                $caps = true;
            }
            $str_implode[$key] = $out;
        }

        $word = implode('',$str_implode);

        return $word;

    }


}
