<?php
session_start();
unset($_SESSION['login']['user']);
echo '<script>alert("Đăng xuất thành công!")</script>';
echo '<script>window.location="../index.php"</script>';
