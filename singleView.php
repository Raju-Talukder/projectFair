<?php 
include './lib/security.php';

if ($_SESSION['usetype'] =='student') {
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
    <div class="container"><br><br><br><br>
      <div class="row">
        <div class="col-md-5 mx-auto">
          <?php 
            include './lib/ProjectFair.php';
            $fair = new Fair();

            $id=$_GET['id'];

            if (isset($_POST['approve'])) {  
                $result = $fair->approvePoposal($id);
            }elseif (isset($_POST['reject'])) {
                $result = $fair->rejectPoposal($id);
            }

             if (isset($result)) {
                 echo $result;
            }
          ?>
          <div class="text-center" style="font-size: 30px;"> 
            <strong>Single View</strong>
          </div>
          <form method="POST">
          <div class="form-group">
            <?php 
              $data = $fair->getSingleProposal($id);
              if ($data) {
                  while ($value = $data->fetch_assoc()) {
            ?>
          </div>
          <div class="form-group">
            <label for="tittle">Student ID</label>
            <span class="form-control"><?php echo $value['studentId']; ?></span>            
          </div>
          <div class="form-group">
            <label for="Description">Programming Language</label>
            <span class="form-control"><?php echo $value['programingLan']; ?></span> 
          </div>
          <div class="form-group">
            <label for="tittle">Project Tittle</label>
            <span class="form-control"><?php echo $value['projectTittle']; ?></span>            
          </div>
          <div class="form-group">
            <label for="Description">Project Description</label>
            <span class="form-control"><?php echo $value['projectDescription']; ?></span> 
          </div>
          <?php 
              }
            }
          ?>
          <div class="form-group form-check text-center">
          <button type="submit" name="approve" class="btn btn-success">Approve</button>
          <button type="submit" name="reject" class="btn btn-danger">Reject</button>
          <a class="btn btn-info" href="index.php">Back</a>
          </div>
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