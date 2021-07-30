<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MasterController extends AbstractController
{

    public $textTransform;
    public $capitaliser;
    public $spaceDash;
    public $logger;

    public $dropdown;

    public $transformedString;


    public function __construct(CapitaliserController $capitaliserController, SpaceDashController $spaceDashController, LoggerController $loggerController)
    {
        $this->capitaliser = $capitaliserController;
        $this->logger = $loggerController;
        $this->spaceDash = $spaceDashController;
    }


    #[Route('/transform', name: 'transform')]
    public function index(Request $request): Response
    {


        $form = $this->createFormBuilder()
            ->add('text', TextType::class)
            ->add('transformation', ChoiceType::class, [
                'choices' => [
                    'Capitalise' => 'cap',
                    'Dash' => 'dash']])
            ->add('transform', SubmitType::class, ['label' => 'transform text'])
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $this->textTransform = $form->getData()['text'];
            $this->dropdown = $form->getData()['transformation'];

            $this->logger->logger($this->textTransform);

            if ($this->dropdown === 'cap'){
                $this->transformedString = $this->capitaliser->transformString($this->textTransform);
                var_dump($this->transformedString);
            }elseif($this->dropdown === 'dash'){
                $this->transformedString = $this->spaceDash->transformString($this->textTransform);
                var_dump($this->transformedString);
            }



        }
        return $this->render('master/index.html.twig', [
            'controller_name' => 'MasterController',
            'form' => $form->createView(),
            'transformedString' => $this->transformedString,

        ]);
    }
}
