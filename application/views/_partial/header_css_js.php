<?php if ($this->input->cookie('debug') == "true" || $this->input->get("debug") == "true") : ?>

    <!-- bower:css -->
    <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.css" />
    <link rel="stylesheet" href="/bower_components/toastr/toastr.css" />
    <link rel="stylesheet" href="/bower_components/components-font-awesome/css/font-awesome.css" />
    <!-- endbower -->

    <!-- neptune:css -->
    <link rel="stylesheet" type="text/css" href="/css/checkin.css"/>
    <link rel="stylesheet" type="text/css" href="/css/style.css"/>
    <!-- endneptune:css -->

    <!-- bower:js -->
    <script src="/bower_components/jquery/dist/jquery.js"></script>
    <script src="/bower_components/bootstrap/dist/js/bootstrap.js"></script>
    <script src="/bower_components/toastr/toastr.js"></script>
    <!-- endbower -->

    <!-- neptune:js -->
    <!-- endneptune:js -->

<?php else : ?>

    <!-- start mincss template tags -->
    <link rel="stylesheet" type="text/css" href="/dist/neptune.min.css?rel=3df71a5fc7"/>
    <!-- end mincss template tags -->

    <!-- start minjs template tags -->
    <script type="text/javascript" src="/dist/neptune.min.js?rel=19def3b090"></script>
    <!-- end minjs template tags -->

<?php endif; ?>