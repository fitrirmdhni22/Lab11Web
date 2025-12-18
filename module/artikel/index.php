<?php
$db = new Database();
$result = $db->query("SELECT * FROM artikel");

echo "<h2>📄 Daftar Artikel</h2>";
echo "<a href='/LAB11_PHP_OOP/artikel/tambah' class='btn btn-success mb-3'>+ Tambah Artikel</a>";
echo "<table class='table table-bordered table-hover'>";
echo "<thead class='table-dark'><tr><th>ID</th><th>Judul</th><th>Isi</th><th>Aksi</th></tr></thead><tbody>";
while ($row = $result->fetch_assoc()) {
  echo "<tr>
          <td>{$row['id']}</td>
          <td>{$row['judul']}</td>
          <td>{$row['isi']}</td>
          <td>
            <a href='/LAB11_PHP_OOP/artikel/ubah?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
            <a href='/LAB11_PHP_OOP/artikel/hapus?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin hapus?\")'>Hapus</a>
          </td>
        </tr>";
}
echo "</tbody></table>";
?>