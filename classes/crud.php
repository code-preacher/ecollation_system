<?php
include_once "config.php";

class Crud extends Config
{

	function __construct()
	{
		parent::__construct();
	}


//Display All
	public function displayAll($table)
	{
		$query = "SELECT * FROM {$table}";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return "No found records";
		}
	}



	public function displayAllWithOrder($table,$orderValue,$orderType)
	{
		$query = "SELECT * FROM {$table} ORDER BY {$orderValue} {$orderType}";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return 0;
		}
	}


	public function displayAllSpecific($table,$value,$item)
	{
		$query = "SELECT * FROM {$table} WHERE $value='$item' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return "No found records";
		}
	}


		public function displayAllSpecificWithOrder($table,$value,$item,$orderValue,$orderType)
	{
		$query = "SELECT * FROM {$table} WHERE $value='$item' ORDER BY {$orderValue} {$orderType}";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return "No found records";
		}
	}




			public function displayAllPartySpecificWithOrder($table,$party,$party_agent,$orderValue,$orderType)
	{
		$query = "SELECT * FROM {$table} WHERE party_agent='$party_agent' AND party='$party' ORDER BY {$orderValue} {$orderType}";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return "No found records";
		}
	}





	
	public function displayWithLimit($table,$limit)
	{
		$query = "SELECT * FROM {table} limit {$limit}";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return "No found records";
		}
	}




	//Display Specific
	public function displayName($value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT name FROM login where email='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row['name'];
		}else{
			return "No found records";
		}
	}



		public function displayParty($table,$value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT email,party FROM {$table} where email='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $this->displayPartyName($row['party']);
		}else{
			return "No found records";
		}
	}






	public function displayPartyId($value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT party FROM coordinator where email='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $this->displayPartyName($row['party']);
		}else{
			return "No found records";
		}
	}

	public function displayPartyId2($value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT party FROM coordinator where email='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row['party'];
		}else{
			return "No found records";
		}
	}


	public function displayPartyName($value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT name FROM party where id='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row['name'];
		}else{
			return "No found records";
		}
	}


		public function displayAgentName($value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT name FROM agent where id='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row['name'];
		}else{
			return "No found records";
		}
	}

		public function displayElectionTypeName($value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT name FROM election_type where id='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row['name'];
		}else{
			return "No found records";
		}
	}

		

	public function displayOne($table,$value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT * FROM {$table} where email='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}else{
			return 0;
		}
	}


	public function checkOne($table,$value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT * FROM {$table} where matno='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			return true;
		}else{
			return false;
		}
	}

	public function checkTwo($table,$matno,$date)
	{
		$matno= $this->cleanse($matno);
		$date= $this->cleanse($date);
		$query = "SELECT * FROM {$table} where matno={$matno} and date='$date' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			return true;
		}else{
			return false;
		}
	}

	public function state_one($value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT id,name FROM state where id='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row['name'];
		}else{
			return "No found records";
		}
	}

	public function lga_one($value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT id,name FROM lga where id='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row['name'];
		}else{
			return "No found records";
		}
	}


		public function town_one($value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT id,name FROM town where id='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row['name'];
		}else{
			return "No found records";
		}
	}




//Counting All
	public function countAll($table)
	{
		$q=$this->con->query("SELECT id FROM {$table}");
		if ($q) {
			return $q->num_rows;
		} else {
			return 0;
		}
		
		
	}


		public function countAllVote($table,$party,$election_type)
	{
		$q=$this->con->query("SELECT SUM(vote) as s FROM {$table} where election_type='$election_type' and party='$party' ");
		if ($q) {
			$r=$q->fetch_assoc();
			return $r['s'];
		} else { 
			return 0;
		}
		
		
	}



	public function countAllWithTwo($table,$cat)
	{
		$q=$this->con->query("SELECT id FROM {$table} where role='$cat' ");
		if ($q) {
			return $q->num_rows;
		} else {
			return 0;
		}
		
		
	}


		public function countAllAgent($cat)
	{
		$q=$this->con->query("SELECT id FROM agent where party='$cat' ");
		if ($q) {
			return $q->num_rows;
		} else {
			return 0;
		}
		
		
	}

//Counting Specific
	
	
// Inserting


	// Insert into State,Lga,Town
	public function insertState($value)
	{
		$name = $this->cleanse(strtoupper($value));
		$query="INSERT INTO state(name) VALUES('$name')";
		$sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:view-state.php?msg=State was successfully inserted&type=success");
		}else{
			header("Location:view-state.php?msg=Error adding data try again!&type=error");
		}
	}

	public function insertLga($v1,$v2)
	{
		$state = $this->cleanse($v1);
		$name = $this->cleanse($v2);
		$query="INSERT INTO lga(state_id,name) VALUES('$state','$name')";
		$sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:view-lga.php?msg=Lga was successfully inserted&type=success");
		}else{
			header("Location:view-lga.php?msg=Error adding data try again!&type=error");
		}
	}

	public function insertTown($v1,$v2,$v3)
	{
		$state = $this->cleanse($v1);
		$lga= $this->cleanse($v2);
		$name = $this->cleanse($v3);
		$query="INSERT INTO town(state_id,lga_id,name) VALUES('$state','$lga','$name')";
		$sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:view-town.php?msg=Town/District was successfully inserted&type=success");
		}else{
			header("Location:view-town.php?msg=Error adding data try again!&type=error");
		}
	}

	public function insertParty($value)
	{
		$name = $this->cleanse(strtoupper($value));
		$query="INSERT INTO party(name) VALUES('$name')";
		$sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:view-party.php?msg=Party was successfully inserted&type=success");
		}else{
			header("Location:view-party.php?msg=Error adding data try again!&type=error");
		}
	}

	public function insertAgent($value)
	{

		$name = $this->cleanse($_POST['name']);
		$state = $this->cleanse($_POST['state']);
		$lga = $this->cleanse($_POST['lga']);
		$town = $this->cleanse($_POST['town']);
		$email = $this->cleanse($_POST['email']);
		$password = $this->cleanse($_POST['password']);
		$party = $this->cleanse($_POST['party']);
		$query="INSERT INTO agent(name,state,lga,town,email,password,party) VALUES('$name','$state','$lga','$town','$email','$password','$party')";
		$query2="INSERT INTO login(name,email,password,role) VALUES('$name','$email','$password','3')";
		$sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:view-agent.php?msg=Agent was successfully inserted&type=success");
			$this->con->query($query2);
		}else{
			header("Location:view-agent.php?msg=Error adding data try again!&type=error");
		}
	}


		public function insertPOfficer($value)
	{

		$name = $this->cleanse($_POST['name']);
		$state = $this->cleanse($_POST['state']);
		$lga = $this->cleanse($_POST['lga']);
		$town = $this->cleanse($_POST['town']);
		$email = $this->cleanse($_POST['email']);
		$password = $this->cleanse($_POST['password']);
		$party = $this->cleanse($_POST['party']);
		$query="INSERT INTO pofficer(name,state,lga,town,email,password) VALUES('$name','$state','$lga','$town','$email','$password')";
		$query2="INSERT INTO login(name,email,password,role) VALUES('$name','$email','$password','4')";
		$sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:view-pofficer.php?msg=Preceding officer was successfully inserted&type=success");
			$this->con->query($query2);
		}else{
			header("Location:view-pofficer.php?msg=Error adding data try again!&type=error");
		}
	}

	

		public function insertVote($value)
	{

		$election_type = $this->cleanse($_POST['election_type']);
		$state = $this->cleanse($_POST['state']);
		$lga = $this->cleanse($_POST['lga']);
		$town = $this->cleanse($_POST['town']);
		$party = $this->cleanse($_POST['party']);
		$party_agent = $this->cleanse($_POST['party_agent']);
		$vote = $this->cleanse($_POST['vote']);
		$query="INSERT INTO election(election_type,state,lga,town,party,party_agent,vote) VALUES('$election_type','$state','$lga','$town','$party','$party_agent','$vote')";
		$sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:view-result.php?msg=Result was successfully inserted&type=success");
		}else{
			header("Location:view-result.php?msg=Error adding data try again!&type=error");
		}
	}

	public function insertCod($post)
	{
		$party = $this->cleanse($_POST['party']);
		$email = $this->cleanse($_POST['email']);
		$password = $this->cleanse($_POST['password']);
		$name = $this->cleanse($_POST['name']);
		$query="INSERT INTO coordinator(name,email,password,party) VALUES('$name','$email','$password','$party')";
		$query2="INSERT INTO login(name,email,password,role) VALUES('$name','$email','$password','2')";
		$sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:view-cod.php?msg=Coordinator was successfully inserted&type=success");
			$this->con->query($query2);
		}else{
			header("Location:view-cod.php?msg=Error adding data try again!&type=error");
		}
	}


	public function insertType($value)
	{
		$name = $this->cleanse(strtoupper($value));
		$query="INSERT INTO election_type(name) VALUES('$name')";
		$sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:view-type.php?msg=Election type was successfully inserted&type=success");
		}else{
			header("Location:view-type.php?msg=Error adding data try again!&type=error");
		}
	}



	public function updateAdmin($post)
	{
		
		$email=$this->cleanse($_POST['email']);
		$password=$this->cleanse($_POST['password']);
		$query="UPDATE login SET email='$email',password='$password' WHERE email='$email' ";
		$sql=$this->con->query($query);
		if ($sql==true) {
			header("Location:profile.php?msg=Account was updated successfully&type=success");
		}else{
			header("Location:profile.php?msg=Error updating account try again!&type=error");
		}
	}




	public function displayProfile($value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT * FROM login where email='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}else{
			return "No found records";
		}
	}



//Empty Table
	public function emptyTable($table,$url) 
	{ 
		$id = $this->cleanse($id);
		$query = "TRUNCATE {$table}";

		$result = $this->con->query($query);

		if ($result == true) {
			header("Location:$url?msg=Data was successfully deleted&type=success");
		} else {
			header("Location:$url?msg=Error deleting data&type=error");
		}
	}



//Delete Items
	public function delete($id, $table,$url) 
	{ 
		$id = $this->cleanse($id);
		$query = "DELETE FROM {$table} WHERE id = $id";

		$result = $this->con->query($query);

		if ($result == true) {
			header("Location:$url?msg=Data was successfully deleted&type=success");
		} else {
			header("Location:$url?msg=Error deleting data&type=error");
		}
	}
	

	public function deleteTwoTable($matno,$table,$table2,$url) 
	{ 
		$matno = $this->cleanse($matno);
		$query = "DELETE FROM {$table} WHERE matno= $matno";
		$query2 = "DELETE FROM {$table2} WHERE matno= $matno";

		$result = $this->con->query($query);

		if ($result == true) {
			header("Location:$url?msg=Student was successfully deleted&type=success");
			$this->con->query($query2);
		} else {
			header("Location:$url?msg=Error deleting Student&type=error");
		}
	}


//Search
	public function displaySearch($value)
	{
	//Search box value assigning to $Name variable.
		$Name = $this->cleanse($value);
		$query = "SELECT * FROM product WHERE pid LIKE '%$Name%'";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}else{
			return false;
		}
	}



	public function cleanse($str)
	{
   #$Data = preg_replace('/[^A-Za-z0-9_-]/', '', $Data); /** Allow Letters/Numbers and _ and - Only */
		$str = htmlentities($str, ENT_QUOTES, 'UTF-8'); /** Add Html Protection */
		$str = stripslashes($str); /** Add Strip Slashes Protection */
		if($str!=''){
			$str=trim($str);
			return mysqli_real_escape_string($this->con,$str);
		}
	}




	

	public function greeting()
	{
      //Here we define out main variables 
		$welcome_string="Welcome!"; 
		$numeric_date=date("G"); 

 //Start conditionals based on military time 
		if($numeric_date>=0&&$numeric_date<=11) 
			$welcome_string="Good Morning!,"; 
		else if($numeric_date>=12&&$numeric_date<=17) 
			$welcome_string="Good Afternoon!,"; 
		else if($numeric_date>=18&&$numeric_date<=23) 
			$welcome_string="Good Evening!,"; 

		return $welcome_string;

	}



}

?>

