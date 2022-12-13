<?php
session_start();
include_once 'templates/header.php';
include 'config/db.php';
$db = new Database();


if(isset($_SESSION['auth_user'])){
  echo "<script>window.location.href='index.php'</script>";
}

if (isset($_POST['register'])) {
  if ($_POST['rePassword'] == null || $_POST['password'] == null || $_POST['email'] == null || $_POST['user_name'] == null || $_POST['phone'] == null) {
    $error = "Please fill all details";
  } else {
    // check email existing 
    $email = $_POST['email'];
    $data =  $db->sql("SELECT email from users WHERE email= '$email'");

    if (count($db->getResult()) > 0) {
      $error = "Email already exist";
    } else {
      if ($_POST['password'] == $_POST['rePassword']) {
        $data = [];
        $data['user_name'] = $_POST['user_name'];
        $data['email'] = $_POST['email'];
        $data['phone'] = $_POST['phone'];
        $data['password'] = $_POST['password'];

        $create_user = $db->insert('users', $data);

        if ($create_user) {

          $_SESSION['message'] = "Registered successfully";
          echo "<script>window.location.href='login.php'</script>";
        }
      } else {
        $error = "Password not match please check both password !";
      }
    }
  }
}

?>

<div class="container mt-5">
  <h2 class="text-center">Register</h2>
  <?php if (isset($error)) { ?>
    <p class="text-danger"> <?php echo $error; ?></p>
  <?php  } ?>
  <form method="post">
    <div class="form-group">
      <label for="exampleInputEmail1">Name</label>
      <input name="user_name" type="text" class="form-control" placeholder="Enter Your Name">

    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input name="email" type="email" class="form-control" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Phone</label>
      <input name="phone" type="text" class="form-control" placeholder="Enter phone number">

    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input name="password" type="password" class="form-control" placeholder="Password">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Confirm Password</label>
      <input name="rePassword" type="password" class="form-control" placeholder="Password">
    </div>

    <button type="submit" name="register" class="btn btn-primary">Register</button>
  </form>
  <p style="margin-top:10px">Already Registerd ? <a href="login.php">Login here</a> </p>
</div>


<?php include 'templates/footer.php' ?>