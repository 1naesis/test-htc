<?php


namespace App\Figures;


use App\Components\Db;

class AbstractFigures
{
    protected $form;
    protected $title;
    protected $points = [];

    public function saveFigure()
    {
        Db::insert("
            INSERT INTO figures (`type`) VALUES (?)
            ",[$this->form]
        );
        $figure_id = Db::query("
            SELECT `id` FROM `figures` ORDER BY `id` DESC LIMIT 1;
            ")[0]['id'];

        foreach ($this->points as $point => $coords){
            Db::insert("
                INSERT INTO points (`x`, `y`) VALUES (?, ?)
                ",[$coords[0], $coords[1]]
            );
            $point_id = Db::query("
                SELECT `id` FROM `points` ORDER BY `id` DESC LIMIT 1;
                ")[0]['id'];

            Db::insert("
                INSERT INTO `params` (`figure_id`, `type`, `point_id`) VALUES (?, ?, ?)
                ",[$figure_id, $point, $point_id]
            );
        }
        return $figure_id;
    }

    public function setForm($form)
    {
        $this->form = $form;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setPoints($points)
    {
        foreach ($points as $position => $point){
            $this->points[$position] = [$point['x'], $point['y']];
        }
    }
}