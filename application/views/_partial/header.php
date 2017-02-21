
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Fixed Top Navbar Example for Bootstrap</title>
<?php if ($this->input->cookie('debug') == "true" || $this->input->get("debug") == "true") : ?>

    <!-- bower:css -->
    <link rel="stylesheet" href="bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.css" />
    <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="bower_components/bootstrap3-dialog/dist/css/bootstrap-dialog.min.css" />
    <!-- endbower -->

    <!-- start css template tags -->
    <!-- end css template tags -->

    <!-- bower:js -->
    <script src="bower_components/jquery/dist/jquery.js"></script>
    <script src="bower_components/jquery-ui/jquery-ui.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.js"></script>
    <script src="bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.js"></script>
    <script src="bower_components/moment/moment.js"></script>
    <script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="bower_components/bootstrap3-dialog/dist/js/bootstrap-dialog.min.js"></script>
    <!-- endbower -->

    <!-- start js template tags -->
    <!-- end js template tags -->

<?php else : ?>

    <!-- start mincss template tags -->
    <link rel="stylesheet" type="text/css" href="dist/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="dist/neptune.min.css?rel=0153c019c3"/>
    <!-- end mincss template tags -->

    <!-- start minjs template tags -->
    <script type="text/javascript" src="dist/bootstrap.min.js"></script>
    <script type="text/javascript" src="dist/neptune.min.js?rel=05bd9309f7"></script>
    <!-- end minjs template tags -->

<?php endif; ?>

</head>

<body>

<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Nav header</li>
                        <li><a href="#">Separated link</a></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../navbar/">Default</a></li>
                <li><a href="../navbar-static-top/">Static top</a></li>
                <li class="active"><a href="./">Fixed top <span class="sr-only">(current)</span></a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">