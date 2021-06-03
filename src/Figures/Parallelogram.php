<?php


namespace App\Figures;


class Parallelogram extends AbstractFigures
{
    public function __construct()
    {
        return $this->title = "Параллелограм";
    }

    public function getArea()
    {
        $x1 = $this->points['point1'][0];
        $y1 = $this->points['point1'][1];
        $x2 = $this->points['point2'][0];
        $y2 = $this->points['point2'][1];
        $x3 = $this->points['point3'][0];
        $y3 = $this->points['point3'][1];
        $res = (($x2 - $x1) * ($y2 - $y1) - ($x3 - $x1) * ($y3 - $y1));
        return abs($res);
    }

    public function getTitle()
    {
        if($this->checkSquare()){
            $this->title = "Квадрат";
        }
        return parent::getTitle();
    }

    private function checkSquare()
    {
        $line1 = $this->findLine(
            $this->points['point1'][0],
            $this->points['point1'][1],
            $this->points['point2'][0],
            $this->points['point2'][1]
        );
        $line2 = $this->findLine(
            $this->points['point2'][0],
            $this->points['point2'][1],
            $this->points['point3'][0],
            $this->points['point3'][1]
        );
        $line3 = $this->findLine(
            $this->points['point1'][0],
            $this->points['point1'][1],
            $this->points['point3'][0],
            $this->points['point3'][1]
        );
        if($line1 == $line2 || $line2 == $line3 || $line1 == $line3){
            return true;
        }
        return false;
    }

    private function findLine($x1, $y1, $x2, $y2)
    {
        $res = sqrt(pow(($x2-$x1), 2)+pow(($y2-$y1), 2));
        return $res;
    }
}