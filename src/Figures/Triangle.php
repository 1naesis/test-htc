<?php


namespace App\Figures;


class Triangle extends AbstractFigures
{
    public function __construct()
    {
        return $this->title = "Треугольник";
    }

    public function getArea()
    {
        $x1 = $this->points['point1'][0];
        $y1 = $this->points['point1'][1];
        $x2 = $this->points['point2'][0];
        $y2 = $this->points['point2'][1];
        $x3 = $this->points['point3'][0];
        $y3 = $this->points['point3'][1];
        $res = (($x2 - $x1) * ($y2 - $y1) - ($x3 - $x1) * ($y3 - $y1)) / 2;
        return abs($res);
    }
}