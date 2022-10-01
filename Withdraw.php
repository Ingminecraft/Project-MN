<?php include("./connection/connection.php");?>
<?php include("./Header.php");?>
<?php include("./SessionMemberCheck.php");?>
<?php include("./Menu.php");?>
<?php
$ID = $_SESSION['UserID'];
$sql = "SELECT * FROM dormstudent 
INNER JOIN withdrawitemrequestdocument 
ON dormstudent.WIR_ID=withdrawitemrequestdocument.WIR_ID;";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);
$date = $row["WIR_date"];
$time = $row["WIR_time"];
$NewDate=Date('y:m:d', strtotime('-3 days'));
//echo $sql

?>
<br><br>
<table id=BoxGray align="center" 
style="width:90%;padding:0px 80px;border-radius:50px;border-color:black;border:solid;">
    <tr>
        <td width=250px>
            <h2>จัดการรายการของที่ฝาก</h2>
        </td>
        <td>
        <?php if(isset($_SESSION['level'])){if($_SESSION['level']=="A"){
                echo '<div align=right><form action="./WithdrawFiler.php?NameStd=" method="post">
                <select id="NameStd" name="NameStd">';
                foreach($query as $data){
                echo '<option value="'.$data['DS_fname'].'">'.$data['DS_fname'].'</option>';}
                echo'</select>
                <input type="submit" value="เรียกดู" style="width:100px;padding:4px">
                </div></form>';}}
                if(isset($_SESSION['level'])){if($_SESSION['level']=="M"){
                    $ID = $_SESSION['UserID'];
                    $sql = "SELECT * FROM dormstudent 
                    INNER JOIN withdrawitemrequestdocument 
                    ON dormstudent.WIR_ID=withdrawitemrequestdocument.WIR_ID
                    WHERE DS_studentID=$ID;";
                    $query = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_array($query);
                    $date = $row["WIR_date"];
                    $time = $row["WIR_time"];
                    $NewDate=Date('y:m:d', strtotime('-3 days'));
                    if($time==""){echo "";}else{
                    echo"<font color=red>กำหนดวันรับของคืน วันที่ ".$date." เวลา ".$time." น.</font>";
                }
                }}
                ?>        
        </td>
    </tr>
    <tr>
</table>
<?php
if(isset($_SESSION['level'])){if($_SESSION['level']=="A"){
$ID ="INNER JOIN dormstudent 
ON doposititem.DS_studentID=dormstudent.DS_studentID ORDER BY `dormstudent`.`DS_studentID` ASC";  
}else{
$ID = "WHERE DS_studentID=" . $_SESSION['UserID'] ;
}}
$sql = "SELECT * FROM doposititem $ID ";
$query = mysqli_query($conn,$sql);
//echo $sql
?>
<?php if(isset($_SESSION['level'])){if($_SESSION['level']=="M"){?>
<table align="center" style="width:80%;padding:5px 80px;border:solid;color:gray;">
<tr>
    <td>
        <a href="./AddWithdraw.php" class=TextButton style="color:gray">
            <font size=6>+ เพิ่มรายการของฝาก</font>
        </a>
    </td>
</tr>
</table>
<?php }}?>
<?php foreach($query as $data){ ?>
<table align="center" style="width:80%;padding:10px 10px 10px 80px;border:solid;border-color:gray;table-layout:fixed;">
    <tr>
    <td bgcolor="" width=70%>
    <a href="./ShowWithdraw.php?DPI_ID=<?php echo $data['DPI_ID'];?>
    "class=TextButton><font size=5><?php echo $data['DPI_detail']?></font></a>
    
    <?php
    if(isset($_SESSION['level'])){if($_SESSION['level']=="A"){
        echo "[".$data['DS_fname']." ".$data['DS_lname']." : ".$data['DS_studentID']."]";
    }};
    ?>
    </td>
    <td align ="Right">
    <?php if($data["DPI_status"]==0){echo "<font color=red>█</font> สถานะอยู่ในคลัง";} ?>
    <?php if($data["DPI_status"]==1){echo "<font color=orange>█</font> สถานะรอรับคืน";} ?>
    <?php if($data["DPI_status"]==2){echo "<font color=green>█</font> สถานะรับคืนแล้ว";} ?>
    <a href="./EditWithdraw.php?DPI_ID=<?php echo $data['DPI_ID'];?>">
    <button class=btnWhite><i class="fa fa-edit fa-2x"></i></button></a>

    <a href="./DeleteWithdraw.php?DPI_ID=<?php echo $data['DPI_ID'];?>">
    <button class=btnWhiteD><i class="fa fa-trash fa-2x"></i></button></a>
    
    </td>
    </tr>
</table>
<?php }?>
<?php include("./Footer.php");?>  