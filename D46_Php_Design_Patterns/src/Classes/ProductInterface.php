<?php

interface ProductInterface {
    public function showProduct() : string;
    public function getPrice(string $supplier);

}