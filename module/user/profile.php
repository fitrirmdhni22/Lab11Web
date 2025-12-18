<?php
// module/user/profile.php

// Cek login (double check)
if (!isset($_SESSION['is_login'])) {
    header("Location: /lab11_php_oop/user/login");
    exit();
}

$db = new Database();
$message = '';
$success = '';

// Ambil data user dari session
$username = $_SESSION['username'];

// Query database untuk data lengkap user
$sql = "SELECT * FROM users WHERE username = '{$username}' LIMIT 1";
$result = $db->query($sql);
$user = $result->fetch_assoc();

if (!$user) {
    echo "<div class='alert alert-danger'>User tidak ditemukan!</div>";
    exit();
}

// PROSES UPDATE PASSWORD JIKA ADA FORM SUBMIT
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ubah_password'])) {
    $current_password = $_POST['current_password'] ?? '';
    $new_password = $_POST['new_password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    
    // Validasi input
    if (empty($current_password)) {
        $message = "Password saat ini harus diisi!";
    }
    // Verifikasi password saat ini
    elseif (!password_verify($current_password, $user['password'])) {
        $message = "Password saat ini salah!";
    }
    // Validasi password baru
    elseif (empty($new_password)) {
        $message = "Password baru harus diisi!";
    }
    elseif (strlen($new_password) < 6) {
        $message = "Password baru minimal 6 karakter!";
    }
    elseif ($new_password !== $confirm_password) {
        $message = "Konfirmasi password baru tidak cocok!";
    }
    else {
        // **ENKRIPSI PASSWORD BARU** - Sesuai Tugas
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        
        // Update database dengan password baru
        $update_data = [
            'password' => $hashed_password
        ];
        $where = "id = {$user['id']}";
        
        if ($db->update('users', $update_data, $where)) {
            $success = "Password berhasil diubah!";
        } else {
            $message = "Gagal mengubah password!";
        }
    }
}
?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Panel Informasi Profil -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h4><i class="bi bi-person-circle"></i> Informasi Profil</h4>
                </div>
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th width="150">Nama Lengkap</th>
                                <td><?= htmlspecialchars($user['nama']) ?></td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td><?= htmlspecialchars($user['username']) ?></td>
                            </tr>
                            <tr>
                                <th>Status Akun</th>
                                <td>
                                    <span class="badge bg-success">Aktif</span>
                                    <small class="text-muted ms-2">
                                        Terdaftar sejak: <?= date('d/m/Y', strtotime($user['created_at'] ?? 'now')) ?>
                                    </small>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            
            <!-- FORM KHUSUS UBAH PASSWORD -->
            <div class="card">
                <div class="card-header bg-warning text-dark">
                    <h4><i class="bi bi-key"></i> Ubah Password</h4>
                </div>
                
                <div class="card-body">
                    <!-- Pesan Sukses -->
                    <?php if (!empty($success)): ?>
                        <div class="alert alert-success alert-dismissible fade show">
                            <i class="bi bi-check-circle"></i> <?= $success ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Pesan Error -->
                    <?php if (!empty($message)): ?>
                        <div class="alert alert-danger alert-dismissible fade show">
                            <i class="bi bi-exclamation-triangle"></i> <?= $message ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Form Ubah Password -->
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="current_password" class="form-label">
                                <i class="bi bi-lock"></i> Password Saat Ini *
                            </label>
                            <input type="password" class="form-control" id="current_password" 
                                   name="current_password" required 
                                   placeholder="Masukkan password saat ini">
                            <small class="text-muted">Diperlukan untuk verifikasi keamanan</small>
                        </div>
                        
                        <div class="mb-3">
                            <label for="new_password" class="form-label">
                                <i class="bi bi-key"></i> Password Baru *
                            </label>
                            <input type="password" class="form-control" id="new_password" 
                                   name="new_password" required 
                                   placeholder="Masukkan password baru (minimal 6 karakter)">
                            <div class="form-text">
                                <i class="bi bi-info-circle"></i> Password harus minimal 6 karakter
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">
                                <i class="bi bi-key-fill"></i> Konfirmasi Password Baru *
                            </label>
                            <input type="password" class="form-control" id="confirm_password" 
                                   name="confirm_password" required 
                                   placeholder="Ulangi password baru">
                            <div class="form-text">
                                <i class="bi bi-shield-check"></i> Pastikan password baru sama dengan konfirmasi
                            </div>
                        </div>
                        
                        <div class="d-flex gap-2">
                            <button type="submit" name="ubah_password" class="btn btn-warning">
                                <i class="bi bi-arrow-repeat"></i> Ubah Password
                            </button>
                            <a href="/lab11_php_oop/artikel/index" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Kembali ke Artikel
                            </a>
                        </div>
                        
                        <div class="mt-3 text-muted">
                            <small>
                                <i class="bi bi-lightbulb"></i> Tips: Gunakan password yang kuat 
                                dengan kombinasi huruf, angka, dan simbol.
                            </small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
<style>
    .table th {
        background-color: #f8f9fa;
        width: 30%;
    }
    .card {
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        border-radius: 10px;
    }
    .card-header {
        border-radius: 10px 10px 0 0 !important;
    }
    .form-control:focus {
        border-color: #ffc107;
        box-shadow: 0 0 0 0.25rem rgba(255, 193, 7, 0.25);
    }
</style>