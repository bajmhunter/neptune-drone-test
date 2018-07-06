
<?php
$this->load->view('_partial/header');
?>

<div class="row">
    <?php
    $this->load->view('_partial/sidebar');
    ?>
    <div class="col-md-9">
        <h1 class="">Check-in New Computer</h1>
        <div class="col-md-10 col-md-offset-1">
            <form class="form-horizontal" role="form">
                      <div class="process">
                        <div class="process-row nav nav-tabs">
                            <div class="process-step">
                                <button type="button" class="btn btn-info btn-circle" data-toggle="tab" href="#customer"><i class="fa fa-user fa-3x"></i></button>
                                <p><small>Customer</small></p>
                            </div>
                            <div class="process-step">
                                <button type="button" class="btn btn-info btn-circle" data-toggle="tab" href="#address"><i class="fa fa-home fa-3x"></i></button>
                                <p><small>Address</small></p>
                            </div>
                            <div class="process-step">
                                <button type="button" class="btn btn-info btn-circle" data-toggle="tab" href="#device"><i class="fa fa-desktop fa-3x"></i></button>
                                <p><small>Device</small></p>
                            </div>
                            <div class="process-step">
                                <button type="button" class="btn btn-info btn-circle" data-toggle="tab" href="#issue"><i class="fa fa-list fa-3x"></i></button>
                                <p><small>Issue</small></p>
                            </div>
                            <div class="process-step">
                                <button type="button" class="btn btn-info btn-circle" data-toggle="tab" href="#confirm"><i class="fa fa-check fa-3x"></i></button>
                                <p><small>Confirm!</small></p>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content">
                        <div id="customer" class="tab-pane fade active in">
                            <h3>Customer Details</h3>
                            <div class="col-md-8 col-md-offset-2">
                                <div class="form-group ">
                                    <label class="control-label " for="firstname">First Name</label>
                                    <input class="form-control" id="firstname" name="firstname" type="text"/>
                                 </div>
                                 <div class="form-group ">
                                    <label class="control-label " for="surname">Surname</label>
                                    <input class="form-control" id="surname" name="surname" type="text"/>
                                 </div>
                                 <div class="form-group ">
                                    <label class="control-label " for="email">Email</label>
                                    <input class="form-control" id="email" name="email" type="text"/>
                                 </div>
                                 <div class="form-group ">
                                    <label class="control-label " for="mobile">Mobile Number</label>
                                    <input class="form-control" id="mobile" name="mobile" type="text"/>
                                 </div>
                                 <div class="form-group ">
                                    <label class="control-label " for="landline">Landline</label>
                                    <input class="form-control" id="landline" name="landline" type="text"/>
                                 </div>
                                 <ul class="list-unstyled list-inline pull-right">
                                    <li><button type="button" class="btn btn-info next-step">Next <i class="fa fa-chevron-right"></i></button></li>
                                </ul>
                            </div>
                        </div>

                        <div id="address" class="tab-pane fade">
                            <h3>Customer Address </h3>
                            <div class="col-md-8 col-md-offset-2">
                                <div id="addressLookup">
                                </div>

                                <div id="address" style="">
                                    <div class="form-group">
                                        <label class="control-label" for="textinput">Line 1</label>
                                        <input type="text" placeholder="Address Line 1" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="textinput">Line 2</label>
                                        <input type="text" placeholder="Address Line 2" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="textinput">City</label>
                                        <input type="text" placeholder="City" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="textinput">State</label>
                                        <input type="text" placeholder="State" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="textinput">Postcode</label>
                                        <input type="text" placeholder="Post Code" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="textinput">Country</label>
                                        <input type="text" placeholder="Country" class="form-control">
                                    </div>
                                    <ul class="list-unstyled list-inline pull-right">
                                        <li><button type="button" class="btn btn-default prev-step"><i class="fa fa-chevron-left"></i> Back</button></li>
                                        <li><button type="button" class="btn btn-info next-step">Next <i class="fa fa-chevron-right"></i></button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div id="device" class="tab-pane fade">
                            <h3>Device Details</h3>
                            <div class="col-md-8 col-md-offset-2">
                                <div class="form-group ">
                                    <label class="control-label " for="name">Type</label>
                                    <select class="select form-control" id="select" name="select">
                                        <option value="First Choice">First Choice</option>
                                        <option value="Second Choice">Second Choice</option>
                                        <option value="Third Choice">Third Choice</option>
                                    </select>
                                 </div>
                                 <div class="form-group ">
                                    <label class="control-label " for="name1">Surname</label>
                                    <input class="form-control" id="name1" name="name1" type="text"/>
                                 </div>
                                 <div class="form-group ">
                                    <label class="control-label " for="email">Email</label>
                                    <input class="form-control" id="email" name="email" type="text"/>
                                 </div>
                                 <div class="form-group ">
                                    <label class="control-label " for="mobile">Mobile Number</label>
                                    <input class="form-control" id="mobile" name="mobile" type="text"/>
                                 </div>
                                 <div class="form-group ">
                                    <label class="control-label " for="landline">Landline</label>
                                    <input class="form-control" id="landline" name="landline" type="text"/>
                                 </div>
                                 <ul class="list-unstyled list-inline pull-right">
                                    <li><button type="button" class="btn btn-default prev-step"><i class="fa fa-chevron-left"></i> Back</button></li>
                                    <li><button type="button" class="btn btn-info next-step">Next <i class="fa fa-chevron-right"></i></button></li>
                                 </ul>
                            </div>
                        </div>
   <div id="issue" class="tab-pane fade">
    <h3>Menu 3</h3>
    <p>Some content in menu 3.</p>
    <ul class="list-unstyled list-inline pull-right">
     <li><button type="button" class="btn btn-default prev-step"><i class="fa fa-chevron-left"></i> Back</button></li>
     <li><button type="button" class="btn btn-info next-step">Next <i class="fa fa-chevron-right"></i></button></li>
    </ul>
   </div>
   <div id="confirm" class="tab-pane fade">
    <h3>Menu 4</h3>
    <p>Some content in menu 4.</p>
    <ul class="list-unstyled list-inline pull-right">
     <li><button type="button" class="btn btn-default prev-step"><i class="fa fa-chevron-left"></i> Back</button></li>
     <li><button type="button" class="btn btn-info next-step">Next <i class="fa fa-chevron-right"></i></button></li>
    </ul>
   </div>
  </div>

            </form>
        </div>
    </div>
</div>


<script type="text/javascript">
$(function(){
 $('.btn-circle').on('click',function(){
   $('.btn-circle.btn-info').removeClass('btn-info').addClass('btn-default');
   $(this).addClass('btn-info').removeClass('btn-default').blur();
 });

 $('.next-step, .prev-step').on('click', function (e){
   var $activeTab = $('.tab-pane.active');

   $('.btn-circle.btn-info').removeClass('btn-info').addClass('btn-default');

   if ( $(e.target).hasClass('next-step') )
   {
      var nextTab = $activeTab.next('.tab-pane').attr('id');
      $('[href="#'+ nextTab +'"]').addClass('btn-info').removeClass('btn-default');
      $('[href="#'+ nextTab +'"]').tab('show');
   }
   else
   {
      var prevTab = $activeTab.prev('.tab-pane').attr('id');
      $('[href="#'+ prevTab +'"]').addClass('btn-info').removeClass('btn-default');
      $('[href="#'+ prevTab +'"]').tab('show');
   }
 });
});
</script>


<?php
$this->load->view('_partial/footer');
?>