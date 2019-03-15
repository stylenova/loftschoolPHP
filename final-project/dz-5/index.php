<?php
/**
 * Created by PhpStorm.
 * User: style
 * Date: 12.03.2019
 * Time: 13:19
 */

require_once 'vendor/autoload.php';
$imagine = new Imagine\Gd\Imagine();
$point = new Imagine\Image\Point(250, 400);
$img = $imagine->open('puma.jpg');
$size = $img->getSize();
$relation = $size->getHeight() / $size->getWidth();
$watermark = $imagine->open('watermark.jpg', $point);
$img
    ->rotate(90)
    ->paste($watermark, $point)
    ->resize(new \Imagine\Image\Box(400, 400 * $relation))
    ->save('puma-edited.jpg'); ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Работа с фото</title>
    <style>
        body {
            background: #333;
        }

        .container {
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 50px;
            background: #fff;
            width: 1170px;
            margin: 30px auto;
        }

        .wrap {
            display: flex;
            justify-content: space-between;
        }

        .source__image img {
            max-width: 400px;
        }
    </style>
</head>
<body>

<section class="main">
    <div class="container">
        <div class="wrap">
            <div class="source">
                <div class="source__title">Исходник</div>
                <div class="source__image">
                    <img src="puma.jpg" class="source__img" alt="фото пумы">
                </div>
            </div>

            <div class="watermark">
                <div class="watermark__title">watermark</div>
                <div class="watermark__image">
                    <img src="watermark.jpg" class="watermark__img" alt="фото пумы">
                </div>
            </div>

            <div class="source">
                <div class="source__title">Результат</div>
                <div class="source__image">
                    <img src="puma-edited.jpg" class="source__img" alt="фото пумы после обработки">
                </div>
            </div>
        </div>
    </div>
</section>


</body>
</html>