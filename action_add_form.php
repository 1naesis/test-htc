<?php

use App\Figures\Triangle;
use App\Figures\Parallelogram;
use App\Figures\Circle;
use App\Figures\RepositoryFigures;

include __DIR__."/vendor/autoload.php";

$figure = $_POST['form'];
if(isset($_POST[$figure])){
    $points = $_POST[$figure];
    foreach ($points as $point){
        if(empty($point['x']) || empty($point['y'])){
            die("Нехватает координат");
        }
    }
    if($figure == 'circle'){
        $figure_new = new Circle();
    }else if($figure == 'triangle'){
        $figure_new = new Triangle();
    }else if($figure == 'parallelogram'){
        $figure_new = new Parallelogram();
    }
    if (isset($figure_new)){
        $figure_new->setForm($figure);
        $figure_new->setPoints($points);
        $figure_new->saveFigure();
        echo json_encode([
            'title' => $figure_new->getTitle(),
            'area' => $figure_new->getArea()
        ]);
        exit;
    }
    die("Что то пошло не так");
}