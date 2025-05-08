<?php


class Order {
    private string $reference;
    private int $quantity;
    private Product $product;
    private Supplier $supplier;
    private string $orderStatus;


    public function __construct(string $reference, int $quantity, Product $product, Supplier $supplier, string $orderStatus) {
        $this->reference = $reference;
        $this->quantity = $quantity;
        $this->supplier = $supplier;
        $this->product = $product;
        $this->orderStatus = $orderStatus;
    }

    public function generateOrderLine(string $productName, string $supplierName) :string{
        $orderLine = "Vous souhaitez passer une commande de: $productName\n En quantité: $this->quantity\nAuprès du fournisseur $supplierName ...";
        return $orderLine;
    }

}