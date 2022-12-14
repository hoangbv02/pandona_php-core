<?php
session_start();
unset($_SESSION['login']['admin']);
echo '<script>alert("Đăng xuất thành công!")</script>';
echo '<script>window.location="../?pages=dang_nhap"</script>';
