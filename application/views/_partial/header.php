
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $title; ?> | Neptune v<?php echo $this->config->item('application_version'); ?></title>

    <?php $this->load->view('_partial/header_css_js'); ?>

    <script type="text/javascript">
        toastr.options = {
            "positionClass": "<?php echo $this->config->item('notify_position'); ?>",
            "progressBar": <?php echo $this->config->item('notify_progress'); ?>,
            "timeOut": <?php echo $this->config->item('notify_timeout'); ?>
        }
    </script>

</head>

<body>

<?php
if($this->auth->isLoggedIn()){
?>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" aria-expanded="false" type="button" data-target="#bs-example-navbar-collapse-1" data-toggle="collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <ul class="nav navbar-nav navbar-brand-dropdown">
                <li class="dropdown">
                    <a class="navbar-brand dropdown-toggle" role="button" aria-expanded="false" aria-haspopup="true" href="#" data-toggle="dropdown">
                        <?php echo $section; ?> <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-brand">
                        <li><a href="<?php echo site_url('repair'); ?>">Repair</a></li>
                        <li><a href="<?php echo site_url('sales'); ?>">Sales</a></li>
                        <li><a href="<?php echo site_url('config'); ?>">Config</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse navbar-right">
            <ul class="nav navbar-nav">
                <li class="dropdown" class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Checkin <b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo site_url('repair/checkin/new'); ?>">New Checkin</a>
                        </li>
                        <li><a href="<?php echo site_url('repair/checkin/returing'); ?>">Returning Checkin</a>
                        </li>
                    </ul>
                </li>
                <li><a href="#">Checkout</a>
                </li>
                <li class="dropdown" class="dropdown" class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Tools <b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Notes</a>
                        </li>
                        <li><a href="#">Tools</a>
                        </li>
                        <li><a href="#">Docs</a>
                        </li>
                    </ul>
                </li>
                <li><a href="<?php echo site_url('logout'); ?>">Logout</a>
                </li>
            </ul>
            <form class="navbar-form navbar-right" role="search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="q">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
            </form>
        </div><!--/.nav-collapse -->


    </div>
</nav>

<?PHP
}
?>
<div class="container">