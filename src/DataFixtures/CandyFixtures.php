<?php

namespace App\DataFixtures;

use App\Entity\Candy;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CandyFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i=1; $i<10; $i++) {
            $candy = new Candy();
            $candy->setName("Candy Name $i");
            $candy->setImages("1");
            $candy->setPrices("20.00");
            $candy->setShelfLife("12 months");
            $candy->setDetail("Slime! An oozy, viscous liquid matter you may have seen secreted from the mouth of a large bull frog, or seeping from the ground of an old toxic waste site, or bubbling at the edge of a steamy swamp. You may have even played with the neon green sludge toy from the 1970's. Now you can experience the taste of slime for yourself with these innovative liquid sour candy dispensers. Due to their appearance as a roll-on deodorant, you may even be tempted to apply this slime to your underarm pit. But this may cause an intense stinging/burning sensation to your tender skin. Nope, we highly recommend that you simply roll these intense sour candy flavors directly onto your tongue for a fruity taste sensation!

            Assortment includes two fabulous flavors:
            Blue Raspberry
            Strawberry
            
            Display box contains 12 Toxic Waste Slime Licker Sour Rolling Liquid Candy Dispensers.
            
            Shipping Weight ~ 3 lbs.");
            $manager->persist($candy);
        }

        $manager->flush();
    }
}
