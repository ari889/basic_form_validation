<?php 
	
	/*
	* Define old function to catch value
	*/
	function old($name){
		if(isset($_POST[$name])){
			echo $_POST[$name];
		}
	}

	function check_private_email($email){
		$email_array = explode('@', $email);
		$email_server = end($email_array);

		if($email_server == 'gmail.com' || $email_server == 'coadertrust.com'){
			return true;
		}else{
			return false;
		}
	}

 ?>