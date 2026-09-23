<?php include("start.php");?>


<div class="form">
    <h2>LOGIN</h2>
    <form action="/login" method="post">
        <input required type="email" name="email" placeholder="EMAIL" autocomplete="true">
        <input required type="password" name="password" placeholder="PASSWORD">
        <input type="submit" value="LOGIN">
    </form>
</div>


<?php include("end.php"); ?>