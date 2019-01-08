<?php
session_start();
if(isset($_SESSION['u_sid']))
{
session_unset();
session_destroy();
header("Location: ../index.php?logout=success");
exit();
}
 ?>
