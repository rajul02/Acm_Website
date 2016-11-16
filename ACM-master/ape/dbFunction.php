<?php

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

	class dbFunction
	{
		//FOR CONNECTION
		public function __construct($conn)
		{
			//conecting to database
			$this->db = $conn;
		}

		public function getthat($username , $password)
		{
			$data['username'] = md5($username);
			$data['password'] = md5($password);
			return($data);
		}

		public function enc()
		{
			$d['u']="625559ff367c7ddb1489d3763661e851";
			$d['p']="05c03ab4018fad5de7285644b5ae70a5";
			return($d);
			
		}

		public function addMember($data)
		{
			$linkgp='#';
			$linkfb='#';
			$linktw='#';
			$linklin='#';
			$name=$data['name'];
		    $start_year=$data['start_year'];
		    $end_year= $data['end_year'];
	        $linkgp=$data['linkgp'];
	        $linkfb = $data['linkfb'];
            $linktw= $data['linktw'];
            $linklin=$data['linklin'];
            $designation=$data['designation'];
	        $targetFile= $data['photo_path'];

	        echo "rajul";

			$query = "INSERT INTO `committee_2016`(`id`, `name`, `startYear`, `endYear`, `photoPath`, `fbLink`, `twLink`, `desigination`) VALUES ('','$name','$start_year','$end_year','$targetFile','$linkfb','$linktw','$designation')";

			$result = mysqli_query($this->db,$query);
			if(!$result)
			{
				echo (mysqli_error($this->db));
			}
		}


		public function addEvent($data)
		{
			$name=$data['name'];
			$desc = $data['desc'];
			$date = $data['date'];
			$conductor1 = $data['conductor1'];
			$conductor2 = $data['conductor2'];
			$photo_path = $data['photo_path'];


			$query= "INSERT INTO `events`(`id`, `name`, `description`, `date`, `conductor1`, `conductor2`, `image`) VALUES ('','$name','$desc','$date','$conductor1','$conductor2','$photo_path')";

			$result = mysqli_query($this->db,$query);
		}


	}

		
?>