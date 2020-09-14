<?php
date_default_timezone_set('Asia/Jakarta');
$action = $_GET['action'];
if($action == 'register'){
	include "config.php";
	$username = $_POST['username'];
	$password = $_POST['password'];
	$repeat_password = $_POST['repeat-password'];
	if($password ==$repeat_password){
		$sql = "INSERT INTO user(username,password)VALUE('$username','$password')";
		$simpan = mysqli_query($connect, $sql);
	    if (!$simpan) {
	        die ("Query gagal dijalankan: " . mysqli_errno($connect) .
	                    " - " . mysqli_error($connect));
	    } else {
	        echo "<script>alert('Berhasil Registrasi');window.location='../front-end/login.php';</script>";
	    }
	}else{
	    echo "<script>alert('Tulis Ulang Password Anda Salah');window.location='../front-end/register.php';</script>";
	}
}
elseif($action == 'login'){
	session_start();
	include "config.php";
	$username = $_POST['username'];
	$password = $_POST['password'];
	// query untuk mendapatkan record dari username
	$data = mysqli_query($connect, "SELECT * FROM user WHERE username= '$username' AND password='$password'");
	$user = mysqli_fetch_assoc($data);
	$cek = mysqli_num_rows($data);
	$id_user = $user['id_user'];
	if($cek  > 0) {
		$time = date('H:i:s'); 
		$sql = "UPDATE user SET status_login_user='login', waktu_login_user='$time' WHERE id_user='$id_user'";
		$simpan = mysqli_query($connect, $sql);
		$query = mysqli_query($connect, "SELECT * FROM user WHERE id_user='$id_user'");
		$data_update = mysqli_fetch_array($query);
	    $_SESSION['id_user']= $id_user;
	    $_SESSION['username']= $data_update['username'];
	    $_SESSION['status_login_user']= $data_update['status_login_user'];
	    $_SESSION['waktu_login_user']= $data_update['waktu_login_user'];
		$response['error_id'] = $_SESSION['id_user'];
		$response['error_cek'] = $cek;
		echo "<script>alert('Berhasil Login');window.location='../front-end/index.php';</script>";
	}else{
	    echo '<script>
	        alert("Gagal login, Data yang anda masukan salah !");
	        window.location = "../front-end/login.php"
	        </script>';
	}
}
elseif ($action == 'logout') {
	include "config.php";
	$id_user = $_GET['id'];
	$sql = "UPDATE user SET status_login_user='logout', waktu_login_user='' WHERE id_user='$id_user'";
	$simpan = mysqli_query($connect, $sql);
	if (!$simpan) {
	    die ("Query gagal dijalankan: " . mysqli_errno($connect) .
	                    " - " . mysqli_error($connect));
	} else {
		session_start();
		session_destroy();
	    echo "<script>alert('Berhasil Logout');window.location='../front-end/login.php';</script>";
	}
}