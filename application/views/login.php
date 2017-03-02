<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Neptune v<?php echo $this->config->item('application_version'); ?> | Login</title>

    <!-- start mincss template tags -->
    <link rel="stylesheet" type="text/css" href="/dist/neptune.min.css?rel=3df71a5fc7"/>
    <!-- end mincss template tags -->

    <!-- start minjs template tags -->
    <script type="text/javascript" src="/dist/neptune.min.js?rel=19def3b090"></script>
    <!-- end minjs template tags -->

    <!-- neptune:css -->
    <link rel="stylesheet" type="text/css" href="/dist/login.css"/>
    <!-- endneptune -->
</head>
<body onload="show<?php echo $method ?>()">

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">.</h1>
            <div class="account-wall">
                <img class="profile-img" src="/image/logo.png" alt="">
                <div id="username">
                    <?php echo form_open('login/password', array('class' => 'form-signin')) ?>
                    <?php echo form_error('username'); ?>
                    <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('login_username')?>" id="user" name="username" required autofocus>
                        <input type="password" class="form-control" placeholder="<?php echo $this->lang->line('login_password')?>" id="pass" name="password" required>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">
                            <?php echo $this->lang->line('common_sign_in')?></button>
                        <a href="#" onclick="showpin()" class="pull-left text"><?php echo $this->lang->line('login_with_pin')?></a>
                        <a href="#" class="pull-right text"><?php echo $this->lang->line('common_need_help')?> </a><span class="clearfix"></span>
                    <?php echo form_close(); ?>
                </div>
                <div id="pin">
                    <?php echo form_open('login/pin', array('class' => 'form-signin')) ?>
                        <?php echo form_error('pinnumber') ;?>
                        <input type="password" class="form-control" placeholder="<?php echo $this->lang->line('login_pin')?>" name="pinnumber" id="pinnumber" required>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">
                            <?php echo $this->lang->line('common_sign_in')?></button>
                        <a href="#" onclick="showpassword()" class="pull-left text"><?php echo $this->lang->line('login_with_password')?></a>
                        <a href="#" class="pull-right text"><?php echo $this->lang->line('common_need_help')?> </a><span class="clearfix"></span>
                    <?php echo form_close(); ?>
                </div>
            </div>
            <p class="text-center text">Neptune v<?php echo $this->config->item('application_version'); ?> <code><?php echo $this->config->item('hash'); ?> </code></p>
        </div>
    </div>
</div>

</body>

<script type="text/javascript">
function showpin() {
    document.getElementById("username").style.display = "none";
    document.getElementById("pin").style.display = "block";
    document.getElementById("pinnumber").focus();
}

function showpassword() {
    document.getElementById("pin").style.display = "none";
    document.getElementById("username").style.display = "block";
    document.getElementById("user").focus();
}
</script>