<?php

use App\Figures\RepositoryFigures;

include __DIR__."/vendor/autoload.php";

$repositoryFigure = new RepositoryFigures();
$figures = $repositoryFigure->getAllFigures();
//echo "<pre>";
//print_r($figures);
//echo "</pre>";
//exit();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/style.css">
    <title>Document</title>
</head>
<body>
<div class="container">
    <button type="button" class="btn btn-primary mt-4 mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">Добавить фигуру</button>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Фигура</th>
            <th scope="col">Площадь</th>
        </tr>
        </thead>
        <tbody id="figure-list">
        <?php foreach ($figures as $num => $figure): ?>
            <tr class="figure-item">
                <th scope="row"><?= $num+1 ?></th>
                <td><?= $figure->getTitle(); ?></td>
                <td><?= $figure->getArea(); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="new-form" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Новая фигура</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="h2 mt-3 mb-3">Выберите фигуру:</p>
                <select name="form" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" onchange="changeInputBlock(this.value);">
                    <option value="circle">Круг</option>
                    <option value="triangle">Треугольник</option>
                    <option value="parallelogram">Параллелограмм</option>
                </select>
                <div data-type="circle" class="input-figures active">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Center</span>
                        <input name="circle[center][x]" placeholder="x" type="number" min="0" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        <input name="circle[center][y]" placeholder="y" type="number" min="0" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Radius</span>
                        <input name="circle[radius][x]" placeholder="x" type="number" min="0" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        <input name="circle[radius][y]" placeholder="y" type="number" min="0" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                </div>
                <div data-type="triangle" class="input-figures">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Point #1</span>
                        <input name="triangle[point1][x]" placeholder="x" type="number" min="0" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        <input name="triangle[point1][y]" placeholder="y" type="number" min="0" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Point #2</span>
                        <input name="triangle[point2][x]" placeholder="x" type="number" min="0" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        <input name="triangle[point2][y]" placeholder="y" type="number" min="0" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Point #3</span>
                        <input name="triangle[point3][x]" placeholder="x" type="number" min="0" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        <input name="triangle[point3][y]" placeholder="y" type="number" min="0" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                </div>
                <div data-type="parallelogram" class="input-figures">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Point #1</span>
                        <input name="parallelogram[point1][x]" placeholder="x" type="number" min="0" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        <input name="parallelogram[point1][y]" placeholder="y" type="number" min="0" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Point #2</span>
                        <input name="parallelogram[point2][x]" placeholder="x" type="number" min="0" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        <input name="parallelogram[point2][y]" placeholder="y" type="number" min="0" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Point #3</span>
                        <input name="parallelogram[point3][x]" placeholder="x" type="number" min="0" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        <input name="parallelogram[point3][y]" placeholder="y" type="number" min="0" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                <button type="submit" class="btn btn-primary">Сохранить фигуру</button>
            </div>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="/assets/script.js"></script>
</body>
</html>