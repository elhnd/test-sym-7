<?php

class Product
{
    public function __construct(
        public     private(set)   string $name, 
        protected  private(set)   string $category,
        public     protected(set) float  $price, 
    ){}
}

$product = new Product('Redmi Note 13', 'Smartphone' , 300.00);

echo $product->name; // Affiche MacBook Pro
$product->name = 'Iphone'; // Erreur Fatale