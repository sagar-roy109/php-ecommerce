<?php
include 'templates/header.php' ?>
<?php

if (!$_SESSION['auth_user']['role'] == 1) {
  echo  "<script>window.location.href='/index.php'</script>";
}

?>


  <?php include 'templates/footer.php' ?>