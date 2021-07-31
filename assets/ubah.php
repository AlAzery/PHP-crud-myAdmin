<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
require 'functions.php';
//ambil data di url
$id = $_GET["id"];
//query data dengan id
$mhs = query("SELECT * FROM user_pengguna WHERE id
= $id")[0];
//cek sumbit
if ( isset($_POST["klik"])) {
  
  if (ubah($_POST) > 0) {
    echo("
    <script>
    alert('berhasil mengubah');
    document.location.href = 'tampil.php';
    </script>
    ");
  }else {
    echo("
    <script>
    alert('gagal mengubah!');
    document.location.href = 'index.php';
    </script>
    ");
  }
  
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>edit</title>
   <style type="text/css" media="all">
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Montserrat', sans-serif;
}
body{
  background: #e7e5e5;
  padding: 0 10px;
  width: 100%;
}
.wrapper{
  max-width: 500px;
  width: 100%;
  background: #fff;
  margin: 20px auto;
  box-shadow: 1px 1px 2px rgba(0,0,0,0.125);
  padding: 30px;
  border-radius: 10px;
}

.wrapper .title{
  font-size: 24px;
  font-weight: 700;
  margin-bottom: 25px;
  color: #2262a6;
  text-transform: uppercase;
  text-align: center;
}

.wrapper .form{
  width: 100%;
}

.wrapper .form .inputfield{
  margin-bottom: 15px;
  display: flex;
  align-items: center;
}
.wrapper .form .inputfield img{
  margin-left: 30%;
  border-radius: 50%;
  border: 5px solid white;
  box-shadow: 0 2px 6px #0003;
}

.wrapper .form .inputfield label{
   width: 200px;
   color: #757575;
   margin-right: 10px;
  font-size: 14px;
}
.wrapper .form .inputfield .input,
.wrapper .form .inputfield .textarea{
  width: 100%;
  outline: none;
  border: 1px solid #d5dbd9;
  font-size: 15px;
  padding: 8px 10px;
  border-radius: 3px;
  transition: all 0.3s ease;
}

.wrapper .form .inputfield .textarea{
  width: 100%;
  height: 125px;
  resize: none;
}

.wrapper .form .inputfield .custom_select{
  position: relative;
  width: 100%;
  height: 37px;
}

.wrapper .form .inputfield .custom_select:before{
  content: "";
  position: absolute;
  top: 12px;
  right: 10px;
  border: 8px solid;
  border-color: #d5dbd9 transparent transparent transparent;
  pointer-events: none;
}

.wrapper .form .inputfield .custom_select select{
  -webkit-appearance: none;
  -moz-appearance:   none;
  appearance:        none;
  outline: none;
  width: 100%;
  height: 100%;
  border: 0px;
  padding: 8px 10px;
  font-size: 15px;
  border: 1px solid #d5dbd9;
  border-radius: 3px;
}


.wrapper .form .inputfield .input:focus,
.wrapper .form .inputfield .textarea:focus,
.wrapper .form .inputfield .custom_select select:focus{
  border: 1px solid #fec107;
}

.wrapper .form .inputfield p{
   font-size: 14px;
   color: #757575;
}
.wrapper .form .inputfield .check{
  width: 15px;
  height: 15px;
  position: relative;
  display: block;
  cursor: pointer;
}
.wrapper .form .inputfield .check input[type="checkbox"]{
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
}
.wrapper .form .inputfield .check .checkmark{
  width: 15px;
  height: 15px;
  border: 1px solid #fec107;
  display: block;
  position: relative;
}
.wrapper .form .inputfield .check .checkmark:before{
  content: "";
  position: absolute;
  top: 1px;
  left: 2px;
  width: 5px;
  height: 2px;
  border: 2px solid;
  border-color: transparent transparent #fff #fff;
  transform: rotate(-45deg);
  display: none;
}
.wrapper .form .inputfield .check input[type="checkbox"]:checked ~ .checkmark{
  background: #fec107;
}

.wrapper .form .inputfield .check input[type="checkbox"]:checked ~ .checkmark:before{
  display: block;
}

.wrapper .form .inputfield .btn1{
  width: 100%;
   padding: 8px 10px;
  font-size: 15px; 
  border: 0px;
  background:  #fec107;
  color: #fff;
  cursor: pointer;
  border-radius: 3px;
  outline: none;
}

.wrapper .form .inputfield .btn1:hover{
  background: #ffd658;
}

.wrapper .form .inputfield:last-child{
  margin-bottom: 0;
}
@media (max-width:420px) {
  .wrapper .form .inputfield{
    flex-direction: column;
    align-items: flex-start;
  }
  .wrapper .form .inputfield label{
    margin-bottom: 5px;
  }
  .wrapper .form .inputfield.terms{
    flex-direction: row;
  }
}
  </style>
  </head>
  <body>
    <div class="wrapper">
    <div class="title">
      Edit data
    </div>
    <div class="form">
    <form action="" method="post" enctype="multipart/form-data" accept-charset="utf-8">
      <input type="hidden" name="id" value="<?= $mhs["id"];?>" />
       <div class="inputfield">
          <label>Name</label>
          <input type="text" class="input" name="nama" value="<?= $mhs["nama"];?>"
          autocomplete="off">
       </div>  
        <div class="inputfield">
          <label>Alamat</label>
          <input type="text" class="input" name="alamat" value="<?= $mhs["alamat"];?>" autocomplete="off">
       </div>  
       <div class="inputfield">
          <label>Email</label>
          <input type="email" class="input" name="email" value="<?= $mhs["email"];?>" autocomplete="off">
       </div>  
      <div class="inputfield">
          <label>NO hp</label>
          <input type="number" class="input" name="telepon" value="<?= $mhs["telepon"];?>"  autocomplete="off">
       </div> 
      <div class="inputfield">
          <label>profil</label>
          <input type="file" class="input" name="gambar" />
       </div>
      <div class="inputfield">
        <img src="profil/<?= $mhs["gambar"];?>"  width="60" alt="error" />
       </div>
      <div class="inputfield">
        <button type="submit" name="klik" class="btn1">kirim</button>
      </div>
    </form>
    </div>
</div>
  </body>
</html>