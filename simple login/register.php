<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Login Mahasiswa</title>
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6"
			crossorigin="anonymous"
		/>
	</head>
	<body>
		<div class="container container-fluid">
			<h1 class="text-xxl-center">Login Page Mahasiswa</h1>
			<form method="POST" class="toast-body">
				<div class="mb-3">
					<label class="form-label"
						>Username</label
					>
					<input
						type="text"
						class="form-control"
						placeholder="Your username..."
						name = "username"
					/>
				</div>
				<div class="mb-3">
					<label class="form-label"
						>Password</label
					>
					<input
						type="password"
						class="form-control"
						placeholder="Your Password..."
						name = "password"
					/>
				</div>
                <div class="mb-3">
					<label class="form-label"
						>NIM</label
					>
					<input
						type="text"
						class="form-control"
						placeholder="Your Password..."
						name = "nim"
					/>
				</div>
				<div class="mb-3 form-check">
					<input
						type="checkbox"
						class="form-check-input"
						id="exampleCheck1"
					/>
					<label class="form-check-label" for="exampleCheck1"
						>Check me out</label
					>
				</div>
				<button type="submit" name="submit">Register</button>
			</form>
		</div>
	</body>
</html>
<?php
    if(isset($_POST['submit'])){
		include("./dbconfig.php");
		$nama = $_POST["username"];
		$password = md5($_POST["password"]);
		$nim = $_POST["nim"];

		$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname, $port);

		if($conn){
			echo"<script>console.log('Koneksi Sukses');</script>";
		}
		else{
			die("Koneksi Gagal : ".mysqli_connect_errno());
		}
		
		$query = "INSERT INTO mahasiswa (username, password, nim)
		VALUES ('$nama', '$password', '$nim')";
		if (mysqli_query($conn, $query)){
			echo"<script>console.log('Input Data Berhasil');</script>";
		}else{
			die("<script>console.log('Input Data Gagal : ' + mysqli_error())</script>");
		}
		
		mysqli_close($conn);
		header("Location:form.html");
	}
?>
