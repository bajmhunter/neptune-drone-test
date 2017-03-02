<div class="container">
    <div class="row">
        <hr>
        <div class="col-lg-12">
            <p class="text-muted pull-right"><small>
                Page rendered in <strong>{elapsed_time}</strong> seconds using <strong>{memory_usage}</strong> RAM.
                CodeIgniter Version <strong> <?php echo CI_VERSION ?></strong>
                Neptune Version <strong><?php echo $this->config->item('application_version'); ?></strong>
               [<strong><?php echo $this->config->item('hash'); ?><strong>]</small>
            </p>
        </div>
    </div>
</div>