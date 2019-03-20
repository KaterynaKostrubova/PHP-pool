<?php
class Vertex {

    private $_x;
    private $_y;
    private $_z;
    private $_w;
    private $_color;
    static $verbose;

    function __construct(array $attr) {

        if (array_key_exists("x", $attr) && array_key_exists("y", $attr) && array_key_exists("z", $attr)){
            $this->_x = $attr['x'];
            $this->_y = $attr['y'];
            $this->_z = $attr['z'];
        }

        if (array_key_exists("w", $attr) && !empty($attr["w"])) {
            $this->_w = $attr['w'];
        } else {
            $this->_w = 1.0;
        }

        if (array_key_exists("color", $attr) && !empty($attr["color"])) {
            $this->_color = $attr['color'];
        } else {
            $this->_color = new Color(array('rgb' => 0xffffff));
        }

        if(Self::$verbose)
            printf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, %s ) constructed\n", 
                $this->_x, $this->_y, $this->_z, $this->_w, $this->_color);
    }

    function __destruct() {
        if(Self::$verbose)
            printf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, %s ) destructed\n", 
                $this->_x, $this->_y, $this->_z, $this->_w, $this->_color);
    }

    function __toString(){
        if (Self::$verbose)
            return sprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, %s )", 
                $this->_x, $this->_y, $this->_z, $this->_w, $this->_color);
        else
            return sprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f)", 
                $this->_x, $this->_y, $this->_z, $this->_w);

    }

    public function getX(){
        return $this->_x;
    }

    public function setX(){
        return $this->_x;
    }

    public function getY(){
        return $this->_y;
    }
    
    public function setY(){
        return $this->_y;
    }

    public function getZ(){
        return $this->_z;
    }
    
    public function setZ(){
        return $this->_z;
    }

    public function getW(){
        return $this->_w;
    }
    
    public function setW(){
        return $this->_w;
    }

    public function getColor(){
        return $this->_color;
    }
    
    public function setColor(){
        return $this->_color;
    }

    public static function doc() {
        echo file_get_contents("Vertex.doc.txt") . "\n";
    }
}

?>