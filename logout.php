<?php   
session_start(); //to ensure you are using same session
session_destroy(); //destroy the session
echo '<script>window.location.href="login.php"</script>'; //to redirect back to "login.php" after logging out
exit();
?>