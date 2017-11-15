<?php $this->load->view("_partial/header"); ?>
    <div class="row">
        <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked admin-menu">
                <li class="active"><a data-target-id="info"><i class="fa fa-home fa-fw"></i><?php echo $this->lang->line('config_info'); ?></a></li>
                <li><a data-target-id="notifications"><i class="fa fa-list-alt fa-fw"></i><?php echo $this->lang->line('config_notifications'); ?></a></li>
                <li><a data-target-id="backup"><i class="fa fa-file-o fa-fw"></i><?php echo $this->lang->line('config_backup'); ?></a></li>
                <li><a data-target-id="about"><i class="fa fa-file-o fa-fw"></i><?php echo $this->lang->line('config_about'); ?></a></li>
            </ul>
        </div>
        <div class="col-md-9 well admin-content" id="info">
            <?php $this->load->view("config/info"); ?>
        </div>
        <div class="col-md-9 well admin-content" id="notifications">
            <?php $this->load->view("config/notifications"); ?>
        </div>
        <div class="col-md-9 well admin-content" id="backup">
            <?php $this->load->view("config/backup"); ?>
        </div>
        <div class="col-md-9 well admin-content" id="about">
            <?php $this->load->view("config/about"); ?>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function()
            {
                var navItems = $('.admin-menu li > a');
                var navListItems = $('.admin-menu li');
                var allWells = $('.admin-content');
                var allWellsExceptFirst = $('.admin-content:not(:first)');
                
                allWellsExceptFirst.hide();
                navItems.click(function(e)
                {
                    e.preventDefault();
                    navListItems.removeClass('active');
                    $(this).closest('li').addClass('active');
                    
                    allWells.hide();
                    var target = $(this).attr('data-target-id');
                    $('#' + target).show();
                });
            });
    </script>
<?php $this->load->view("_partial/footer"); ?>
