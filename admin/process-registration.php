<?php include 'connection.php';

function register($data) {
    global $conn;

    // 'strtolower' sebuah fungsi untuk menjadikan yang dimasukkan user menjadi huruf kecil
    // 'stripslashes' menghilangkan back slash (apabila user salah memasukkan huruf)
    // 'mysqli_real_escape_string' untuk memungkinkan password memasukkan password dengan tanda kutip
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $confirmPassword = mysqli_real_escape_string($conn, $data["confirmPassword"]);

    // cek username
    $result = mysqli_query($conn, "SELECT username FROM users WHERE `username` ='$username'");

    if(mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Username has been registered');
                window.location.href = 'registration.php';
            </script>";
        return false;
    }

    // cek konfirmasi password
    if($password !== $confirmPassword) {
        echo "<script>
            alert('The confirmation is false!');
            window.location.href = 'registration.php';
            </script>";
        return false;
    } 

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    $insert = "INSERT INTO `users` (`id`, `username`, `password`) VALUES (NULL, '$username', '$password');";

    mysqli_query($conn, $insert);

    // untuk menghasilkan angka 1 jika berhasil, dan 0 jika gagal
    return mysqli_affected_rows($conn);
}

if(isset($_POST["save"])) {

    if(register($_POST) > 0) {
        echo "<script>
                alert('New user added');
                window.location.href = 'login.php';
            </script>";
        
    } else {
        echo mysqli_error($conn);
    }

}