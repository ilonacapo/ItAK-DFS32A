<?php

class Stock {
    private Supplier $supplier;
    private Product $product;
    private int $quantity;

    public function __construct(Supplier $supplier, Product $product, int $quantity)
    {
        $this->supplier =$supplier;
        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function validStock(int $orderQuantity) {
        if($orderQuantity > $this->quantity) {
            throw new Exception("Quantité d'achat supérieure au stock disponible");
        }
        return true;
    }
    public function reduceStock(int $orderQuantity) {
        try {
            $this->validStock($orderQuantity);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        $this->quantity -= $orderQuantity;
        return $this->quantity;
        
    }

    public function addStock(int $productQuantity) {
        
        $this->quantity += $productQuantity;
        return $this->quantity;
        
    }
}