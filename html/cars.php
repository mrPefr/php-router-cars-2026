<?php
include("start.php");
$cars = Cars::getCars();


?>

<h2>CARS</h2>

<?php foreach($cars as $car): extract($car) ?>
   

    <div class="car">
        <h3><?= htmlspecialchars($brand); ?></h3>
        <h4><?= htmlspecialchars($model) ?></h4>
        <h5><?= htmlspecialchars($price) ?></h5>
        <a href="/deletecar/<?=$id?>">DELETE</a>
    </div>


<?php endforeach; ?>

<?php include("end.php"); ?>