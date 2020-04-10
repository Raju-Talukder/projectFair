<?php 
	include 'Database.php';
?>
<?php 
error_reporting(0);
class Fair
{
	private $db;
		
	public function __construct(){
		$this->$db = new Database();
	}
	
	public function getProposal(){
		$query = "SELECT students.name,proposal.studentId,proposal.projectTittle,proposal.id FROM proposal INNER JOIN students ON students.studentId = proposal.studentId";
		$result = $this->$db->select($query);
		return $result;
	}

	public function userGetName(){
		$email = $_SESSION['username'];
		$query = "SELECT * FROM students WHERE students.email = '$email'";
		$result = $this->$db->select($query);
		return $result;
	}

	public function userGetProposal(){
		$email = $_SESSION['username'];
		$query = "SELECT students.name,proposal.id,proposal.projectTittle,proposal.projectDescription,proposal.isApproved FROM proposal INNER JOIN students ON students.studentId = proposal.studentId WHERE students.email = '$email'";
		$result = $this->$db->select($query);
		return $result;
	}

	public function getSingleProposal($id){
		$query = "SELECT * FROM proposal WHERE id='$id'";
		$result = $this->$db->select($query);
		return $result;
	}

	public function insertUsers($name,$role,$email,$password,$presentAddress,$permanentAddress){
		$password= md5($password);
			if (empty($name)||empty($role) || empty($email)||empty($password) || empty($presentAddress)||empty($permanentAddress)) {
				$msg = "<div class='alert alert-danger'><strong>Error !</strong>Field must not be empty</div>";
				return $msg;
			}else{
				$query = "INSERT INTO students(name,role,email,password,presentAdd,parmanentAdd)VALUES('$name','$role','$email','$password','$presentAddress','$permanentAddress')";
				$dataInsert = $this->$db->insert($query);

				if ($dataInsert) {
					$msg = "<div class='alert alert-success'><strong>Success !</strong>You are registered.</div>";
					return $msg;
				}else{
					$msg = "<div class='alert alert-danger'><strong>Error !</strong>You are not registered.</div>";
					return $msg;
				}
			}
		}

		public function insertPropos($stuId,$semesterName,$semYear,$progamLang,$tittle,$description){
			if (empty($stuId) || empty($semesterName) || empty($semYear) || empty($progamLang) || empty($tittle) || empty($description)) {
				$msg = "<div class='alert alert-danger'><strong>Error !</strong>Field must not be empty</div>";
				return $msg;
			}else{
				if ($semesterName == 'SPRING-2019' || $semesterName == 'SUMMER-2019' || $semesterName == 'FALL-2019') {
					$proposeQuery = "INSERT INTO proposal
					(StudentId,semName,year,projectTittle,projectDescription,programingLan)
					VALUES('$stuId','$semesterName','$semYear','$tittle','$description','$progamLang')";
					$dataInsert = $this->$db->insert($proposeQuery);

					$email = $_SESSION['username'];
					$stdentQuery = "UPDATE students SET studentId ='$stuId' WHERE email = '$email'";
					$dataInsert = $this->$db->insert($stdentQuery);

					if ($dataInsert) {
						$msg = "<div class='alert alert-success'><strong>Success !</strong>Your propsal is Submitted.</div>";
						return $msg;
					}else{
						$msg = "<div class='alert alert-danger'><strong>Error !</strong>Your proposal is not submitted.</div>";
						return $msg;
					}
				}else{
					$msg = "<div class='alert alert-danger'><strong>Error !</strong>You are Not Eligible.</div>";
					return $msg;
				}
			}
		}

		public function userUpdatePropos($id,$stuId,$semesterName,$semYear,$progamLang,$tittle,$description){
			if (empty($stuId) || empty($semesterName) || empty($semYear) || empty($progamLang) || empty($tittle) || empty($description)) {
				$msg = "<div class='alert alert-danger'><strong>Error !</strong>Field must not be empty</div>";
				return $msg;
			}else{
				if ($semesterName == 'SPRING-2019' || $semesterName == 'SUMMER-2019' || $semesterName == 'FALL-2019') {
					$proposeQuery = "UPDATE proposal SET studentId='$stuId',semName='$semesterName',year = '$semYear',projectTittle = '$tittle',projectDescription = '$description',programingLan = '$progamLang' WHERE id = '$id'";
					$dataInsert = $this->$db->insert($proposeQuery);

					$email = $_SESSION['username'];
					$stdentQuery = "UPDATE students SET studentId ='$stuId' WHERE email = '$email'";
					$dataInsert = $this->$db->insert($stdentQuery);

					if ($dataInsert) {
						$msg = "<div class='alert alert-success'><strong>Success !</strong>Your propsal is Updated.</div>";
						return $msg;
					}else{
						$msg = "<div class='alert alert-danger'><strong>Error !</strong>Your proposal is not Updated.</div>";
						return $msg;
					}
				}else{
					$msg = "<div class='alert alert-danger'><strong>Error !</strong>You are Not Eligible.</div>";
					return $msg;
				}
			}
		}

		public function deleteProposal($id){
			$query = "DELETE FROM proposal WHERE id='$id'";
			$result = $this->$db->delete($query);
			header("Location:index.php");
			return $result;
		}

		public function userDeleteProposal($id){
			$query = "DELETE FROM proposal WHERE id='$id'";
			$result = $this->$db->delete($query);
			header("Location:userIndex.php");
			return $result;
		}

		public function approvePoposal($id){
			$query = "UPDATE proposal SET isApproved = 'Approve' WHERE id = '$id'";
			$dataUpadate = $this->$db->update($query);

			if ($dataUpadate) {
				$msg = "<div class='alert alert-success'><strong>Success !</strong>Project Approved.</div>";
				return $msg;
			}else{
				$msg = "<div class='alert alert-danger'><strong>Error !</strong>Project not Approved.</div>";
				return $msg;
			}
		}

		public function rejectPoposal($id){
			$query = "UPDATE proposal SET isApproved = 'Reject' WHERE id = '$id'";
			$dataUpadate = $this->$db->update($query);

			if ($dataUpadate) {
				$msg = "<div class='alert alert-success'><strong>Success !</strong>Project Rejected.</div>";
				return $msg;
			}else{
				$msg = "<div class='alert alert-danger'><strong>Error !</strong>Project not Rejected.</div>";
				return $msg;
			}
		}

		public function chekLogin($email,$password){
			$password= md5($password);
			$query = "SELECT * FROM students WHERE email = '$email' AND password = '$password'";
			$result = $this->$db->select($query);
			$userType = mysqli_fetch_array($result);
			if ($userType['role'] == "teacher") {
				$_SESSION['username']=$email;
				$_SESSION['usetype']=$userType['role'];
				header("Location:index.php");
			}elseif($userType['role'] == "student"){
				$_SESSION['username']=$email;
				$_SESSION['usetype']=$userType['role'];
				$_SESSION['showname']=$userType['name'];
				header("Location:userIndex.php");
			}else{
				$_SESSION['status']="<div class='alert alert-danger'><strong>Error !</strong>No data found.</div>";
				header("Location:login.php");
			}
		}
}
?>