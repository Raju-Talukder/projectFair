<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Registration</title>
  </head>
  <body>
    <div class="container"><br><br><br><br>
      <div class="row">
        <div class="col-md-5 mx-auto">
          <?php
            include './lib/ProjectFair.php';
            $fair = new Fair();
            if (isset($_POST['submit'])) {
                $name=$_POST['name']; 
                $role=$_POST['role']; 
                $email=$_POST['email']; 
                $password=$_POST['password']; 
                $presentAddress=$_POST['presentAddress']; 
                $permanentAddress=$_POST['permanentAddress']; 
                $insertData = $fair->insertUsers($name,$role,$email,$password,$presentAddress,$permanentAddress);
            }

            if (isset($insertData)) {
                echo $insertData;
            }
          ?>
          <form method="POST">
            <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Name">
          </div>
          <div class="form-group">
            <label for="role">Role</label>
            <select name="role" class="form-control">
              <option value="">Select Role</option>
              <option value="teacher">Teacher</option>
              <option value="student">Student</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" placeholder="Email" class="form-control" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="presentAddress">Present Address</label>
            <textarea name="presentAddress" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label for="permanentAddress">Permanent Address</label>
            <textarea name="permanentAddress" class="form-control"></textarea>
          </div>
          <div class="form-group form-check text-center">
            <label class="form-check-label" for="exampleCheck1">Already have account?<a href="login.php">Log in</a></label><br>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>