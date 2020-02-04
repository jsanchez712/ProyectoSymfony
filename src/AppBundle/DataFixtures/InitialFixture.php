<?php
namespace AppBundle\DataFixtures;

use AppBundle\Entity\CvMgr\CVCategories;
use AppBundle\Entity\UserMgr\FormerStudents;
use Faker;
use AppBundle\Entity\OfferMgr\Offers;
use AppBundle\Entity\UserMgr\Employeers;
use AppBundle\Entity\poemas;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class InitialFixture implements ORMFixtureInterface
{
  public function load(ObjectManager $manager) {
    // Creating 20 job offers
    for ($i = 0; $i < 2; $i++) {
      $jobFaker = Faker\Factory::create();

      // Employeer
      $employeer = new Employeers();
      $employeer->setUsername("empleador_$i");
      $employeer->setEmail("empleador_$i@cuatrovientos.org");
      $employeer->setPassword("4Vientos");

      $employeer->setVCIF("82102288A");
      $employeer->setVName($jobFaker->company);
      $employeer->setVLogo($jobFaker->imageUrl($width = 640, $height = 480));
      $employeer->setVDescription($jobFaker->sentence);
      $employeer->setVContactName($jobFaker->name);
      $employeer->setVContactPhone($jobFaker->phoneNumber);
      $employeer->setVContactMail($jobFaker->companyEmail);
      $employeer->setVLocation($jobFaker->address);
      $employeer->setNNumberOfWorkers($jobFaker->numberBetween(0, 255));
      $employeer->setCreationUser("InitialFixture");
      $employeer->setCreationDate(new \DateTime("2018-6-1"));
      $employeer->setModificationUser("InitialFixture");
      $employeer->setModificationDate(new \DateTime("2018-6-1"));

      $manager->persist($employeer);

      // Poemas
      
      $poema = new poemas();
      $poema->setUser();
      $poema->setTexto($texto);
      $poema->setCategory();
      
      // Offer
      $offer = new Offers();
      $offer->setVOfferCode("ACTIVE");
      $offer->setVOfferType('full-time');
      $offer->setDActivationDate(new \DateTime("2019-1-1"));
      $offer->setDDueDate(new \DateTime("2019-2-$i"));
      $offer->setVPosition("Developer");
      $offer->setLtextDuties($jobFaker->paragraph);
      $offer->setLtextDescription($jobFaker->paragraph);
      $offer->setVSalaray("1200");
      $offer->setLtextExperienceRequirements($jobFaker->paragraph);
      $offer->setVLocation($jobFaker->city . ', ' . $jobFaker->country);

      $offer->setEmployeer($employeer);

      $offer->setCreationUser("InitialFixture");
      $offer->setCreationDate(new \DateTime("2018-6-1"));
      $offer->setModificationUser("InitialFixture");
      $offer->setModificationDate(new \DateTime("2018-6-1"));

      $manager->persist($offer);
    }

    // Creating 2 FormedStudents
    for ($i = 0; $i < 2; $i++) {
      $studentFaker = Faker\Factory::create();

      $formedStudent = new FormerStudents();
      $formedStudent->setUsername("exalumno_$i");
      $formedStudent->setEmail("exalumno_$i@cuatrovientos.org");
      $formedStudent->setPassword("4Vientos");

      $formedStudent->setVNIF($studentFaker->randomNumber(6));
      $formedStudent->setVName($studentFaker->firstName);
      $formedStudent->setVSurnames($studentFaker->lastName);
      $formedStudent->setVAddress($studentFaker->streetAddress);
      $formedStudent->setDBirthDate($studentFaker->dateTime);
      $formedStudent->setBVehicle($studentFaker->boolean);

      $formedStudent->setCreationUser("InitialFixture");
      $formedStudent->setCreationDate(new \DateTime("2018-8-1"));
      $formedStudent->setModificationUser("InitialFixture");
      $formedStudent->setModificationDate(new \DateTime("2018-6-1"));
      $manager->persist($formedStudent);
    }

 



    $manager->flush();
  }

}


