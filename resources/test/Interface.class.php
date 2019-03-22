<?php

interface IExemple {
    function foo();
}

class Exemple implements IExemple {

    public function __construct() {
        print( 'Constructor Exemple called' . PHP_EOL);
        return;
    }

    public function __destruct() {
        print( 'Destructor Exemple called' . PHP_EOL);
        return;
    }

    public function foo() {
        print( 'Function foo ' . PHP_EOL);
        return;
    }
}

$instance = new Exemple();
$instance->foo();
?>