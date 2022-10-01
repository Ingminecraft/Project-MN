<?php include("./Header.php");?>
<?php include("./Menu.php");?>
<?php include("./SessionCheck.php");?>
<?php include('./connection/connection.php');?>
<?php 
$DN_ID = $_GET['DN_ID'];
$sql = "SELECT * FROM dormnews WHERE DN_ID = $DN_ID";
$query = mysqli_query($conn,$sql);
// แยกข้อมูลเป็น ROW
$row = mysqli_fetch_array($query);
//print_r($row);
?>
<br><br>
<font size ="+20" color = "black">แก้ไขข้อมูลข่าวสารหอพัก</font>
<br><br>
<table>
<form action="./EditNewsProcess.php?DN_ID=<?php echo $DN_ID;?>" method="post" enctype="multipart/form-data">
    <tr>
        <td align=right width=150px style="padding: 0px 30px 0px 0px;"><font size ="+1">หัวข้อข่าว</font></td>
        <td colspan="2">
        <input type="text" id="TopNews" name="TopNews" size="107" style="font-size:18px;height:25px;"
        title="กรุณากรอกหัวข้อข่าว" 
        value="<?php echo $row["DN_title"];?>"  maxlength="100"
        required>
        </td>
    </tr>
    <tr>
        <td align=right width=150px style="padding: 0px 30px 0px 0px;"><font size ="+1">เนื้อหาข่าวสาร</font></td>
        <td colspan="2">
        <textarea type="text" id="CenterNews" name="CenterNews" rows="10" cols="110" style=font-size:18px;
        title="กรุณากรอกเนื้อหาข่าวสาร" required><?php echo $row["DN_detail"];?></textarea>
        </td>
    </tr>
    <tr>
        <td align=right width=150px style="padding: 0px 30px 0px 0px;"><font size ="+1">เพิ่มรูปภาพ</font></td>
        <td width=450px><input type="file" id="display-image" name="image" accept="image/jpeg, image/png, image/jpg" 
        style="cursor:pointer;background-image: url('<?php echo "./".$row["DN_picture"];?>');">
        <td align=left><font size=+1 color=red>
        <scr id = TopNewsCheck></scr>   
        <br>
        <scr id = CenterNewsCheck></scr>
        </td>
        
    </tr>
    <tr>
        <td></td>
        <td colspan="2">
        <input type="submit" name="submit" value="ยืนยัน"></form>
        <a href="./Home.php"><button class=btnCancel onclick="history.back()">ยกเลิก</button></a>
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
// TopNews

var TopNews  =  document.getElementById("TopNews");
function CheckTopNews(){ 
  if(TopNews.value.length < 1) {
    document.getElementById("TopNewsCheck").innerHTML = ": กรุณากรอกหัวข้อข่าว";
  } else {
    document.getElementById("TopNewsCheck").innerHTML = "";
  } 
}
TopNews.onchange = CheckTopNews;
TopNews.onkeyup = CheckTopNews;
CheckTopNews();

// CenterNew

var CenterNews  =  document.getElementById("CenterNews");
function CheckCenterNews(){ 
  if(CenterNews.value.length < 1) {
    document.getElementById("CenterNewsCheck").innerHTML = ": กรุณากรอกเนื้อหาข่าว";
  } else {
    document.getElementById("CenterNewsCheck").innerHTML = "";
  } 
}
CenterNews.onchange = CheckCenterNews;
CenterNews.onkeyup = CheckCenterNews;
CheckCenterNews();


</script>
<?php include("./Footer.php");?>