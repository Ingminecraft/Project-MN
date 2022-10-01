<?php
if($_SESSION["level"]!="A"){
    echo "<script>";
    echo "alert(\"คุณไม่มีสิทธิในการเข้าถึง\");"; 
    echo "window.history.back()";
    echo "</script>";
  }
?>