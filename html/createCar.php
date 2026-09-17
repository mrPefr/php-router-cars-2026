<?php
include("start.php");
?>

<h2>CREATE CAR</h2>
<div class="car create">
    <form action="/cars/create" method="post">
        <input required type="text" name="brand" placeholder="BRAND">
        <input required type="text" name="model" placeholder="MODEL">
        <input required type="number" name="price" placeholder="PRICE">
        <input type="submit" value="SAVE">

    </form>

</div>


<?php include("end.php"); ?>