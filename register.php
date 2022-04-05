<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Register</title>
  </head>
  <body>
  <nav class="navbar navbar-dark bg-dark">
  <form class="container-fluid justify-content-start">
    <a href="register.php"><button class="btn btn-outline-success me-2" type="button" href="register.php">Register</button></a>
    <a href="login.php"><button class="btn btn-outline-success me-2" type="button" >Login</button></a>
  </form>
</nav>

<div class="container my-5">
<form action="" method="POST">
  <h2>Registration form</h2>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="user">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="pass">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Register</button>
</form>
</div>
<?php


if(isset($_POST["submit"]))
{
    if(!empty($_POST['user']) && !empty($_POST['pass']))
    {
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        $con = mysqli_connect("localhost","root","","registration","3306");
        
        $query = $con->query("SELECT * FROM login WHERE username='".$user."'");
        $numrows = mysqli_num_rows($query);
        if($numrows == 0)
        {
            $sql = "INSERT INTO login(username,password) VALUES('$user','$pass')";

            $result = $con->query($sql);

            if($result)
            {
                echo '<div class="container"><div class="alert alert-success alert-dismissible fade show" role="alert">
                <h3>Your account is successfully created!</h3>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div></div>';
            }
            else
            {
                echo "Failure";
            }
        }
        else
        {
            echo '<div class="container"><div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h3>This username already exists!</h3>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div></div>';
        }

    }
    else
    {
      echo '<div class="container"><div class="alert alert-warning alert-dismissible fade show" role="alert">
      <h3>All fields are required!</h3>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div></div>';
    }
}

?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
