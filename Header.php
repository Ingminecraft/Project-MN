<!doctype HTML>
<html>
    <?php session_start();
//print_r($_SESSION);
if(isset($_SESSION["User"])){
    $Name = $_SESSION["User"];
    $ID = $_SESSION["UserID"];
    $Logout = "<a href='./Logout.php'><button class='btnCancel' style='padding:5px;border-radius:5px;width:120px'>ออกจากระบบ</button></a>";
    if($_SESSION["level"] == "A"){
        $Profile = "<img style='vertical-align:middle' src='./image/AdminProfile.jpg' height='60' width='60'> &nbsp;";
    }elseif($_SESSION["level"] == "M"){
        $Profile = "<img style='vertical-align:middle' src='./image/MemberProfile.jpg' height='60' width='60'> &nbsp;";
    }else{$Profile = "";}
}else{
    $Name = "<a href='./Login.php'><button class='btnOk' style='padding:5px;border-radius:5px;width:120px'>เข้าสู่ระบบ</button></a>";
    $Logout = "<a href='./AddStd.php'><button class='btnOk' style='padding:5px;border-radius:5px;width:120px'>ลงทะเบียน</button></a>";
    $Profile = "";
}
?>
    <head><title>Cheattamas Website</title></head>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Kanit">
        <style>
 .container {
  position: relative;
}
.overlay {
  position: absolute; 
  bottom: 0; 
  width: 30%;
  height: 174px;
  opacity:1;
  font-size: 20px;
  padding: 20px;
  text-align: right;
  top : 0px;
  left: 835px;
  align-items:center;
}
        </style>
<body>
    <table align="center" cellpadding="1"  hegiht="100%" width="700" >
        <tr>
            <td valign="top" colspan="6">
                <div class="container">
                <img src="./image/BetaBanner.png" height="215" width="1280">
                <div class="overlay">             
                <br><br>
                <table align=right>
                    <tr>
                    <td rowspan="2">
                        <?php echo $Profile?>
                    </td>
                        <td>
                            <font color=white><?php echo $Name?></font>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $Logout?>
                        </td>
                    </tr>
                </table>
                </div>
                </div>
            </td>
        </tr>
        