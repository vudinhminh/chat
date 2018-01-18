<?php
require_once __DIR__ . "/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Đăng nhập</title>
        <link rel="shortcut icon" href="<?php echo FULL_SITE_ROOT ?>public/images/icon.png" type="image/x-icon" />
	<link rel="stylesheet" href="<?php echo FULL_SITE_ROOT ?>public/css/animate.css">
	<link rel="stylesheet" href="<?php echo FULL_SITE_ROOT ?>public/css/style2.css">
	<script src="<?php echo FULL_SITE_ROOT ?>public/js/jquery-1.12.0.min.js"></script>
</head>
<body>
	<div class="container">
            <div class="login-box animated fadeInUp" style="max-width:340px">
                <form action="<?php echo FULL_SITE_ROOT ?>/XLLogin.php" method="POST" >
                    <div class="box-header">
                            <h2>Đăng nhập</h2>
                    </div>
                    <label for="username">Tên đăng nhập</label>
                    <br/>
                    <input type="text" name="txtTenDangNhap" id="username">
                    <br/>
                    <label for="password">Mật khẩu</label>
                    <br/>
                    <input type="password" name="txtMatKhau" id="password">
                    <br/>

                    <span style="color: red;"><?php if (isset($err)) echo $err; ?></span>
                    <br>
                    <input type="submit" class="btn btn-info" value="Đăng nhập"/>
                    <input type="reset" class="btn btn-default" value="reset"/>
                </form>
            </div>
	</div>
</body>
</html>