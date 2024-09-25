<?php
    class fruit{
    public $name;
    public $color;
    public function __construct($name, $color)  {
        $this->$name = $name;
        $this->color = $color;
    }
    public function intro(){
        echo "The fruit is {$this->name} and the  color is {$this->color}.";
    }
}
    class Strawberry extends fruit {
    public $weight;
    public function __construct($name, $color, $weight){
          $this->name = $name;
          $this->color = $color;
          $this->weight = $weight;  
}   
    public function intro(){
            echo "The fruit is {$this->name}, the color is {$this->color}, and the weight is {$this->weight} gram.";
    }
        function set_name($n){
	        $this->name = $n;
}
        function set_color($n){   
            $this->color = $n;
}
        function get_details() {
            return "Name: $this->name, Color: $this->color, Weight: $this->weight grams";
}
}
        $apple = new fruit("apple", "red");
        $strawberry = new Strawberry("Strawberry", "red", 50);
        $apple->intro();
        $strawberry->intro();
?>

