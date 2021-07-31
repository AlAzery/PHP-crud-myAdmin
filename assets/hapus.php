<?php
require 'functions.php';
$id = $_GET["id"];

if ( hapus($id) > 0 ) {
  echo("
    <script>
    alert('data berhasil di hapus');
    document.location.href = 'tampil.php';
    </script>
    ");
}else {
  echo("
    <script>
    alert('gagal menghapus');
    document.location.href = 'index.php';
    </script>
    ");
}
?>