<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;


class LearningController extends AbstractController
{
    private $name;
    private $date;

    public function __construct()
    {

    }

    #[Route('/', name: 'aboutme', methods: ['GET','POST'])]
    public function aboutMe(Request $request)
    {
        $session = $request->getSession();
        $this->date = new \DateTime();

        $form = $this->createFormBuilder()
            ->add('name', TextType::class)
            ->add('save', SubmitType::class, ['label' => 'change name'])
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $this->name = $form->getData()['name'];
            $session->set('naam',$this->name);

        }

        return $this->render('learning/index.html.twig', [
            'name' => $session->get('naam'),
            'form' => $form->createView(),
            'date' => $this->date,
        ]);
    }
}
