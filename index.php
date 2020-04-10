<?php 
include './lib/security.php';
include './lib/ProjectFair.php';
$fair = new Fair();

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
    <div class="container"><br><br>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a href="index.php" class="navbar-brand">Home</a>
            </li>           
          </ul>
        </div>
        <a href="logout.php" class="btn btn-danger my-2 my-sm-0">Log Out</a>
      </nav><br>
      <?php 
        $name = $fair->userGetName();
        if ($name) {
          while ($value = $name->fetch_assoc()) {
      ?>
      <div class="text-center" style="font-size: 30px;">
        Hello! <strong><?php echo $value['name']; ?></strong>
      </div>
      <?php 
        }
      }
      ?>
      <br>
      <div class="row">
        <div class="col-md-12 mx-auto text-center">
          <table class="table table-striped">
          <tr>
            <th width="10%">Serial</th>
            <th width="25%">Student Id </th>
            <th width="25%">Student Name </th>
            <th width="25%">Project Tittle</th>
            <th width="15%">Action</th>
          </tr>
         <?php 
            $data = $fair->getProposal();
            if ($data) {
                $i=0;
                while ($value = $data->fetch_assoc()) {
                    $i++;
          ?>
          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $value['studentId']; ?></td>
            <td><?php echo $value['name']; ?></td>
            <td><?php echo $value['projectTittle']; ?></td>
            <td>
              <a class="btn btn-primary" href="singleView.php?id=<?php echo $value['id']; ?>">View</a>
            </td>
           </tr>
          <?php 
              }
            }
          ?>
        </table>
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