<?php
session_start();

if (!isset($_SESSION['code_name'])) {
    header("Location: veryfikasi_scurity.php");
}
require 'functions.php';
//ambil data di url
$id = $_GET["id"];
//query data dengan id
$mhs = query("SELECT * FROM user_pengguna WHERE id
= $id")[0];
?>

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>www.Alchat.com/<?= $mhs["nama"];?></title>
     <link rel="stylesheet" href="fontawesome/css/all.css">
    <style type="text/css" media="all">
      @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');


* {
margin: 0;
padding: 0;
box-sizing: border-box;
font-family: 'Roboto', sans-serif;
}

body {
width: 100%;
height: 100vh;
display: -webkit-box;
display: flex;
position: relative;
background: #e5e5e5;
-webkit-box-align: center;
        align-items: center;
-webkit-box-orient: vertical;
-webkit-box-direction: normal;
        flex-direction: column;
-webkit-box-pack: center;
        justify-content: center;
font-family: 'Roboto', sans-serif;
font-size: 100%;
}




.wrapper 
{
width: 340px;
height: 540px;
background: #e5e5e5;
border-radius: 10px;
padding: 20px 20px 20px 20px;
box-shadow: 4px 4px 12px #c0c0c0,-4px -4px 12px #fff!important;
}
.wrapper .top-icons i 
{
color: #2D354A;
}
.wrapper .top-icons i:nth-of-type(1) 
{
float: left;
}
.wrapper .top-icons i:nth-of-type(2) 
{
float: right;
}
.wrapper .top-icons i:nth-of-type(3) 
{
float: left;
padding-right: .8em;
}
.wrapper .profile 
{
margin-top: 2em;
position: relative;
}
.wrapper .profile:after 
{
width: 100%;
height: 1px;
content: ' ';
display: block;
margin-top: 1.3em;
background: #E9EFF6;
}
.wrapper .profile .check 
{
position: absolute;
right: 5em;
bottom:15.7em;
}
.wrapper .profile .check i 
{
color: #fff;
width: 20px;
height: 20px;
font-size: 12px;
line-height: 20px;
text-align: center;
border-radius: 100%;
background: linear-gradient(to bottom, #f95052, #b6375b);
}
.wrapper .profile .thumbnail 
{
width: 125px;
height: 125px;
display: flex;
margin-left: auto;
margin-right: auto;
margin-bottom: 1.5em;
border-radius: 100%;
box-shadow: 6px 6px 12px #b8b9be,-6px -6px 12px #fff!important;
}
.wrapper .profile .name 
{
color: #2D354A;
font-size: 24px;
font-weight: 600;
text-align: center;
text-transform: uppercase;
}
.wrapper .profile .number
{
padding-top: 9px;
color: #2D354A;
font-size: 20px;
font-weight: 600;
text-align: center;
}

.wrapper .profile .title 
{ 
color: #f95052;
text-shadow: 2px 2px 3px #b8b9be,
            -2px -2px 3px #fff !important;
font-size: 20px;
font-weight: 600;
text-align: center;
padding-top: .5em;
padding-bottom: .7em;
letter-spacing: 1.5px;
}
.wrapper .profile .description {
/*color: #080911;*/
color: #a5a7af;
font-size: 14px;
font-weight: 300;
text-align: center;
margin-bottom: 1.3em;
}
.wrapper .profile .btn {
color: #fff;
width: 230px;
height: 42px;
font-size: 18px;
outline: none;
border: none;
display: block;
cursor: pointer;
font-weight: 500;
margin-left: auto;
margin-right: auto;
border-radius: 70px;
box-shadow: 5px 5px 8px #b8b9be,-5px -5px 10px #fff !important;
background: linear-gradient(to bottom, #f95052, #b6375b);
text-shadow: 1px 1px 2px #f95052,-1px -1px 2px #b6375b !important;

}
.wrapper .profile .btn:hover
{
background: linear-gradient(to bottom, #f3f3f3, #dedede);
color: #f95052;
text-shadow: 2px 2px 3px #b8b9be, -2px -2px 3px #fff !important;

}

.wrapper .social-icons {
display: -webkit-box;
display: flex;
margin-top:0.5em;
margin-right: 20px;
margin-left: 20px;
-webkit-box-pack: justify;
        justify-content: space-between;
}
.wrapper .social-icons .icon {
display: -webkit-box;
display: flex;
-webkit-box-align: center;
        align-items: center;
-webkit-box-orient: vertical;
-webkit-box-direction: normal;
        flex-direction: column;
}
.wrapper .social-icons .icon a {
color: #fff;
width: 50px;
height: 50px;
font-size: 24px;
line-height: 51px;
text-align: center;
border-radius: 30px;
box-shadow: 5px 5px 8px #b8b9be,-5px -5px 10px #fff !important;
}
.wrapper .social-icons .icon:nth-of-type(1) a {
background: linear-gradient(to bottom, #f95052, #b6375b);
}
.wrapper .social-icons .icon:nth-of-type(2) a {
background: linear-gradient(to bottom right, #4564a5, #244078);
}
.wrapper .social-icons .icon:nth-of-type(3) a {

background: linear-gradient(to bottom right, #1e84b6, #03567e);
}
.wrapper .social-icons .icon h4 {
color: #0b264f;
font-size: 1em;
margin-top: 1.3em;
margin-bottom: .2em;
}
.wrapper .social-icons .icon p {
color: #666B7D;
font-size: 12px;
}


    </style>
  </head>
  <body>
        <div class="wrapper">
        <div class="top-icons">
            <i class="fas fa-ellipsis-v"></i>
            <i class="far fa-heart"></i>
        </div>
        
        <div class="profile">
           <img src="profil/<?= $mhs["gambar"];?>" class="thumbnail">
            <h3 class="name"><?= $mhs["nama"];?></h3>
            <h3 class="number"><?= $mhs["telepon"];?></h3>
            <p class="title"><?= $mhs["email"];?></p>
            <p class="description"><?= $mhs["alamat"];?></p>
            <button type="button" class="btn">Subscribe</button>
        </div>
        
        <div class="social-icons data">
            <div class="icon">
                <a href="/"><i class="fab fa-dribbble"></i></a>
                <h4><span class="count">60</span>k</h4>
                <p>Followers</p>
            </div>
            <div class="icon">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <h4><span class="count">72</span>k</h4>
                <p>Followers</p>
            </div> 
            <div class="icon">
                <a href="#"><i class="fab fa-twitter"></i></a>
                <h4><span class="count">10</span>k</h4>
                <p>Followers</p>
            </div>
        </div>
    </div>
    
    
   


<script src="js/jquery-1.12.4.min.js"></script>
<script src="js/Jquery.rcounter.js"></script>
<script src="js/waypoints_4.0.1_jquery.js"></script>
<script src="js/active.js">
</script>
  </body>
</html>