<?php include("start.php");?>


<div class="form">
    <form action="/login" method="post">
        <input required type="email" name="email" placeholder="EMAIL" autocomplete="true">
        <input required type="password" name="password" placeholder="PASSWORD">
        <input type="submit" value="LOGIN">
    </form>
</div>




<?php include("end.php"); ?>