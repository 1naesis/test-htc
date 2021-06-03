<?php


namespace App\Figures;


use App\Components\Db;

class RepositoryFigures
{
    public function getAllFigures()
    {
        $all_figures = Db::query("
            SELECT 
                   `figures`.`id` as `id_figure`, 
                   `figures`.`type` as `form`, 
                   `params`.`id` as `id_param`, 
                   `params`.`type` as `point`,
                   `points`.`x` as `x`,
                   `points`.`y` as `y`
            FROM `figures`
            LEFT JOIN `params` ON `params`.`figure_id` = `figures`.`id`
            LEFT JOIN `points` ON `points`.`id` = `params`.`point_id`
        ");
        $new_figures = [];
        $tmp_figures = [];
        foreach ($all_figures as $figure){
            $tmp_figures[$figure['id_figure']]['form'] = $figure['form'];
            $tmp_figures[$figure['id_figure']]['positions'][$figure['point']]['x'] = $figure['x'];
            $tmp_figures[$figure['id_figure']]['positions'][$figure['point']]['y'] = $figure['y'];
        }
        foreach ($tmp_figures as $tmp_figure){
            if ($tmp_figure['form'] == 'circle') {
                $figure = new Circle();
            }else if ($tmp_figure['form'] == 'parallelogram') {
                $figure = new Parallelogram();
            }else if ($tmp_figure['form'] == 'triangle') {
                $figure = new Triangle();
            }
            if(isset($figure)){
                $figure->setForm($tmp_figure['form']);
                $figure->setPoints($tmp_figure['positions']);
                $new_figures[] = $figure;
            }
        }
        return $new_figures;
    }

    public function getFigureById($id)
    {
        $raw_figure = Db::query("
            SELECT
                   `figures`.`id` as `id_figure`,
                   `figures`.`type` as `form`,
                   `params`.`id` as `id_param`,
                   `params`.`type` as `point`,
                   `points`.`x` as `x`,
                   `points`.`y` as `y`
            FROM `figures`
            LEFT JOIN `params` ON `params`.`figure_id` = `figures`.`id`
            LEFT JOIN `points` ON `points`.`id` = `params`.`point_id`
            WHERE `id` = ?
        ", [$id]);
        return $id;
    }
}