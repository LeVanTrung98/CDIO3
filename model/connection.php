<?php 
	namespace Model;
	use PDO;

	class Connect{
		public function cn(){
			return new PDO('mysql:host=localhost;dbname=cdio397','root','') ;
		}
	}



 ?>