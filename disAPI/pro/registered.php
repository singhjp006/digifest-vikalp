<!DOCTYPE html>
<html>
<head>
	<title>Thank you for registering!</title>

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
		<?php

				$curl = curl_init();

				curl_setopt_array($curl, array(
				  CURLOPT_URL => "http://api.msg91.com/api/sendhttp.php?sender=MSGIND&route=4&mobiles=9782078700&authkey=186451AqFGsJK1a86g5a227556&country=0&message=Hey!%20You%20are%20successfully%20registered%20with%20the%20government%20of%20Rajasthan.",
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "GET",
				  CURLOPT_SSL_VERIFYHOST => 0,
				  CURLOPT_SSL_VERIFYPEER => 0,
				));

				$response = curl_exec($curl);
				$err = curl_error($curl);

				curl_close($curl);

				if ($err) {
				  echo "cURL Error #:" . $err;
				} else {
				  echo $response;
				}
	?>

<div class="container">
	<div class="jumbotron text-xs-center">
	  <div class="centered">
	  	<h1 style="text-align: center" class="display-3">Thank You!</h1>
	  </div>
	  <p style="text-align: center" class="lead"><strong>Please check your mobile.</strong></p>
	  <hr>
	  <p style="text-align: center">
	    Having trouble? <a href="">Contact us</a>
	  </p>
	  <p style="text-align: center" class="lead">
	    <a class="btn btn-primary btn-sm" href="https://bootstrapcreative.com/" role="button">Continue to homepage</a>
	  </p>
	</div>
</div>
</body>
<footer>
<script async src="//embedr.flickr.com/assets/client-code.js" charset="utf-8"></script>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</footer>
</html>