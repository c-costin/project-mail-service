<?php

namespace App\DataFixtures;

use App\Entity\Project;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\DBAL\Connection;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function __construct(
        private Connection $connection
    )
    {}

    private function truncate()
    {
        $this->connection->executeQuery('SET autocommit=0;SET foreign_key_checks = 0;TRUNCATE TABLE project;TRUNCATE TABLE user;COMMIT;');
    }

    public function load(ObjectManager $manager): void
    {
        // Truncate Database
        $this->truncate();

        // ======== PROJECTS ========

        // => Admin project
        $projectAdmin = new Project();
        $projectAdmin->setName('Computer Science');
        $projectAdmin->setDomain('computer-science.com');
        $projectAdmin->setAppKey('a34a35fb88bce77457eeca1bc4f50f28');
        $projectAdmin->setSecretKey('9648848d3c3a1b14345277578fbfd10464566d74d3be3a1b35073b47faf6ace4');
        $projectAdmin->setRoles(["ROLE_APP"]);
        $manager->persist($projectAdmin);

        // => John project one
        $projectJohnOne = new Project();
        $projectJohnOne->setName('Hôtel Trip');
        $projectJohnOne->setDomain('hotel-trip.com');
        $projectJohnOne->setAppKey('9ee878fc9162e25747487762467ab48e');
        $projectJohnOne->setSecretKey('390b891d06a63c810308c409479a0c883543352c594c2f9c7614bcad29b09b78');
        $projectJohnOne->setRoles(["ROLE_APP"]);
        $manager->persist($projectJohnOne);

        // => John project two
        $projectJohnTwo = new Project();
        $projectJohnTwo->setName('Vacances de rêve');
        $projectJohnTwo->setDomain('vacances-de-reve.fr');
        $projectJohnTwo->setAppKey('55226a9bf963bf269d58942be3de10dd');
        $projectJohnTwo->setSecretKey('b11d5fcc06de5ec8d3ba77a8d6fa07f104c07b631ec76fb7827518e3c98b2ce8');
        $projectJohnTwo->setRoles(["ROLE_APP"]);
        $manager->persist($projectJohnTwo);

        // => Julie project
        $projectJulie = new Project();
        $projectJulie->setName('Portfolio');
        $projectJulie->setDomain('juliedoe.com');
        $projectJulie->setAppKey('19da8ab63f2b66ad77553c392d03943b');
        $projectJulie->setSecretKey('1f584cc0016d94c9ec354ea29d5eac7b8e1ead1196e80d31b4eecc1530126cee');
        $projectJulie->setRoles(["ROLE_APP"]);
        $manager->persist($projectJulie);


        // ======== USERS ========

        // => Admin
        $userAdmin = new User();
        $userAdmin->setName('Admin ADMIN');
        $userAdmin->setEmail('admin@admin.com');
        $userAdmin->setPassword('$2y$13$A/IrMx9TySnHf3v2Zhm9feQAsSsr1XI/R31qvjy1rQZvkJpeKlrZW');
        $userAdmin->setRoles(["ROLE_ADMIN"]);
        $userAdmin->addProject($projectAdmin);
        $manager->persist($userAdmin);

        // => John Doe
        $userJohn = new User();
        $userJohn->setName('John Doe');
        $userJohn->setEmail('john@doe.com');
        $userJohn->setPassword('$2y$13$DRPjWykzAIiUjeDONTppDeDOL4gLkhCYiejhqxVLr.VLFoRePg4jW');
        $userJohn->setRoles(["ROLE_USER"]);
        $userJohn->addProject($projectJohnOne);
        $userJohn->addProject($projectJohnTwo);
        $manager->persist($userJohn);

        // => Julie Doe
        $userJulie = new User();
        $userJulie->setName('Julie Doe');
        $userJulie->setEmail('julie@doe.com');
        $userJulie->setPassword('$2y$13$DRPjWykzAIiUjeDONTppDeDOL4gLkhCYiejhqxVLr.VLFoRePg4jW');
        $userJulie->setRoles(["ROLE_USER"]);
        $userJulie->addProject($projectJulie);
        $manager->persist($userJulie);

        $manager->flush();
    }
}
