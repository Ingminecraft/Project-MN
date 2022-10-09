<?php include('./connection/connection.php');?>

<?php
date_default_timezone_set('Asia/Bangkok');

$dateCheck = date("Y-m-d");
$dateCheck = date("d/m/Y",strtotime("-1 days",strtotime($dateCheck)));
//echo $dateCheck . "<br>";
$sql = "UPDATE dormstudent
INNER JOIN  withdrawitemrequestdocument
ON dormstudent.WIR_ID=withdrawitemrequestdocument.WIR_ID 
INNER JOIN  doposititem
ON dormstudent.DS_studentID=doposititem.DS_studentID 
SET DS_status = '0', WIR_date = NULL, WIR_time = NULL, DPI_status = '0'
WHERE WIR_date ='$dateCheck' and DPI_status = '1';";

$query = mysqli_query($conn,$sql);
//echo $sql;

?>