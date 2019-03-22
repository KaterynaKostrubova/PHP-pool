<?php
class ExempleA {
    public function __construct() {
        print( 'Constructor ExempleA called' . PHP_EOL);
        return;
    }

    public function __destruct() {
        print( 'Destructor ExempleA called' . PHP_EOL);
        return;
    }

    public function foo() {
        print( 'Function foo from class A' . PHP_EOL);
        return;
    }

    public function test() {
        static::foo();
        return;
    }
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


$instanceA = new ExempleA();
$instanceB = new ExempleB();
$instanceA->foo();
$instanceB->foo();
$instanceA->test();
$instanceB->test();
?>