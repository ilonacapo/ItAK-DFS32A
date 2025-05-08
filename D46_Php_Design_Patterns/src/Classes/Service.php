<?php

class Service extends Product {
    private string $designation;
    private int $duree;
    private array $suppliersPriceList = [];
    
    public function __construct(array $data) {
        $this->duree = $data['duree'];
        $this->designation = $data['mission'];
    }
    public function showProduct(): string
    {
        $productInfos = "Service: {$this->designation}\n Durée estimée: {$this->duree}";
        return $productInfos;
    }
    public function getPrice(string $supplierName) {
        return $this->suppliersPriceList[$supplierName];
    }
    }
    
    
    