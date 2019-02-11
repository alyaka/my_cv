<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Loisir;
use App\Form\LoisirType;

class LoisirController extends AbstractController
{
    public function create()
    {
        $loisir = new Loisir();
        $form = $this->createForm(LoisirType::class, $loisir);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $loisir = $form->getData();
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($loisir);
            $entityManager->Flush();
            
            return $this->redirectToRoute('index');
        }
        
        
        return $this->render('loisir/create.html.twig', [
            'entity' => $loisir,
            'form' => $form->createView(),
            ]
        );
    }
    
    // public function valid(Request $request)
    // {
    //     $loisir = new Loisir();
    // }
}