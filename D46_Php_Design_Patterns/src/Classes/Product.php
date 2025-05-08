<?php

class Product implements ProductInterface, productPrototype {
    private array $attributes = [];

    public function __construct(array $attributes = []) {
        $this->attributes = $attributes;
    }

    public function clonePrototype(): productPrototype
    {
        $clone = new Product($this->attributes);
        return $clone;
    }

    public function showProduct(): string
    {
        $type = $this->attributes['type'] ?? 'inconnu';
        
        switch ($type) {
            case 'service':
                return "Service: {$this->attributes['mission']}\nDurée: {$this->attributes['duree']}";
            case 'marchandise':
                return "Marchandise: {$this->attributes['designation']}\nPoids: {$this->attributes['poids']}";
            default:
                return "Type non reconnu";
        }
    }

    public function setAttributes(array $attributes): void
    {
        foreach($attributes as $key => $value) {
            $this->attributes[$key] = $value;
        }
    }

    public function getPrice(string $supplier)
    {
        return $this->attributes['prices'][$supplier] ?? null;
    }
}

