<div class="col-md-8 col-md-offset-2">
    <h3><?php echo $this->lang->line('config_notifications'); ?></h3>
    <div class="row">
        <div class="col-md-12 block wide">
            <span><?php echo $this->lang->line('config_noticiation_settings'); ?></span>
        </div>
    </div>

<?php echo form_open('config/save_notifications/', array('id' => 'notification_config_form', 'class' => 'form-horizontal')); ?>
    <div id="config_wrapper">
        <fieldset id="config_info">
            <div id="required_fields_message"><?php echo $this->lang->line('common_fields_required_message'); ?></div>
            <ul id="info_error_message_box" class="error_message_box"></ul>

            <div class="form-group form-group-sm">  
                <div class="row">
                    <div class="col-sm-6">
                        <?php echo form_label($this->lang->line('config_notification_horizontal'), 'notify_horizontal_position', array('class' => 'control-label col-xs-2')); ?>
                        <?php echo form_dropdown('notify_horizontal_position', array(
                                'left' => $this->lang->line('common_left'),
                                'right' => $this->lang->line('common_right')
                            ),
                                $notification['horizontal'], array(
                                    'class' => 'form-control input-sm')); ?>
                    </div>

                    <div class="col-sm-6">
                        <?php echo form_label($this->lang->line('config_notification_vertical'), 'notify_vertical_position', array('class' => 'control-label col-xs-2')); ?>
                        <?php echo form_dropdown('notify_vertical_position', array(
                                'top' => $this->lang->line('common_top'),
                                'center' => $this->lang->line('common_center'),
                                'bottom' => $this->lang->line('common_bottom')
                            ),
                                $notification['vertical'], array(
                                    'class' => 'form-control input-sm')); ?>
                    </div>
                </div>
            </div>

            <div class="form-group form-group-sm">  
                <?php echo form_label($this->lang->line('config_notify_timeout'), 'notify_timeout', array('class' => 'control-label col-xs-2')); ?>
                <div class="col-xs-6">
                    <div class="input-group">
                        <?php echo form_dropdown('notify_timeout', array(
                                '1000' => $this->lang->line('config_notify_1s'),
                                '2000' => $this->lang->line('config_notify_2s'),
                                '3000' => $this->lang->line('config_notify_3s'),
                                '5000' => $this->lang->line('config_notify_5s'),
                                '10000' => $this->lang->line('config_notify_10s')

                            ),
                                $this->config->item('notify_timeout'), array('class' => 'form-control input-sm')); ?>
                    </div>
                </div>
            </div>

            <div class="form-group form-group-sm">  
                <?php echo form_label($this->lang->line('config_notify_progress'), 'notify_progress', array('class' => 'control-label col-xs-2')); ?>
                <div class="col-xs-6">
                    <div class="input-group">
                        <?php echo form_dropdown('notify_progress', array(
                                'true' => $this->lang->line('common_yes'),
                                'false' => $this->lang->line('common_no')
                            ),
                                $this->config->item('notify_progress'), array('class' => 'form-control input-sm')); ?>
                    </div>
                </div>
            </div>


            <?php echo form_submit(array(
                'name' => 'submit_form',
                'type' => 'button',
                'id' => 'submit_notification',
                'value'=>$this->lang->line('common_save'),
                'class' => 'btn btn-primary btn-sm pull-right')); ?>
        </fieldset>
    </div>
<?php echo form_close(); ?>
</div>
<script type="text/javascript">

$("input#submit_notification").click( function (){
  $.ajax({
    cache: false,
    type: "POST",
    url: "<?php echo base_url() . 'config/save_notifications/'; ?>",
    dataType: 'json',
    data: $('form#notification_config_form').serialize(),
    success: function(data) {
        if(data.success===true) {
            toastr.success(data.message);
        } else if(data.success === false) {
            toastr.error(data.message);
        }
    },
    error: function() {
        toastr.error("Critical error");
        }
    });
});

</script>