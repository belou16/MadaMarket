<?php
// src/DataFixtures/ProductFixtures.php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $products = [
            [
                'name' => 'Riz Vary Gasy Premium',
                'description' => 'Riz blanc de haute qualité cultivé dans les rizières de Madagascar. Grains longs et parfumés.',
                'price' => 8.50,
                'category' => 'Riz',
                'stock' => 50,
                'image' => null,
            ],
            [
                'name' => 'Litchis Frais',
                'description' => 'Litchis juteux et sucrés, fraîchement cueillis des vergers malgaches.',
                'price' => 12.90,
                'category' => 'Fruits',
                'stock' => 30,
                'image' => null,
            ],
            [
                'name' => 'Mangues Mûres',
                'description' => 'Mangues tropicales sucrées et fondantes, un délice de Madagascar.',
                'price' => 9.90,
                'category' => 'Fruits',
                'stock' => 25,
                'image' => null,
            ],
            [
                'name' => 'Vanille de Madagascar',
                'description' => 'Gousses de vanille Bourbon de première qualité, idéale pour vos desserts.',
                'price' => 24.99,
                'category' => 'Épices',
                'stock' => 15,
                'image' => null,
            ],
            [
                'name' => 'Tomates Fraîches',
                'description' => 'Tomates cultivées localement, juteuses et savoureuses.',
                'price' => 5.50,
                'category' => 'Légumes',
                'stock' => 40,
                'image' => null,
            ],
            [
                'name' => 'Carottes Bio',
                'description' => 'Carottes biologiques croquantes et sucrées.',
                'price' => 4.20,
                'category' => 'Légumes',
                'stock' => 35,
                'image' => null,
            ],
            [
                'name' => 'Papayes Tropicales',
                'description' => 'Papayes mûres et parfumées, riches en vitamines.',
                'price' => 7.80,
                'category' => 'Fruits',
                'stock' => 20,
                'image' => null,
            ],
            [
                'name' => 'Corossol Frais',
                'description' => 'Fruit exotique au goût unique, parfait pour les jus et desserts.',
                'price' => 11.50,
                'category' => 'Fruits',
                'stock' => 18,
                'image' => null,
            ],
        ];

        foreach ($products as $productData) {
            $product = new Product();
            $product->setName($productData['name']);
            $product->setDescription($productData['description']);
            $product->setPrice($productData['price']);
            $product->setCategory($productData['category']);
            $product->setStock($productData['stock']);
            $product->setImage($productData['image']);

            $manager->persist($product);
        }

        $manager->flush();
    }
}