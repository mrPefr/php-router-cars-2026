<?php
include("start.php");
$cars = Cars::getCars();


?>

<h2>CARS</h2>

<?php foreach ($cars as $car): extract($car) ?>


    <div class="car">
        <h3><?= htmlspecialchars($brand); ?></h3>
        <h4><?= htmlspecialchars($model) ?></h4>
        <h5><?= htmlspecialchars($price) ?></h5>
        <a href="/deletecar/<?= $id ?>">DELETE</a>
        <details>
            <summary>EDIT</summary>
            <div class="car create">
                <form action="/cars/update" method="post">
                    <input type="hidden" name="id" value = "<?= $id ?>">
                    <input type="text" name="brand" placeholder="BRAND" value = "<?= $brand ?>">
                    <input type="text" name="model" placeholder="MODEL" value = "<?= $model ?>">
                    <input type="number" name="price" placeholder="PRICE" value = "<?= $price ?>">
                    <input type="submit" value="UPDATE CHANGES">

                </form>

            </div>
        </details>
    </div>


<?php endforeach; ?>

<?php include("end.php"); ?>