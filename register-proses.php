<?php 
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
  
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password_raw = $_POST['password']; 

   
    if (empty($email) || empty($nama) || empty($password_raw)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data!');
                window.location = 'register.php';
            </script>
        ";
        
        exit; 
    }

   
    $password_hashed = password_hash($password_raw, PASSWORD_DEFAULT);

    
    $nama_clean = mysqli_real_escape_string($koneksi, $nama);
    $email_clean = mysqli_real_escape_string($koneksi, $email);
    

    $sql = "INSERT INTO users (nama, email, password) VALUES ('$nama_clean', '$email_clean', '$password_hashed')";

    
    if(mysqli_query($koneksi, $sql)) {
        echo "  
            <script>
                alert('Registrasi Berhasil! Silahkan login.');
                window.location = 'login.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Terjadi Kesalahan saat registrasi: " . mysqli_error($koneksi) . "');
                window.location = 'register.php';
            </script>
        ";
    }
} else {
    header("Location: register.php");
    exit;
}
?>