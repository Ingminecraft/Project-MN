<?php include("./Header.php");?>
<?php include("./Menu.php");?>
<?php include("./SessionMemberCheck.php");?>
<?php include('./connection/connection.php');?>
<?php 
$DPI_ID = $_GET['DPI_ID'];
$sql = "SELECT * FROM doposititem WHERE DPI_ID = $DPI_ID";
$query = mysqli_query($conn,$sql);
// แยกข้อมูลเป็น ROW
$row = mysqli_fetch_array($query);
//print_r($row);
?>
<br><br>
<font size ="+20" color = "black">แก้ไขรายการของฝาก</font>
<br><br>
<table>
<form action="./EditWithdrawProcess.php?DPI_ID=<?php echo $DPI_ID;?>" method="post" enctype="multipart/form-data">
    <tr>
        <td align=right width=200px style="padding: 0px 30px 0px 0px;"><font size ="+1">รายละเอียดของที่ฝาก</font></td>
        <td colspan="2">
        <textarea type="text" id="DPI_detail" name="DPI_detail" rows="5" cols="110" style=font-size:18px;
        title="รายละเอียดของที่ฝาก" required><?php echo $row["DPI_detail"];?></textarea>
        </td>
    </tr>
    <tr>
        <td align=right width=200px style="padding: 0px 30px 0px 0px;"><font size ="+1">แก้ไขรูปภาพ</font></td>
        <td width=450px><input type="file" id="display-image" name="image" accept="image/jpeg, image/png, image/jpg" 
        style="cursor:pointer;background-image: url('<?php echo "./".$row["DPI_picture"];?>');">
        <td align=left><font size=+1 color=red>
     

        <scr id = CenterCheck></scr>
        </td>
        
    </tr>
    <tr>
        <td></td>
        <td colspan="2">
        <input type="submit" name="submit" value="ยืนยัน"></form>
        <button class=btnCancel onclick="history.back()">ยกเลิก</button>
        </td>
    </tr>
<table>
<script>
    const image_input = document.querySelector("#display-image");
    

function upload(){
image_input.addEventListener("change", function() {
  const reader = new FileReader();
  reader.addEventListener("load", () => {
    const uploaded_image = reader.result;
    document.querySelector("#display-image").style.backgroundImage = `url(${uploaded_image})`;
    document.getElementById("Added").innerHTML = "<i class='fa fa-2x fa-plus' style=opacity:0.0;>";
  });
  reader.readAsDataURL(this.files[0]);
});}
upload();

// CenterNew

var CenterNews  =  document.getElementById("DPI_detail");
function CheckCenterNews(){ 
  if(CenterNews.value.length < 1) {
    document.getElementById("CenterCheck").innerHTML = " กรุณากรอก รายละเอียดของฝาก";
  } else {
    document.getElementById("CenterCheck").innerHTML = "";
  } 
}
CenterNews.onchange = CheckCenterNews;
CenterNews.onkeyup = CheckCenterNews;
CheckCenterNews();


</script>
<?php include("./Footer.php");?>