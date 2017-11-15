<div class="col-md-10 col-md-offset-1">
    <h3><?php echo $this->lang->line('config_about'); ?></h3>
    <div class="row">
        <div class="col-md-12 block wide">
            <span><?php echo $this->lang->line('config_about_page'); ?></span>
        </div>
    </div>
<?php echo form_open('', array('id' => 'about', 'class' => 'form-horizontal')); ?>
    <div id="config_wrapper">
        <fieldset id="about">

            <div class="form-group form-group-sm">  
                <?php echo form_label($this->lang->line('config_application_version'), 'application_version', array('class' => 'control-label col-xs-3')); ?>
                <div class="col-xs-6">
                    <div class="input-group">
                        <?php echo form_textarea(array(
                            'name' => 'application_version',
                            'id' => 'application_version',
                            'class' => 'form-control',
                            'readonly' => '',
                            'value' => "v" . $this->config->item('application_version'))); ?>
                    </div>
                </div>
            </div>

            <div class="form-group form-group-sm">  
                <?php echo form_label($this->lang->line('config_application_hash'), 'config_hash', array('class' => 'control-label col-xs-3')); ?>
                <div class="col-xs-6">
                    <div class="input-group">
                        <?php echo form_textarea(array(
                            'name' => 'config_hash',
                            'id' => 'config_hash',
                            'class' => 'form-control',
                            'readonly' => '',
                            'value' => "v" . $this->config->item('hash'))); ?>
                    </div>
                </div>
            </div>
            
            <div class="form-group form-group-sm">  
                <?php echo form_label($this->lang->line('config_config_version'), 'config_version', array('class' => 'control-label col-xs-3')); ?>
                <div class="col-xs-6">
                    <div class="input-group">
                        <?php echo form_textarea(array(
                            'name' => 'config_version',
                            'id' => 'config_version',
                            'class' => 'form-control',
                            'readonly' => '',
                            'value' => "v" . $this->config->item('config_version'))); ?>
                    </div>
                </div>
            </div>

            <div class="form-group form-group-sm">  
                <?php echo form_label($this->lang->line('config_pos_version'), 'pos_version', array('class' => 'control-label col-xs-3')); ?>
                <div class="col-xs-6">
                    <div class="input-group">
                        <?php echo form_textarea(array(
                            'name' => 'pos_version',
                            'id' => 'pos_version',
                            'class' => 'form-control',
                            'readonly' => '',
                            'value' => "v" . $this->config->item('pos_version'))); ?>
                    </div>
                </div>
            </div>

            <div class="form-group form-group-sm">  
                <?php echo form_label($this->lang->line('config_repair_version'), 'repair_version', array('class' => 'control-label col-xs-3')); ?>
                <div class="col-xs-6">
                    <div class="input-group">
                        <?php echo form_textarea(array(
                            'name' => 'repair_version',
                            'id' => 'repair_version',
                            'class' => 'form-control',
                            'readonly' => '',
                            'value' => "v" . $this->config->item('repair_version'))); ?>
                    </div>
                </div>
            </div>

        </fieldset>
    </div>
<?php echo form_close(); ?>
</div>