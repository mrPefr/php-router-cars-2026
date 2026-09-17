<?php include("start.php"); ?>

<h2>CARS</h2>
<p>This is my cars page....</p>

<p>
    <?php
    if (isset($id)) echo "Du vill se bil med id $id";
    ?>
</p>



<?php include("end.php"); ?>