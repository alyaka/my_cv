<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Formation;
use App\Entity\Experience;
use App\Entity\Loisir;
use App\Entity\Skill;

class BoobooController extends Controller
{
    public function number()
    {
        $number = random_int(0, 10);
        
        $formations = $this->getDoctrine()->getRepository(Formation::class)->findAll();
        
        $experiences = $this->getDoctrine()->getRepository(Experience::class)->findAll();
        
        $loisirs = $this->getDoctrine()->getRepository(Loisir::class)->findAll();
        
        $skills = $this->getDoctrine()->getRepository(Skill::class)->findAll();
        
        return $this->render('Booboo/wow.html.twig', array(
             'number' => $number,
             'name' => "ooouuw",
             'firstname' => "waoo",
             'formations' => $formations,
             'experiences' => $experiences,
             'loisirs' => $loisirs,
             'skills' => $skills
        ));
    }
    
    public function admin()
    {
        return new Response('<html><body>Admin page!</body></html>');
    }
}