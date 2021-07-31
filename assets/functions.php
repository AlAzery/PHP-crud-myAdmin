  <?php
    $conn = mysqli_connect("localhost", "root", "", "belajar_php");
  //data base
    function query($query){
      global $conn;
      $result = mysqli_query($conn, $query);
      $rows = [];
while( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
      }
      //kembalikan
      return $rows;
      
    }
    
  //tambah data atau daftar
function tambah($data){
  global $conn;
  
  $nama = htmlspecialchars($data["nama"]);
  $alamat = htmlspecialchars($data["alamat"]);
  $email = htmlspecialchars($data["email"]);
  $number = htmlspecialchars($data["number"]);
  //upload gambar
  $gambar = upload();
  if (!$gambar) {
    return false;
  }
  
$query = "INSERT INTO user_pengguna 
            VALUE
            ('', '$nama','$alamat','$email','$number','$gambar')
            ";
  mysqli_query($conn,$query);
  
  return mysqli_affected_rows($conn);
}

function upload(){
  $namafile = $_FILES["gambar"]["name"];
  $ukuranfile = $_FILES["gambar"]["size"];
  $error = $_FILES ["gambar"]["error"];
  $tmpname = $_FILES ["gambar"]["tmp_name"];
  if ($error === 4) {
    echo "<script>
          alert('pilih gambar dahulu');
        </script>";
        return false;
  }
  
  //file yang harus di upload
  
  $gambarvalid = ['jpg', 'jpeg', 'png'];
  $ektensigambar = explode('.', $namafile);
  $ektensigambar = strtolower(end($ektensigambar));
  if ( !in_array($ektensigambar,$gambarvalid)) {
    echo "<script>
          alert('wajib type jpg, jpeg, png');
        </script>";
        return false;
  }
  
  //cek ukuran gambar
  if ($ukuranfile > 900000) {
    echo "<script>
          alert('ukuran gambar terlalu besar');
        </script>";
        return false;
  }
  //lolos pengecekan
  $namafilebaru = uniqid();
  $namafilebaru .= '.';
  $namafilebaru .= $ektensigambar;
  
  move_uploaded_file($tmpname, 'profil/'. $namafilebaru);
  
  return $namafilebaru;
}


//hapuqs data



function hapus($id){
  global $conn;
  mysqli_query($conn, "DELETE FROM user_pengguna WHERE id = $id" );
  
  return mysqli_affected_rows($conn);
}
//ubah
function ubah($data){
  global $conn;
  
  $id = $data["id"];
  $nama = htmlspecialchars($data["nama"]);
  $alamat = htmlspecialchars($data["alamat"]);
  $email = htmlspecialchars($data["email"]);
  $telepon = htmlspecialchars($data["telepon"]);
  $gambarlama = htmlspecialchars($data["gambarlama"]);
  
  //cek apakah user pilih gambar
  if ($_FILES["gambar"]["error"] === 4 ) {
    $gambar = $gambarlama;
  }else{
    $gambar = upload();
  }
  
  
  
$query = "UPDATE user_pengguna SET
            nama = '$nama',
            alamat = '$alamat',
            email = '$email',
            telepon = '$telepon',
            gambar = '$gambar'
          WHERE id = $id;
            ";
  mysqli_query($conn,$query);
  
  return mysqli_affected_rows($conn);
  
}


function cari($keyword){
  $query = "SELECT * FROM user_pengguna
      WHERE 
   nama LIKE '%$keyword%' OR
   alamat LIKE '%$keyword%' OR
   email LIKE '%$keyword%' OR
   telepon LIKE '%$keyword%'
  ";
  return query($query);
}
    
    
    
  ?>