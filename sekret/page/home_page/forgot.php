<html>
<body>

<div class="container">
	
			<form id="login" method="post" action="<?php $_SERVER['PHP_SELF'];?>"> 
			<br><h2>Fitur Reset Password khusus alumni</h2><hr/>
				<div class="table-responsive">
				<table class="table table-striped" style="width:auto" border="0px">
				
					<tr>	  
						<td>User name</td>
						<td>:</td>
						<td><input type="email" id="inputEmail" class="form-control" name="email" placeholder="Alamat E-mail" value="<?php echo (isset($_POST['email'])) ? htmlspecialchars($_POST['email']) : "";?>" placeholder="Contoh : example@mail.com"class="form-control"></td>
					</tr>
					<tr>
					<td colspan="3">
					<input type="submit" class="btn btn-primary"  value="kirim" name="submit">

				<?php 
				 //require_once "phpmailer/class.phpmailer.php";
				if(($_POST['submit']=="kirim")){
						$email=code($_POST["email"]);
						$email_encoded = rtrim(strtr(base64_encode($email), '+/', '-_'), '=');
								$to=$email;
								$subject = "Rubah password";

								// message
	 $message ='Terimakasih  
Silahkan klik link di bawah ini untuk memperbarui password anda:
http://www.tracerstudy.cf/update_login.php?email='.$email_encoded.''; // Our message above including the link
						

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <tracerskensa@tracerstudy.cf>' . "\r\n";
$headers .= 'Cc:tracerskensa@tracerstudy.cf' . "\r\n";
if(mail($to,$subject,$message,$headers))
{
   echo"<div class='alert alert-success' role='alert'> Silahkan cek kotak masuk atau spam email anda untuk memperbarui password</div>";
}
else
{
  echo" <div class='alert alert-warning' role='alert'>Pengiriman gagal, mungkin Email anda tidak aktif</div>";
}

						
					}
						?>
			</td></tr>
			</table>
		
			</form>
	

</div>
</body>
</html>