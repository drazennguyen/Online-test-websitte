<?php include("admin/includes/database.php") ?>

<?php
session_start();
 
 
// 
$username = $_POST['user'];
$password = $_POST['password'];
 
 


if ($username == "" || $password =="") {
	echo "Username or Password must not be blank !";
}

else {
	$sql = "select * from users where username = '$username' and password = '$password' ";
	$query = mysqli_query($mysqli,$sql);
	$num_rows = mysqli_num_rows($query);


	// if ($num_rows==0) {
	// 	header('Location: login.php');
	// }
	// else {
	// 	//tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
	// 	$_SESSION['username'] = $username;
	// 	// Thực thi hành động sau khi lưu thông tin vào session
	// 	// ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
	// 	header('Location: postlogin.php');
	
	// }



	if($num_rows > 0){
 
		$data = mysqli_fetch_assoc($query);
	 
		// admin
		if($data['privileges'] == 0){
	 
			// buat session login dan username
			$_SESSION['username'] = $username;
			$_SESSION['privileges'] = 0;
			// admin link
			header("location:home.php#");
		}
	 
	
	}else{
		// header("location:login.php");
	}
}


?>