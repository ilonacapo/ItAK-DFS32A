<?php

class User {
    private string $name;
    private string $email;
    private string $phoneNumber;

    public function __construct(string $name, string $email, string $phoneNumber) 
    {
        $this->$name = $name;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
    }

   // public function placeOrder(Order $order): string {
   // }
}