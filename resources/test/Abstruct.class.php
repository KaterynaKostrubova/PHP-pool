<?php
abstract class ExempleA {
    abstract public function foo();
}

class ExempleB extends ExempleA {
    public function __construct() {
        print( 'Constructor ExempleB called' . PHP_EOL);
        return;
    }

    public function __destruct() {
        print( 'Destructor ExempleB called' . PHP_EOL);
        return;
    }

    public function foo() {
        print( 'Function foo from class B' . PHP_EOL);
        return;
    }

}

$instanceB = new ExempleB();
$instanceB->foo();
?>