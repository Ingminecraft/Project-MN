<?php
if($_SESSION["level"]=="M"){}elseif($_SESSION["level"]=="A"){}else{
    echo "<script>";
    echo "location.href = './Login.php';";
    echo "</script>";
}
?>