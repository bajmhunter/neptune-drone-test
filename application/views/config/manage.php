<?php $this->load->view("_partial/header"); ?>

<ul class="nav nav-tabs">
    <li class="active">
        <a data-toggle="tab" href="#info_tab"><?php echo $this->lang->line('config_info'); ?></a>
    </li>
    <li>
        <a data-toggle="tab" href="#backup_tab"><?php echo $this->lang->line('config_backup'); ?></a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane fade in active" id="info_tab">
        <?php $this->load->view("config/info"); ?>
    </div>
    <div class="tab-pane" id="backup_tab">
        <?php $this->load->view("config/backup"); ?>
    </div>

</div>

<?php $this->load->view("_partial/footer"); ?>
