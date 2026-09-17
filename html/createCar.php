<?php
include("start.php");
?>

<h2>CREATE CAR</h2>
<div class="car create">
    <form action="/cars/create" method="post">
        <input type="text" name="brand" placeholder="BRAND">
        <input type="text" name="model" placeholder="MODEL">
        <input type="number" name="price" placeholder="PRICE">
        <input type="submit" value="SAVE">

    </form>

</div>


<?php include("end.php"); ?>