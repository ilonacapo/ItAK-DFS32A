<?php

class Marchandise extends Product{
    private array $suppliersPriceList = [];
    private string $designation;
    private int $poids;
    public function __construct(array $data) {
        $this->designation = $data['designation'];
        $this->poids = $data['poids'];
        $this->suppliersPriceList = [];
    }
    public function showProduct(): string
    {
        $productInfos = "Marchandise: {$this->designation}\n Poids: {$this->poids}";
        return $productInfos;
    }
    public function getPrice(string $supplierName) {
        return $this->suppliersPriceList[$supplierName];
    }

}