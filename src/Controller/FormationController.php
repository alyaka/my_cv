<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Formation;
use App\Form\FormationType;

class FormationController extends AbstractController
{
    public function create()
    {
        $formation = new Formation();
        $form = $this->createForm(FormationType::class, $formation);
        return $this->render(
            'formation/create.html.twig',
            [
            'entity' => $formation,
            'form' => $form->createView(),
            ]
        );
    }
    public function edit($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $formation = $entityManager->getRepository(Formation::class)->findOneBy(['id' => $id]);
        
        if ($formation) {
            $form = $this->createForm(FormationType::class, $formation);
            return $this->render(
                'formation/create.html.twig',
                [
                'entity' => $formation,
                'form' => $form->createView(),
                ]
            );
        } else {
            return new Response('<html><body>This ID does not exist!</body></html>');
        }
    }
     
    public function delete($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $formation = $entityManager->getRepository(Formation::class)->findOneBy(['id' => $id]);
        
        if ($formation) {
            $entityManager->remove($formation);
            $entityManager->flush();
            
            return $this->redirectToRoute('app_Booboo');
        } else {
            return new Response('<html><body>This ID does not exist!</body></html>');
        }
    }
    
    public function valid(Request $request)
    {
        $formation = new Formation();
        $form = $this->createForm(FormationType::class, $formation);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $formation = $form->getData();
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($formation);
            $entityManager->flush();
            
            return $this->redirectToRoute('app_Booboo');
        }
        
        return $this->render(
            'formation/create.html.twig',
            [
            'entity' => $formation,
            'form' => $form->createView(),
            ]
        );
    }
}
