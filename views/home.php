<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="<?php asset('assets/css/style.css') ?>">
</head>

<body>
    <div class="container">
        <?php
        foreach ($cities as $city) {
            echo '<div class="card">
                    <p>name_ar : '.$city->name_ar.'</p>
                    <p>name_en : '.$city->name_en.'</p>
                </div>';
        }
        ?>
    </div>

    <script src="<?php asset('assets/js/herhesh.js') ?>"></script>
    <script src="<?php asset('assets/js/main.js') ?>"></script>
</body>

</html>