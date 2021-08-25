<?php

namespace App\DataFixtures;

use App\Entity\Type;
use COM;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TypeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $type1 = new Type();
        $type1 -> setName(sprintf('Liquid & Spray Candy'));
        $manager->persist($type1);
        
        $type2 = new Type();
        $type2 -> setName(sprintf('Candy Bars')); 
        $manager->persist($type2);
        
        $type3 = new Type();
        $type3 -> setName(sprintf('Candy Sprinkles & Toppings'));
        $manager->persist($type3);
        
        $type4 = new Type();
        $type4 -> setName(sprintf('Candy Toys')); 
        $manager->persist($type4);
        
        $type5 = new Type();
        $type5 -> setName(sprintf('DIY Candy Kits'));
        $manager->persist($type5);
        
        $type6 = new Type();
        $type6 -> setName(sprintf('Organic Candy')); 
        $manager->persist($type6);
        
        $type7 = new Type();
        $type7 -> setName(sprintf('Squeeze Candy'));
        $manager->persist($type7);
        
        $type8 = new Type();
        $type8 -> setName(sprintf('Sugar Free Candy')); 
        $manager->persist($type8);
        
        $type9 = new Type();
        $type9 -> setName(sprintf('Swizzle Sticks'));
        $manager->persist($type9);
        
        $type10 = new Type();
        $type10 -> setName(sprintf('Toffee Candy')); 
        $manager->persist($type10);
        
        $type11 = new Type();
        $type11 -> setName(sprintf('Candy Canes'));
        $manager->persist($type11);
        
        $type12 = new Type();
        $type12 -> setName(sprintf('Giant & Big Candy')); 
        $manager->persist($type12);

        $manager->flush();
    }
}
