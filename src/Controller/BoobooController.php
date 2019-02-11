<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Formation;
use App\Entity\Experience;

class BoobooController extends Controller
{
    public function number($name, $firstname)
    {
        $number = random_int(0, 10);
        
        $formations = $this->getDoctrine()->getRepository(Formation::class)->findAll();
        
        $experiences = $this->getDoctrine()->getRepository(Experience::class)->findAll();
        
        return $this->render('Booboo/wow.html.twig', array(
             'number' => $number,
             'name' => $name,
             'firstname' => $firstname,
             'formations' => $formations,
             'experiences' => $experiences,
        ));
    }
}