<!DOCTYPE html>
<html>

<head>
	<title>Post Phone Number</title>
	<style>
		.footer {
			text-align: right;
			padding-right: 2%;
			font-family: monospace;
			color: white;
			background: #050505;
			font-weight: 900;
		}
	</style>
</head>

<body>
	<div style="width:350px; margin:0 auto;">
		<form method="POST">
			<label for="phonenumber">Phone Number:</label>
			<input type="number" id="phonenumber" name="phonenumber">
			<input type="submit" value="Submit">
		</form>

		<?php
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$phonenumber = $_POST['phonenumber'];

			$data = array(
				"phonenumber" => $phonenumber
			);

			$json_data = json_encode($data);

			$curl = curl_init();

			curl_setopt_array($curl, array(
				CURLOPT_URL => 'https://chimpu.xyz/api/post.php',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => $json_data,
				CURLOPT_HTTPHEADER => array(
					'Content-Type: application/json'
				),
			)
			);

			$response = curl_exec($curl);

			curl_close($curl);
			$json_obj = json_decode($response);
			// $msg = $json_obj->msg;
			// Print the response from the API endpoint
			echo "<br/>Data received:  " . $json_obj->msg . "<br/> Error:  " . $json_obj->error . "<br/> Error Code: " . $json_obj->error_code;
		}
		?>
		<p class='footer'>IWCN ASSIGNMENT KARAN YADAV </p>

	</div>
</body>

</html>