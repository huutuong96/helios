<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <b>Xin chào <?php echo e($user->username); ?></b><br>
    Chúng tôi rất hân hạnh khi bạn sử dụng trang web của chúng tôi <br>
    Mã lấy lại mật khẩu của bạn là <h3><b><?php echo e($user->token); ?></b></h3>
    bạn vui lòng nhập vào trang hỗ trợ tại web site hoặc có thể nhấn <a href="http://127.0.0.1:8000/new_password">vào đây</a>
</body>
</html><?php /**PATH C:\xampp\htdocs\du_an\laravel_web\php_3\asm\example-app\resources\views/FrontEnd/pages/mail_contain.blade.php ENDPATH**/ ?>