<?php namespace App\Tests;

use App\Entity\Formation;
use App\Entity\Experience;
use App\Entity\Loisir;
use Symfony\Component\Validator\Constraints as Assert;

class ExampleTest extends \Codeception\Test\Unit
{
    /**
     * @var \App\Tests\UnitTester
     *
     * @Assert\DateTime
     * @var string A "Y-m-d H:i:s" formatted value
     */
     
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testSomeFeature()
    {
        
        $formation = new Formation();
        $formation->setName('Symfony');
        $this->assertEquals('Symfony', $formation->getName());
        $formation->setQualification('6h/jour');
        $this->assertEquals('6h/jour', $formation->getQualification());
        $formation->setContent('creation du cv');
        $this->assertEquals('creation du cv', $formation->getContent());
        
        $experience = new Experience();
        $experience->setName('Projet');
        $this->assertEquals('Projet', $experience->getName());
        $experience->setDateDebut(new \DateTime('2016-01-01 15:03:01.012345Z'));
        $this->assertEquals(new \DateTime('2016-01-01 15:03:01.012345Z'), $experience->getDateDebut());
        $experience->setDateFin(new \DateTime('2016-02-01 15:03:01.012345Z'));
        $this->assertEquals(new \DateTime('2016-02-01 15:03:01.012345Z'), $experience->getDateFin());
        
        $loisir = new Loisir();
        $loisir->setName('Karaoke');
        $this->assertEquals('Karaoke', $loisir->getName());
        $loisir->setCommentaire('tout les lundis et jeudi à 18h');
        $this->assertEquals('tout les lundis et jeudi à 18h', $loisir->getCommentaire());
    }
}