<?php

if (isset($_POST['code'])) {
  unlink("../".$_POST['code']."/index.php");
  rmdir("../".$_POST['code']);
  echo "<script>alert('Success');</script>";
}

?>

<form action="" method="post">
<input type="text" name="code" placeholder="code">
<input type="submit">
</form>
