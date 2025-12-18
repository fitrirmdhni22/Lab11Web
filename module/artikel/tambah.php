<?php
$db = new Database();
if ($_POST) {
  $data = ['judul' => $_POST['judul'], 'isi' => $_POST['isi']];
  $simpan = $db->insert('artikel', $data);
  echo $simpan ? "<div class='alert alert-success'>Artikel berhasil disimpan!</div>" : "<div class='alert alert-danger'>Gagal menyimpan artikel.</div>";
}
echo "<h2>➕ Tambah Artikel</h2>";
echo "<form method='POST'>";
echo "<div class='mb-3'><label>Judul</label><input type='text' name='judul' class='form-control'></div>";
echo "<div class='mb-3'><label>Isi</label><textarea name='isi' class='form-control' rows='5'></textarea></div>";
echo "<button type='submit' class='btn btn-primary'>Simpan</button>";
echo "</form>";
?>