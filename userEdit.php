<?php 
include './lib/security.php';
include './lib/ProjectFair.php';
$fair = new Fair();

if ($_SESSION['usetype'] =='teacher') {
  header("location:userIndex.php");
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Project Fair</title>
  </head>
  <body>
    <div class="container"><br><br>
        <div class="text-center">
          <strong><h3>Update Your Proposal</h3></strong>
        </div><br>
      <div class="row">
        <div class="col-md-5 mx-auto">
        	<?php 
            $id=$_GET['id']; 
	            if (isset($_POST['submit'])) {
                  $stuId =$_POST['stuId']; 
	                $semesterName=$_POST['semesterName']; 
                  $semYear=$_POST['semYear']; 
                  $progamLang=$_POST['progamLang']; 
	                $tittle=$_POST['tittle'];
	                $description=$_POST['description'];  
	                $updateProposal = $fair->userUpdatePropos($id,$stuId,$semesterName,$semYear,$progamLang,$tittle,$description);
	            }

	            if (isset($updateProposal)) {
	                echo $updateProposal;
	            }
	        ?>
          <form method="POST">
            <?php 
              $data = $fair->getSingleProposal($id);
              if ($data) {
                  while ($value = $data->fetch_assoc()) {
            ?>
          <div class="form-group">
            <label for="tittle">Student ID</label>
            <input type="text" name="stuId" class="form-control" value="<?php echo $value['studentId']; ?>">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Completed Semester?</label>
            <select name="semesterName" class="form-control">
            	<option value="<?php echo $value['semName']; ?>"><?php echo $value['semName']; ?></option>
            	<option value="SPRING-2019">SPRING-2019</option>
            	<option value="SUMMER-2019">SUMMER-2019</option>
            	<option value="FALL-2019">FALL-2019</option>
            </select>
          </div>
          <div class="form-group">
            <label for="tittle">Semester Year</label>
            <input type="text" name="semYear" class="form-control" value="<?php echo $value['year']; ?>">
          </div>
          <div class="form-group">
            <label for="tittle">Programming Language</label>
            <input type="text" name="progamLang" class="form-control" value="<?php echo $value['programingLan']; ?>">
          </div>
          <div class="form-group">
            <label for="tittle">Project Tittle</label>
            <input type="text" name="tittle" class="form-control" value="<?php echo $value['projectTittle']; ?>">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Project Description</label>
            <textarea name="description" class="form-control">
              <?php echo $value['projectDescription']; ?>
            </textarea>
          </div>
          <div class="form-group form-check text-center">
          <button type="submit" name="submit" class="btn btn-primary">Update</button>
          <a href="userIndex.php" class="btn btn-info">Back</a>
          </div>
          <?php 
              }
            }
          ?>
        </form>
        </div>
      </div><br><br>
      <footer>
        <div class="text-center">
          &copy;All right reserved Raju Raj
        </div>
      </footer>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
