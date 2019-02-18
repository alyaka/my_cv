<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Experience;
use App\Form\ExperienceType;

class ExperienceController extends AbstractController
{
    public function create()
    {
        $experience = new Experience();
        $form = $this->createForm(ExperienceType::class, $experience);
        return $this->render(
            'experience/create.html.twig',
            [
                'entity' => $experience,
                'form' => $form->createView(),
            ]
        );
    }
     
    public function edit($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $experience = $entityManager->getRepository(Experience::class)->findOneBy(['id' => $id]);
        if ($experience) {
            $form = $this->createForm(ExperienceType::class, $experience);
            return $this->render(
                'experience/create.html.twig',
                [
                    'entity' => $experience,
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
        $experience = $entityManager->getRepository(Experience::class)->findOneBy(['id' => $id]);
        if ($experience) {
            $entityManager->remove($experience);
            $entityManager->flush();
            return $this->redirectToRoute('app_Booboo');
        } else {
            return new Response('<html><body>This ID does not exist!</body></html>');
        }
    }
     
    public function valid(Request $request)
    {
        $experience = new Experience();
        $form = $this->createForm(ExperienceType::class, $experience);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $experience = $form->getData();
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($experience);
            $entityManager->flush();
            return $this->redirectToRoute('app_Booboo');
        }
        return $this->render(
            'experience/create.html.twig',
            [
                'entity' => $experience,
                'form' => $form->createView(),
            ]
        );
    }
}
