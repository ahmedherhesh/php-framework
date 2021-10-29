<link rel="stylesheet" href="<?php asset('assets/css/style.css') ?>">

<h1>Home</h1>
<?php
foreach($r['cities'] as $city){
    echo $city->name_en , '<br>';
}
?>