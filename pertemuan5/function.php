<?php 

class Greeting {
    public $name;
    public $time;

    public function __construct($name, $time){
        $this->name=$name;
        $this->time=$time;
    }
    public function setTime($time) {
        $time = date("l");
    }
    public function getInfo($time, $name){
        return "Selamat $time, $name!";
    }
    
}

$nama = new Greeting("kok", "bisa");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Function</title>
</head>
<body>
    <h1><?= $this->getInfo("Pagi", "Fikri") ?></h1>
</body>
</html>