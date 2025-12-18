<?php
$db = new Database();
$id = $_GET['id'];

$hapus = $db->query("DELETE FROM artikel WHERE id=$id");
echo $hapus 
  ? "<div class='alert alert-success'>Artikel berhasil dihapus!</div>" 
  : "<div class='alert alert-danger'>Gagal menghapus artikel.</div>";

echo "<a href='/LAB11_PHP_OOP/artikel/index' class='btn btn-secondary mt-3'>Kembali ke Daftar Artikel</a>";
?>