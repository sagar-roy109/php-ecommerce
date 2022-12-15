<?php 
session_start();
include_once 'templates/header.php';
include 'config/db.php';
?>
<?php
$db = new Database();

if(isset($_SESSION['auth_user'])){
  echo "<script>window.location.href='index.php'</script>";
}

  if(isset($_POST['register'])){
    if( $_POST['password'] == null || $_POST['email']== null ){
      $error = "Please fill all details";
    }else{

      $password = $db->mysqli->real_escape_string($_POST['password']);
      $email = $db->mysqli->real_escape_string($_POST['email']);

      $sql = "SELECT * FROM users WHERE email = '$email' AND password='$password'";
      $db->sql($sql);

      $data = $db->getResult();

      if(count($data)>0){
        
        

        $_SESSION['auth_user'] = [
          'user_id' => $data[0]['user_id'],
          'name' => $data[0]['user_name'],
          'email' => $data[0]['email'],
          'role' => $data[0]['role']
        ];

        echo "<script>window.location.href='index.php'</script>";

        

      }

      $error = "Password not match please check both password !";


      // if($_POST['password'] == $_POST['rePassword']){
      //   $data = [];
      //   $data['user_name'] = $_POST['user_name'];
      //   $data['email'] = $_POST['email'];
      //   $data['phone'] = $_POST['phone'];
      //   $data['password'] = $_POST['password'];

      //   $create_user = $db->insert('users',$data);

      //   if($create_user){
      //     $_SESSION['message'] = "Registered successfully";
      //     header('Location: login.php');
      //   }

      //   print_r($data);
      // }else{
      //   $error = "Password not match please check both password !";
      // }
    }
    
    
  }

?>

<div class="container mt-5">
  <h2 class="text-center">Login</h2>
  <?php if(isset($error)){ ?> 
    <p class="text-danger"> <?php echo $error ;?></p>
 <?php  }?>
<form method="post">

  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input name="email" type="email" class="form-control" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
 
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name="password" type="password" class="form-control"  placeholder="Password">
  </div>
  
  
  <button type="submit" name="register" class="btn btn-primary">Login</button>
</form>
<p style="margin-top:10px">Not Registered ?<a href="register.php"> Create account here</a> </p>
</div>

<?php include 'templates/footer.php' ?>