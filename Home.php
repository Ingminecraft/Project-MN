<?php include("./connection/connection.php");?>
<?php include("./Header.php");?>
<?php include("./Menu.php");?>
<?php
$sql = "SELECT * FROM dormnews ORDER BY `dormnews`.`DN_ID` DESC";
$query = mysqli_query($conn,$sql);
?>
<br><br>
<table id=BoxGray align="center" 
style="width:90%;padding:0px 80px;border-radius:50px;border-color:black;border:solid;">
    <tr>
        <td>
            <h2>ข่าวสารหอพัก</h2>
        </td>
    </tr>
    <tr>
</table>
<!-- Admin Only -->
<?php if(isset($_SESSION['level'])){if($_SESSION['level']=="A"){?>
<table align="center" style="width:80%;padding:5px 80px;border:solid;color:gray;">
<tr>
    <td>
        <a href="./AddNews.php" class=TextButton style="color:gray">
            <font size=6>+ เพิ่มข้อมูลข่าวสาร</font>
        </a>
    </td>
</tr>
</table>
<?php }}?>
<!-- All User -->
<?php foreach($query as $data){ ?>
<table align="center" style="width:80%;padding:10px 10px 10px 80px;border:solid;border-color:gray;table-layout:fixed;">
    <tr>
    <td bgcolor="" width=90%>
    <a href="./ShowNews.php?DN_ID=<?php echo $data['DN_ID'];?>" class=TextButton><font size=5><?php echo $data['DN_title']?></font></a>
    </td>
    <td align ="Right">
    <?php if(isset($_SESSION['level'])){if($_SESSION['level']=="A"){?>
    <a href="./EditNews.php?DN_ID=<?php echo $data['DN_ID'];?>">
    <button class=btnWhite><i class="fa fa-edit fa-2x"></i></button></a>

    <a href="./DeleteNews.php?DN_ID=<?php echo $data['DN_ID'];?>">
    <button class=btnWhiteD><i class="fa fa-trash fa-2x"></i></button></a>
    
    <?php }if($_SESSION['level']=="M"){echo $data['DN_date'];}
    }else{echo $data['DN_date'];}?>
    </td>
    </tr>
</table>
<?php }?>
<?php include("./Footer.php");?>  