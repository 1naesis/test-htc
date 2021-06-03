<?php


namespace App\Figures;


class Circle extends AbstractFigures
{
    public function __construct()
    {
        return $this->title = "Круг";
    }

    public function getArea()
    {
        $x1 = $this->points['center'][0];
        $y1 = $this->points['center'][1];
        $x2 = $this->points['radius'][0];
        $y2 = $this->points['radius'][1];
        $r = pow(($x2 - $x1), 2) + pow(($y2 - $y1), 2);
        $s = pi() * pow($r, 2);
        return number_format($s, 2, '.', '');
    }
}