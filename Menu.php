<style>
        .zoom {
    transition: transform 0.25s;
    transform: scale(1.0);
        }
        .zoom:hover {
    transform: scale(1.0) translate(0px, 15px);
    animation: move_down 0.5s;
    animation-iteration-count: infinite;
        }
        .btnAddAdmin {
    width: 100%;
    background-color: #BBBBBB; 
    border-color: black;
    color: white;
    padding: 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 20px;
    margin: 4px 2px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    border-radius: 8px;
    color: black;
    font-family: Kanit;
}
    .btnAddAdmin:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
    background-color: orange;
    
}
    .btnEdit {
    background-color: Gray;
    border: none;
    color: white;
    padding: 12px 16px;
    font-size: 16px;
    cursor: pointer;
    transition: 0.5s;
    width: 100px;
}   
    .btnEdit:hover {background-color: orange;}

    .btnWhite {
    border-radius: 10px;
    background-color: white;
    border: none;
    color: Black;
    font-size: 16px;
    cursor: pointer;
    transition: 0.5s;
    height: 40px;
    width: 40px;
}   
    .btnWhite:hover {background-color: orange;}
    
    .btnWhiteD {
    border-radius: 10px;
    background-color: white;
    border: none;
    color: Black;
    font-size: 16px;
    cursor: pointer;
    transition: 0.5s;
    height: 40px;
    width: 40px;
}   
    .btnWhiteD:hover {background-color: Red;}
    .btnDelete {
    border-radius: 0px 13px 13px 0px;
    background-color: red;
    border: none;
    color: white;
    padding: 12px 16px;
    font-size: 16px;
    cursor: pointer;
    transition: 0.5s;
    opacity: 0.7;
}   
    .btnDelete:hover {opacity: 1;}

    .btnOk{
    border-radius: 10px;
    background-color: green;
    border: none;
    color: white;
    padding: 7px 80px;
    width: 100px;
    font-size: 16px;
    cursor: pointer;
    transition: 0.5s;
    opacity: 1;
    margin: 2px;
    width: 200px;
}   
    .btnOk:hover{background-color: #6EFF2F;}

    input[type=submit] {
    border-radius: 10px;
    background-color: green;
    border: none;
    color: white;
    padding: 7px 80px;
    width: 100px;
    font-size: 16px;
    cursor: pointer;
    transition: 0.5s;
    opacity: 1;
    margin: 2px;
    width: 200px;
}   
    input:hover[type=submit]{background-color: #6EFF2F;}

    .btnCancel {
    border-radius: 10px;
    background-color: Gray;
    border: none;
    color: white;
    padding: 7px 80px;
    font-size: 16px;
    cursor: pointer;
    transition: 0.5s;
    opacity: 1;
    margin: 2px;
    width: 200px;
}   
    .btnCancel:hover {background-color: Red;}

    #BoxBlackGray {
    border-radius: 15px;
    background: #474747;
    padding: 0px 0px 0px 80px; 
    width: 1280px;
} 
    #BoxGray {
    border-radius: 40px;
    background: #D5D5D5;
    padding: 10px; 
    width: 500px;
}
.TextButton:link {
  color: black;
  text-decoration: ;
  font-weight: normal;
}
.TextButton:visited {
  color: black;
  text-decoration: ;
  font-weight: normal;
}
.TextButton:hover {
  color: orange;
  font-weight: bold;
  text-decoration: underline;
}
a { text-decoration: none; }

#display-image{
  width: 400px;
  height: 225px;
  border: 1px solid black;
  background-position: center;
  background-size: cover;
  text-align:center;
  background-image: url("./image/AddPic.png");
  font-size:0px;
}
input[type="file"]::file-selector-button {
 opacity:0;
}

body{font-family: Kanit;}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<tr>
    <td valign="top" bgcolor="">
        <div class=zoom>
        <a href="./login.php"><img src="./image/LoginBotton.png" height="70" width="180"></a><br>
        </div>
    <td valign="top" bgcolor="">    
        <div class=zoom>
        <a href="./ShowAdmin.php"><img src="./image/LoginBotton.png" height="70" width="180"></a><br>
        </div>
    <td valign="top" bgcolor=""> 
        <div class=zoom>
        <a href="./Home.php"><img src="./image/LoginBotton.png" height="70" width="180"></a><br>
        </div>
    <td valign="top"  bgcolor=""> 
        <div class=zoom>
        <a href="./Withdraw.php"><img src="./image/LoginBotton.png" height="70" width="180"></a><br>
        </div>
    <td valign="top" bgcolor=""> 
        <div class=zoom>
        <a href="./profile.php"><img src="./image/LoginBotton.png" height="70" width="180"></a><br>
        </div>
    <td valign="top" bgcolor=""> 
        <div class=zoom>
        <a href="./profile.php"><img src="./image/LoginBotton.png" height="70" width="180"></a><br>
        </div>
    </td>
    <tr>
        <td bgcolor="" valign="top" colspan="6" hegiht="100%" width="900" align="">
        