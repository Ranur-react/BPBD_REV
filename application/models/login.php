<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Model {
	function in($username,$userpassword)
	{return $this->db->query("SELECT * from user where username='$username' and userpassword =md5('$userpassword')");}
	}
	?>
