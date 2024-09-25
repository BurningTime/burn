<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MotorTrade- repo sale!!!</title>
        <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: cyan;
            color: yellow;
        }    
        h1{
            font-size: 2em;
        }
        table{
            border-collapse: collapse;
            width: 50%;
            height: 50%;
            background-color: gray;
            text-align: center;
            font-size: 1.5em;
        }
        td{
            padding: 20px;
        }
        </style>
</head>
<body>
    <h1>
    <table>
        <tr>
            <td>
<?php
    class Vehicle{
        public $make;
        public $model;
        public $year;
        public $color;

        public function __construct($make, $model, $year, $color){
            $this->make = $make;
            $this->model = $model;
            $this->year = $year;
            $this->color = $color;
        }
        public function start(){
            echo "{$this->model} engine is starting..!";
        }
        public function stop(){
            echo "{$this->model} brakes has been applied..!";
        }
        
    }
    class Cars extends Vehicle{
        public $variant;
        public function __construct($make, $model, $year, $color, $variant){
            $this->make = $make;
            $this->model = $model;
            $this->year = $year;
            $this->color = $color;
            $this->variant = $variant;
        }
        public function accelerate(){
            echo "{$this->model} stepping on the accelarator..!";
        }
        public function specs(){
            echo "This is the {$this->make} {$this->model} {$this->variant} in {$this->color} which was released on {$this->year} ";
        }
    } 
    class Motorcycles extends Vehicle{
        public $displacement;
        public function __construct($make, $model, $year, $color, $displacement){
            $this->make = $make;
            $this->model = $model;
            $this->year = $year;
            $this->color = $color;
            $this->displacement = $displacement;

        }
        public function accelerate(){
            echo "{$this->model} twisting the throttle..!";
        }
        public function specs(){
            echo "This is a {$this->model}-{$this->displacement} by {$this->make} in {$this->color} which was released on {$this->year}";
        }
    } 

    $car = new Cars("Suzuki","Swift",2017,"Pearl White","AT");
    $motorcycle = new Motorcycles("Suzuki","GXSR", 2020, "Ecstar Blue", 1000);
    $car->specs();
    echo "<br>";
    $car->start();
    echo "<br>";
    $car->accelerate();
    echo "<br>";
    $car->stop();
    echo "<br>";
    echo "<br>";
    echo "<br>";
    $motorcycle->specs();
    echo "<br>";
    $car->start();
    echo "<br>";
    $car->accelerate();
    echo "<br>";
    $car->stop();
?>
</td>
</tr>
<table>
</h1>
</body>
</html>