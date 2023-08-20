
<?php

	include "alumni/modal.php";
	
	
	Class Kuisioner{
	
		public $db;
		
		public function table_A( $perintah, $field, $value ){
		
			$sql = "select $perintah($field) as jumlah from kuisioner_a where $field = '$value'";
			// echo $sql;
			$data = $this->db->Execute($sql);
			
			return $data->fields;
		}
		public function table_A2( $perintah, $field, $value ){
		
			$sql2 = "select $perintah($field) as jumlah from kuisioner_a";
			// echo $sql;
			$data2 = $this->db->Execute($sql2);
			
			return $data2->fields;
		}
		public function table_B( $perintah, $field, $value ){
		
			$sql = "select $perintah($field) as jumlah from kuisioner_b where $field = '$value'";
			// echo $sql;
			$data = $this->db->Execute($sql);
			
			return $data->fields;
		}
		public function table_B2( $perintah, $field){
		
			$sql2 = "select $perintah($field) as jumlah from kuisioner_b";
			// echo $sql;
			$data2 = $this->db->Execute($sql2);
			
			return $data2->fields;
		}
		
		
		public function table_E( $perintah, $field, $value ){
		
			$sql = "select $perintah($field) as jumlah from kuisioner_e where $field = '$value'";
			// echo $sql;
			$data = $this->db->Execute($sql);
			
			return $data->fields;
		}
		public function table_E2( $perintah, $field){
		
			$sql2 = "select $perintah($field) as jumlah from kuisioner_e";
			// echo $sql;
			$data2 = $this->db->Execute($sql2);
			
			return $data2->fields;
		}
		public function table_C_value( $perintah, $field, $value ){
		
			$sql = "SELECT $perintah($field) AS jumlah FROM kuisioner_c WHERE $field = '$value'";
			// echo $sql;
			$data = $this->db->Execute($sql);
			
			return $data->fields;
		}

		//count tanpa value
		public function table_C_t_value( $perintah, $field){
		
			$sql = "SELECT $perintah($field) AS jumlah FROM kuisioner_c";

			$data = $this->db->Execute($sql);
			
			return $data->fields;
		}

		//tidak sama dengan --> C6
		public function table_C_tsd( $perintah, $field, $value){
		
			$sql = "SELECT $perintah($field) AS hasil FROM kuisioner_c WHERE $field != '$value'";

			$data = $this->db->Execute($sql);
			
			return $data->fields;
		}

		//avg
		public function table_C( $perintah, $field){
		
			$sql = "SELECT $perintah($field) AS rata FROM kuisioner_c";

			$data = $this->db->Execute($sql);
			
			return $data->fields;
		}

		public function table_C_for_sebset( $perintah, $field, $sebset ,$value){ //khusus form c1, c5
		
			$sql = "SELECT $perintah($field) AS hasil FROM kuisioner_c WHERE $sebset = '$value'";

			$data = $this->db->Execute($sql);
			
			return $data->fields;
		}

		public function table_C_for_multiple( $perintah, $field, $value1, $value2, $value3, $value4, $value5, $value6){ //khusus form c3aUI lainnya

			$sql = "SELECT $perintah($field) AS hasil FROM kuisioner_c WHERE $field != '$value1' AND $field != '$value2' AND $field != '$value3' AND $field != '$value4' AND $field != '$value5' AND $field != '$value6'";

			$data = $this->db->Execute($sql);
			
			return $data->fields;
		}

		public function table_C_for_multiple_4( $perintah, $field, $value1, $value2, $value3,$value4){ //khusus form c8

			$sql = "SELECT $perintah($field) AS hasil FROM kuisioner_c WHERE $field != '$value1' AND $field != '$value2' AND $field != '$value3' AND $field != '$value4'";

			$data = $this->db->Execute($sql);
			
			return $data->fields;
		}

		//khusus form c9
		public function table_C_for_multiple_14( $perintah, $field, $value1, $value2, $value3, $value4, $value5, $value6, $value7, $value8, $value9, $value10, $value11, $value12, $value13, $value14){ 

			$sql = "SELECT $perintah($field) AS hasil FROM kuisioner_c WHERE $field != '$value1' AND $field != '$value2' AND $field != '$value3' AND $field != '$value4' AND $field != '$value5' AND $field != '$value6' AND $field != '$value7' AND $field != '$value8' AND $field != '$value9' AND $field != '$value10' AND $field != '$value11' AND $field != '$value12' AND $field != '$value13' AND $field != '$value14'";

			$data = $this->db->Execute($sql);
			
			return $data->fields;
		}

		//khusus form c10
		public function table_C_for_multiple_5( $perintah, $field, $value1, $value2, $value3, $value4, $value5){
			$sql = "SELECT $perintah($field) AS hasil FROM kuisioner_c WHERE $field != '$value1' AND $field != '$value2' AND $field != '$value3' AND $field != '$value4' AND $field != '$value5'";

			$data = $this->db->Execute($sql);
			
			return $data->fields;
		}

			//count
		public function table_D_value( $perintah, $field, $value ){
		
			$sql = "SELECT $perintah($field) AS jumlah FROM kuisioner_d WHERE $field = '$value'";
			// echo $sql;
			$data = $this->db->Execute($sql);
			
			return $data->fields;
		}

		public function table_D_value_lds_tptk( $perintah, $field, $value ){
		
			$sql = "SELECT $perintah($field) AS jumlah FROM kuisioner_d WHERE $field >= $value";
			// echo $sql;
			$data = $this->db->Execute($sql);
			
			return $data->fields;
		}

		//count tanpa value
		public function table_D_t_value( $perintah, $field){
		
			$sql = "SELECT $perintah($field) AS jumlah FROM kuisioner_d";

			$data = $this->db->Execute($sql);
			
			return $data->fields;
		}

		//avg
		public function table_D( $perintah, $field){
		
			$sql = "SELECT $perintah($field) AS rata FROM kuisioner_d";

			$data = $this->db->Execute($sql);
			
			return $data->fields;
		}


		//khusus form D3, D5
		public function table_D_for_multiple_4($perintah, $field, $value1, $value2, $value3, $value4){
			$sql = "SELECT $perintah($field) AS hasil FROM kuisioner_d WHERE $field != '$value1' AND $field != '$value2' AND $field != '$value3' AND $field != '$value4'";

			$data = $this->db->Execute($sql);
			
			return $data->fields;
		}

		//khusus form D11
		public function table_D_tds($perintah, $field, $value){
			$sql = "SELECT $perintah($field) AS hasil FROM kuisioner_d WHERE $field != '$value'";

			$data = $this->db->Execute($sql);
			
			return $data->fields;
		}

		
	}
	
?>