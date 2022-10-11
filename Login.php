<?php include("./Header.php");?>
<?php include("./Menu.php");?>
<table align ="center">
    <br><br>
    <tr>
        <td colspan="2" align ="center">
           <font size=7>Login</font>
        </td>
    </tr>
    <form name="Login" action="./LoginProcess.php" method="post">
    <tr>
        <td colspan="2" align ="center">
            <input type="text" name="username" placeholder="  รหัสผู้ใช้งาน" size="22"
            style="background-color:#D5D5D5;border:0px;height:20px;">
            <div style="line-height:5px"><br></div>
        </td>
    <tr>
        <td colspan="2" align ="center">
            <input type="password" name="password" placeholder="  รหัสผ่าน" size="22"
            style="background-color:#D5D5D5;border:0px;height:20px;">
            <div style="line-height:10px"><br></div>
        </td>
    <tr>
        <td align ="right">
           <input type="submit" name="login_user" value="เข้าสู่ระบบ" text-align="center"
           style="width:100px;font-size:14px;padding: 5px;">
           </form>
        </td>
        <td align ="left">
            <a href="./Home.php">
            <button class=btnCancel
            style="width:100px;font-size:14px;padding: 5px;">ยกเลิก</button></a>
        </td>
    <tr>
        <td colspan="2" align ="center">
        <font color= red><br>
            <?php if(isset($_SESSION['error'])){
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            }?>
        </font>
    </tr>
</table>

<?php include("./Footer.php");?>