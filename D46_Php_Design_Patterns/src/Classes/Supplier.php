<?php

class Supplier {
    private string $name;
    private array $products;

    public function __construct(string $name, array $products)
    {
        $this->name = $name;
        $this->products = $products;
    }

    //public function showInfos(){};
}