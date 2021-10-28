<?php
require_once 'autoload.php';

use Controllers\HomeController;

$cities = HomeController::cities();
?>
<section style="text-align:center;margin-top:50px">
    <?php
    foreach ($cities as $city) :
        echo '<div>' . $city->name_en . '</div>';
    endforeach;
    ?>
</section>


<script src="assets/js/herhesh.js"></script>
<script src="assets/js/main.js"></script>