<?php
require_once 'Vertex.class.php';
class Vector {

    private $_x;
    private $_y;
    private $_z;
    private $_w = 0.0;
    private $_color;
    static $verbose;

    function __construct(array $attr) {
        if (isset($attr['dest']) && $attr['dest'] instanceof Vertex) {
            if (isset($attr['orig']) && $attr['orig'] instanceof Vertex) {
                $_orig = new Vertex( array('x' => $attr['orig']->getX(), 'y' => $attr['orig']->getY(), 'z' => $attr['orig']->getZ()));
            }
            else {
                $_orig = new Vertex( array('x' => 0, 'y' => 0, 'z' => 0, 'w' => 1));
            }
            $this->_x = $attr['dest']->getX() - $_orig->getX();
            $this->_y = $attr['dest']->getY() - $_orig->getY();
            $this->_z = $attr['dest']->getZ() - $_orig->getZ();
        }
        if (Self::$verbose) {
            echo $this . ' constructed' . PHP_EOL;
        }
        
    }

    function __destruct() {
        if (Self::$verbose) {
            echo $this . ' destructed' . PHP_EOL;
        }
    }

    public function __toString(){
        return sprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )", 
        $this->_x, $this->_y, $this->_z, $this->_w);
    }

    public function magnitude() {
        return (float)sqrt(($this->_x * $this->_x) + ($this->_y * $this->_y) + ($this->_z * $this->_z));
    }

    public function normalize() {
        $dst = $this->magnitude();
        if ($dst == 1) {
            return clone $this;
        }
        return new Vector(array('dest' => new Vertex(array('x' => $this->_x / $dst, 'y' => $this->_y / $dst, 'z' => $this->_z / $dst))));
    }

    public function add(Vector $rhs){
        return new Vector(array('dest' => new Vertex(array('x' => $this->_x + $rhs->getX(), 
            'y' => $this->_y + $rhs->getY(), 'z' => $this->_z + $rhs->getZ()))));
    }

    public function sub(Vector $rhs){
        return new Vector(array('dest' => new Vertex(array('x' => $this->_x - $rhs->getX(), 
            'y' => $this->_y - $rhs->getY(), 'z' => $this->_z - $rhs->getZ()))));
    }

    public function opposite(){
        return new Vector(array( 'dest' => new Vertex(array('x' => $this->_x * -1, 
            'y' => $this->_y * -1, 'z' => $this->_z * -1))));
    }

    public function scalarProduct($k){
        return new Vector(array( 'dest' => new Vertex(array('x' => $this->_x * $k,
            'y' => $this->_y * $k, 'z' => $this->_z * $k))));
    }

    public function  dotProduct(Vector $rhs){
        return (float)($this->_x * $rhs->getX() + $this->_y * $rhs->getY() + $this->_z * $rhs->getZ());
    }

    public function  cos(Vector $rhs){
        $a = $this->_x * $this->_x + $this->_y * $this->_y + $this->_z * $this->_z;
        $b = $rhs->getX() * $rhs->getX() + $rhs->getY() * $rhs->getY() + $rhs->getZ() * $rhs->getZ();
        return (($this->_x * $rhs->getX() + $this->_y * $rhs->getY() + $this->_z * $rhs->getZ()) / sqrt($a * $b));
    }

    public function   crossProduct(Vector $rhs){
        return new Vector(array('dest' => new Vertex(array(
            'x' => $this->_y * $rhs->getZ() - $this->_z * $rhs->getY(),
            'y' => $this->_z * $rhs->getX() - $this->_x * $rhs->getZ(),
            'z' => $this->_x * $rhs->getY() - $this->_y * $rhs->getX()))));
    }

    public function getX(){
        return $this->_x;
    }

    public function getY(){
        return $this->_y;
    }

    public function getZ()
    {
        return $this->_z;
    }
    
    public function getW(){
        return $this->_w;
    }
    
    public static function doc() {
        echo file_get_contents("Vector.doc.txt") . "\n";
    }
}
?>