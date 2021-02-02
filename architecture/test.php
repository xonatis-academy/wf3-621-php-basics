<?php

// SECTION 1 : appelations, déclaration, attibution, définition - ESPACE STATIQUE
class Order
{
    public $ref;
    public $products;
}

class User
{
    public $username;
    public $password;
    public $orders;
}

// SECTION 2 : instructions, les choses qui se passent - RUNTIME
$celine = new User();
$celine->orders = [new Order(), new Order()];
$celine->orders[1]->ref = 'REF9380';
?>