<?php


class Devis {
    private string $devisNumber;
    private string $date;

    public function __construct(string $devisNumber, string $date, Order $order)
    {
        $this->$devisNumber = $devisNumber;
        $this->$date = $date;
    }

    public function generateDevis(string $productName, int $quantity ) : string {
       $devis = "Commande n°$this->devisNumber\nLe: $this->date\nProduit: $productName\nQuantité: $quantity\n";
       return $devis;
    }
}
