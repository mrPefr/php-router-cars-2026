<?php
include("start.php");



?>

<h2>ERROR</h2>
<?php if(isset($message)){
    $message = urldecode($message);
    echo "<h3>$message</h3>";
}
?>


<?php include("end.php"); ?>