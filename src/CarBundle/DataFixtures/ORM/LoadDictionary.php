<?php
/**
 * Created by PhpStorm.
 * User: bob
 * Date: 25/01/19
 * Time: 21:42
 */

namespace CarBundle\DataFixtures\ORM;


use CarBundle\Entity\Make;
use CarBundle\Entity\Model;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadDictionary extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $make = new Make();
        $make->setName('WV');
        $make1 = new Make();
        $make1->setName('BMW');
        $make2 = new Make();
        $make2->setName('Fiat');
        $make3 = new Make();
        $make3->setName('Reanault');
        $manager->persist($make);
        $manager->persist($make1);
        $manager->persist($make2);
        $manager->persist($make3);

        $model = new Model();
        $model->setName('X1');
        $model1 = new Model();
        $model1->setName('Passat');
        $model2 = new Model();
        $model2->setName('Punto');
        $model3 = new Model();
        $model3->setName('Clio');
        $manager->persist($model);
        $manager->persist($model1);
        $manager->persist($model2);
        $manager->persist($model3);



        $manager->flush();
        $this->addReference("X1", $model);
        $this->addReference("Passat", $model1);
        $this->addReference("Punto", $model2);
        $this->addReference("BMW", $make1);
        $this->addReference("WV", $make);
        $this->addReference("Fiat", $make2);
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 1;
    }
}