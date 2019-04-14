<?php
$this->load->view('_partial/header');
?>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">.</h1>
            <div class="account-wall">
                <img class="profile-img" src="/image/logo.png" alt="">
                <div id="username">
                    <?php echo form_open('login/check', array('class' => 'form-signin')) ?>
                    <?php echo form_error('username'); ?>
                    <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('login_username')?>" id="user" name="username" required autofocus>
                    <input type="password" class="form-control" placeholder="<?php echo $this->lang->line('login_password')?>" id="pass" name="password" required>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">
                        <?php echo $this->lang->line('common_sign_in')?></button>
                    <?php echo form_close(); ?>
                </div>
            </div>
            <p class="text-center text">Neptune v<?php echo $this->config->item('application_version'); ?> <code><?php echo $this->config->item('hash'); ?> </code></p>
        </div>
    </div>
</div>

</body>