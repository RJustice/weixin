<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php echo validation_errors();?>
    <form action="<?php site_url('user/login');?>" method="post">
        <input type="text" name="username" id="" value="<?php echo set_value('username');?>">
        <br />
        <input type="text" name="password" id="" value="<?php echo set_value('password');?>">
        <br />
        <input type="submit" value="Submit">
    </form>
</body>
</html>