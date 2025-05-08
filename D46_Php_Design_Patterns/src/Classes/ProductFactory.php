<?php

class ProductFactory {
    private Product $prototype;

    public function __construct() {
        $this->prototype = new Product();
    }

    public function createProduct(array $data) {
        if (!isset($data['type']) || ($data['type'] !== 'service' && $data['type'] !== 'marchandise')) {
            throw new Exception("Type de produit invalide!");
        }

        $product = $this->prototype->clonePrototype();
        $product->setAttributes($data);
        return $product;
    }
}