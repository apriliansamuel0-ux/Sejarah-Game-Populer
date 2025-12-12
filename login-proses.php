<?php 
// 1. MULAI SESI
// Ini harus ada di paling atas agar kita bisa menyimpan status login user.
session_start();

include 'koneksi.php';

// Cek apakah data form dikirim melalui metode POST (ini cara standar untuk submit form)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Ambil data yang dikirim user dari form login
    $requestEmail = $_POST['email'];
    $requestPassword = $_POST['password'];

    // Bersihkan email untuk pencegahan dasar (WALAU AMANNYA HARUS PAKAI PREPARED STATEMENTS)
    // Ini membantu mencegah masalah karakter khusus pada email
    $email_clean = mysqli_real_escape_string($koneksi, $requestEmail);

    // 2. CARI USER BERDASARKAN EMAIL
    $sql = "SELECT id_user, nama, email, password FROM users WHERE email = '$email_clean'";
    $result = mysqli_query($koneksi, $sql);
    
    // Cek apakah ada baris (user) yang ditemukan di database
    if (mysqli_num_rows($result) > 0) {
        
        // Ambil data user dari database
        $user = mysqli_fetch_assoc($result);
        $hashedPassword = $user['password'];
        
        // 3. VERIFIKASI PASSWORD
        // Cek apakah password yang dimasukkan user cocok dengan password hash di database
        if (password_verify($requestPassword, $hashedPassword)) {
            
            // --- LOGIN BERHASIL ---
            
            // Daftarkan variabel sesi (untuk mengingat user sudah login)
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['id_user'] = $user['id_user'];
            $_SESSION['nama'] = $user['nama'];
            
            // Arahkan user ke halaman setelah login
            header('location: dashboard.php');
            exit;
            
        } else {
            // Password Salah
            echo "<script>
                alert('Email atau password Anda salah. Silahkan coba lagi.');
                window.location = 'login.php';
            </script>";
        }
        
    } else {
        // Email tidak ditemukan
        echo "<script>
            alert('Email atau password Anda salah. Silahkan coba lagi.');
            window.location = 'login.php';
        </script>";
    }

} else {
    // Jika diakses tanpa submit form, kembalikan ke halaman login
    header("Location: login.php");
    exit;
}
?>