<div class="col-md-10 col-md-offset-1">
        <h3><?php echo $this->lang->line('config_info'); ?></h3>
    <div class="row">
        <div class="col-md-12 block wide">
            <span><?php echo $this->lang->line('config_info_settings'); ?></span>
        </div>
    </div>

<?php echo form_open('config/save_info/', array('id' => 'info_config_form', 'class' => 'form-horizontal')); ?>
    <div id="config_wrapper">
        <fieldset id="config_info">
            <div id="required_fields_message"><?php echo $this->lang->line('common_fields_required_message'); ?></div>
            <ul id="info_error_message_box" class="error_message_box"></ul>

            <div class="form-group form-group-sm">  
                <?php echo form_label($this->lang->line('config_company'), 'company', array('class' => 'control-label col-xs-3 required')); ?>
                <div class="col-xs-6">
                    <div class="input-group">
                        <span class="input-group-addon input-sm"><span class="glyphicon glyphicon-home"></span></span>
                        <?php echo form_input(array(
                            'name' => 'company',
                            'id' => 'company',
                            'class' => 'form-control input-sm required',
                            'value'=>$this->config->item('company'))); ?>
                    </div>
                </div>
            </div>

            <div class="form-group form-group-sm">  
                <?php echo form_label($this->lang->line('config_address'), 'address', array('class' => 'control-label col-xs-3 required')); ?>
                <div class='col-xs-6'>
                    <?php echo form_textarea(array(
                        'name' => 'address',
                        'id' => 'address',
                        'class' => 'form-control input-sm required',
                        'value'=>$this->config->item('address'))); ?>
                </div>
            </div>

            <div class="form-group form-group-sm">  
                <?php echo form_label($this->lang->line('config_website'), 'website', array('class' => 'control-label col-xs-3')); ?>
                <div class="col-xs-6">
                    <div class="input-group">
                        <span class="input-group-addon input-sm"><span class="glyphicon glyphicon-globe"></span></span>
                        <?php echo form_input(array(
                            'name' => 'website',
                            'id' => 'website',
                            'class' => 'form-control input-sm',
                            'value'=>$this->config->item('website'))); ?>
                    </div>
                </div>
            </div>

            <div class="form-group form-group-sm">  
                <?php echo form_label($this->lang->line('common_email'), 'email', array('class' => 'control-label col-xs-3')); ?>
                <div class="col-xs-6">
                    <div class="input-group">
                        <span class="input-group-addon input-sm"><span class="glyphicon glyphicon-envelope"></span></span>
                        <?php echo form_input(array(
                            'name' => 'email',
                            'id' => 'email',
                            'type' => 'email',
                            'class' => 'form-control input-sm',
                            'value'=>$this->config->item('email'))); ?>
                    </div>
                </div>
            </div>

            <div class="form-group form-group-sm">  
                <?php echo form_label($this->lang->line('config_phone'), 'phone', array('class' => 'control-label col-xs-3 required')); ?>
                <div class="col-xs-6">
                    <div class="input-group">
                        <span class="input-group-addon input-sm"><span class="glyphicon glyphicon-phone-alt"></span></span>
                        <?php echo form_input(array(
                            'name' => 'phone',
                            'id' => 'phone',
                            'class' => 'form-control input-sm required',
                            'value'=>$this->config->item('phone'))); ?>
                    </div>
                </div>
            </div>

            <div class="form-group form-group-sm">  
                <?php echo form_label($this->lang->line('config_fax'), 'fax', array('class' => 'control-label col-xs-3')); ?>
                <div class="col-xs-6">
                    <div class="input-group">
                        <span class="input-group-addon input-sm"><span class="glyphicon glyphicon-phone-alt"></span></span>
                        <?php echo form_input(array(
                            'name' => 'fax',
                            'id' => 'fax',
                            'class' => 'form-control input-sm',
                            'value'=>$this->config->item('fax'))); ?>
                    </div>
                </div>
            </div>

            <?php echo form_submit(array(
                'name' => 'submit_form',
                'type' => 'button',
                'id' => 'submit_info',
                'value'=>$this->lang->line('common_submit'),
                'class' => 'btn btn-primary btn-sm pull-right')); ?>
        </fieldset>
    </div>
<?php echo form_close(); ?>
</div>
<script type="text/javascript">

$("input#submit_info").click( function (){
  $.ajax({
    cache: false,
    type: "POST",
    url: "<?php echo base_url() . 'config/save_info/'; ?>",
    dataType: 'json',
    data: $('form#info_config_form').serialize(),
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