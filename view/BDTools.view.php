<?php

class BDTools
{
    public function __construct(){}

    public function __destruct(){}

    public function connect(){
        $bdd = new PDO('mysql:host=localhost; dbname=catclinic', 'root', 'NCC1701a', array(PDO::ATTR_PERSISTENT => true));
        return $bdd;
    }
}