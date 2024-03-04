<?php

	class Authentication extends CI_Model
	{

		function daftarUser($data, $table){
			$this->db->insert($table, $data);
		}
	}
 ?>