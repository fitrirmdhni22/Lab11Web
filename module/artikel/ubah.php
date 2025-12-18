<?php
$db = new Database();
$id = $_GET['id'];

// Ambil data lama dari DB
$artikel = $db->get("artikel", "id=$id");

if ($_POST) {
  $data = [
    'judul' => $_POST['judul'],
    'isi'   => $_POST['isi']
  ];
  $update = $db->update('artikel', $data, "id=$id");
  echo $update 
    ? "<div class='alert alert-success'>Artikel berhasil diupdate!</div>" 
    : "<div class='alert alert-danger'>Gagal update artikel.</div>";
}

echo "<h2>✏️ Edit Artikel</h2>";
echo "<form method='POST'>";
echo "<div class='mb-3'>
        <label class='form-label'>Judul Artikel</label>
        <input type='text' name='judul' class='form-control' value='{$artikel['judul']}'>
      </div>";
echo "<div class='mb-3'>
        <label class='form-label'>Isi Artikel</label>
        <textarea name='isi' class='form-control' rows='5'>{$artikel['isi']}</textarea>
      </div>";
echo "<button type='submit' class='btn btn-primary'>Update Artikel</button>";
echo " <a href='/LAB11_PHP_OOP/artikel/index' class='btn btn-secondary'>Kembali</a>";
echo "</form>";
?>