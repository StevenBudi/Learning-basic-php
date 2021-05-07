<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="./asset/style/style.css" type="text/css"> -->
    <style>
        <?php include('./asset/style/style.css')?>
    </style>
</head>
<body>
    <div class="container container-fluid">
	<h1>Reservation Table</h1>
	<p class="text-muted">Please Fill the form below accurately to enable us serve you better</p>
	<hr>
    <form action="./Modules//insert.php" method="post" class="form-control form-control-lg">
		<table class="table table-borderless">
		
			<tr>
				<td><label for="required_field" class="required_field">Fullname</label> : </td>
				<td><input type="text" name="first_name" id="first_name"></td>
				<td><input type="text" name="last_name" id="last_name"></td>
			</tr>

			<tr>
				<td><label for="required_field" class="required_field">Email</label> : </td>
				<td colspan="2"><input type="email" name="email" id="email"></td>
			</tr>

			<tr>
				<td>Phone Number</td>
				<td colspan="2"><input type="text" name="phone" id="phone"></td>
			</tr>

			<tr>
				<td>Table for </td>
				<td>
					<select name="" id="">
						<option value="">2</option>
						<option value="">3</option>
						<option value="">4</option>
						<option value="">5</option>
						<option value="">6</option>
					</select> <label for="">People</label>
				</td>
			</tr>

			<tr>
				<td>Date</td>
				<td><input type="date" name="reser_date" id="reser_date"></td>
			</tr>

			<tr>
				<td>Time</td>
				<td><input type="time" name="early_in" id="early_in"></td>
				<td><input type="time" name="checkout" id="checkout"></td>
			</tr>

			<tr>
				<td>Notes</td>
				<td colspan="2"><textarea name="reser_notes" id="reser_notes" cols="130" rows="3"></textarea></td>
			</tr>

			<tr>
				<td></td>
				<td>
					<button type="submit" class="btn btn-primary">Submit</button>
				</td>
				<td>
					<a href="./index.php" class="btn btn-danger">Cancel</a>
				</td>
			</tr>

		</table>
    </form>
    </div>
    <?php include('./asset/template/footer.php')?> 
    <script>
        <?php include('./asset/js/index.js')?>
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>