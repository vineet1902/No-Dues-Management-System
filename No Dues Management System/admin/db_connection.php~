<?php
	use \google\appengine\api\mail\Message;
        $connection = mysql_connect(':/cloudsql/no-dues:nodues','root','');
	if(!$connection){
		die("Connection Failed");
	}
	else{
		//echo '<script>alert("Connection Established!"); </script>';
		mysql_select_db('dbms2');
	}
	if(session_id()==""){
		session_start();
	}
	if(isset($_SESSION['login_as'])&&strcmp($_SESSION['login_as'],"student")==0){
		header('location:../index.php');
	}
	define("ENCRYPTION_KEY", "!@#$%^&*");
	
	/**
	 * Returns an encrypted & utf8-encoded
	 */
	function encrypt($pure_string, $encryption_key) {
//	    $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
//	    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
//	    $encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH, $encryption_key, utf8_encode($pure_string), MCRYPT_MODE_ECB, $iv);
//	    return $encrypted_string;
	    return $pure_string;
	}

	/**
	 * Returns decrypted original string
	 */
	function decrypt($encrypted_string, $encryption_key) {
//	    $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
//	    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
//	    $decrypted_string = mcrypt_decrypt(MCRYPT_BLOWFISH, $encryption_key, $encrypted_string, MCRYPT_MODE_ECB, $iv);
//	    return $decrypted_string;
	    return $encrypted_string;
	}

	function confirmMail($email){
		try
		{
		  $message = new Message();
		  $message->setSender("no-dues@appspot.gserviceaccount.com");
		  $message->addTo($email);
		  $message->setSubject("No dues account.");
		  $message->setTextBody("You have been registered at https://no-dues.appspot.com/ . Please visit the site to view your dues.");
		  $message->send();
		} catch (InvalidArgumentException $e) {
		  // ...
		}	
	}
	function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
	function sendMail($email,$url){
		try
		{
		  $message = new Message();
		  $message->setSender("no-dues@appspot.gserviceaccount.com");
		  $message->addTo($email);
		  $message->setSubject("Forgot Password");
		  $message->setTextBody('Please visit the following link to reset your password. '.$url);
		  $message->send();
		} catch (InvalidArgumentException $e) {
		  // ...
		}	
	}
//	include('../footer.php');
?>
