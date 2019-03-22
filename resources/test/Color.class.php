<?php
class Color{
    public $red;
    public $green;
    public $blue;
    public static $verbose = false;   

    function __construct(array $color) {
        if (array_key_exists("red", $color) && array_key_exists("green", $color) && array_key_exists("blue", $color))
        {
            $this->red = intval($color['red']);
            $this->green = intval($color['green']);
            $this->blue = intval($color['blue']);
        } else if (array_key_exists("rgb", $color)) {
            $this->red = intval($color['rgb'] / 65536 % 256);
            $this->green = intval($color['rgb'] / 256 % 256);
            $this->blue =  intval($color['rgb'] % 256);
        }
        if(Self::$verbose)
            printf("Color( red: %3d, green: %3d, blue: %3d) constructed.\n", $this->red, $this->green, $this->blue);
    }

    function __destruct() {
        if(Self::$verbose)
            printf("Color( red: %3d, green: %3d, blue: %3d) destructed.\n", $this->red, $this->green, $this->blue);
    }

    public function add($color){
        return (new Color(array(
            'red' => $this->red + $color->red, 
            'green' => $this->green + $color->green, 
            'blue' => $this->blue + $color->blue)));
    }

    public function sub($color){
        return (new Color(array(
            'red' => $this->red - $color->red, 
            'green' => $this->green - $color->green, 
            'blue' => $this->blue - $color->blue)));
    }

    public function mult($clr){
        return (new Color(array(
            'red' => $this->red * $clr, 
            'green' => $this->green * $clr, 
            'blue' => $this->blue * $clr)));
    }

    function __toString(){
        return sprintf("Color( red: %3d, green: %3d, blue: %3d)", $this->red, $this->green, $this->blue);;
    }

    public static function doc() {
        echo file_get_contents("Color.doc.txt") . "\n";
    }
}
?>