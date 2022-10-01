<?php include("./Header.php");?>
<?php include("./Menu.php");?>
<?php include('./connection/connection.php');?>
<?php
$sql = "SELECT * FROM dorminformation";
$query = mysqli_query($conn,$sql);
?>
    <br>
    <font size ="+20" color = "black">
       รายละเอียดหอพัก
    </font><br><br>
    <!-- แสดงรายชื่อ -->
<?php foreach($query as $data){ ?>
    <table id=BoxGray style="border-radius: 0px;width:90%;" align=center>
    <tr>
        <td width=50% align=center>
            <img Src="<?php echo $data['DI_picture']?>" width=300px>
        </td>
        <td valign=top><br><br>
            <font size='6'>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php echo "ฉบับวันที่ ".$data['DI_date']?>

        </td>
        <td valign=top align=right>
        <?php if(isset($_SESSION['level'])){if($_SESSION['level']=="A"){?>
    <a href="./EditInfo.php?DI_ID=<?php echo $data['DI_ID'];?>">      
    <button class=btnGray><i class="fa fa-edit fa-2x"></i></button></a>
    <?php }} ?>
        </td>
    </tr>
    <tr>
        <td colspan="3"  align=center >
            <br>
            <?php echo $data['DI_detail']?>
        </td>
    </tr>    
    <tr>
        </tr>
    </table>
    <br>
<?php }?>
<?php include("./Footer.php");?>    