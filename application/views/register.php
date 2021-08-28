<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Registration</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: Arial;
  font-size: 17px;
}

#myVideo {
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%; 
  min-height: 100%;
}
.content{
    position: fixed;
  background: rgba(0, 0, 0, 0.5);
  padding: 20px;
  width: 100%;
  height: 100%;
}
</style>
</head>
<body>

<!-- <video autoplay muted loop id="myVideo">
  <source src="<?php echo base_url('')?>/pics/background.mp4" type="video/mp4">
</video> -->

<div class="content">
<div class="container">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading" style="background-color:#0198E1;">

				<?php if($this->session->tempdata('msg')) : ?>
                        <div class="alert alert-info">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <?= $this->session->tempdata('msg'); ?>
                        </div>
                        <?php endif; ?>

			    		<h3 class="panel-title" style="color: white;"><b><span class="glyphicon glyphicon-check" aria-hidden="true"></span>&nbsp;Registration</b></h3>
			 			</div>
			 			<div class="panel-body">
			    		<form role="form" action="<?php echo base_url('/index.php/RegisterController/register')?>" method="POST">
			    					<div class="form-group">
										<input type="text" name="fname" id="fname" value="<?php echo set_value('fname')?>" class="form-control input-sm" placeholder="First Name">
                                        <small style="color:red;"><?php echo form_error('fname');?></small>
									</div>
			    					<div class="form-group">
			    						<input type="text" name="lname" id="lname" value="<?php echo set_value('lname')?>" class="form-control input-sm" placeholder="Last Name">
                                        <small style="color:red;"><?php echo form_error('lname');?></small>
			    					</div>
									<div class="form-group">
			    						<input type="text" name="uname" id="uname" value="<?php echo set_value('uname')?>" class="form-control input-sm" placeholder="Username">
                                        <small style="color:red;"><?php echo form_error('uname');?></small>
			    					</div>
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="pass" id="pass" class="form-control input-sm" placeholder="Password">
                                        <small style="color:red;"><?php echo form_error('pass');?></small>
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="passcon" id="passcon" class="form-control input-sm" placeholder="Confirm Password">
                                        <small style="color:red;"><?php echo form_error('passcon');?></small>
			    					</div>
			    				</div>
			    			</div>
							<div class="form-group">
			    						<input type="text" name="address" id="address" value="<?php echo set_value('address')?>" class="form-control input-sm" placeholder="Address">
                                        <small style="color:red;"><?php echo form_error('address');?></small>
			    					</div>
							<div class="form-group">
			    				<input type="email" name="email" id="email" value="<?php echo set_value('email')?>" class="form-control input-sm" placeholder="Email Address">
                                <small style="color:red;"><?php if(form_error('email')){
									echo "The Email already Existed";
								};?></small>
			    			</div>
							
							<div class="form-group">
			    						<input type="text" name="cnum" id="cnum" value="<?php echo set_value('cnum')?>" class="form-control input-sm" placeholder="Contact Number">
                                        <small style="color:red;"><?php echo form_error('cnum');?></small>
			    					</div>
			    			
                                    <div class="modal-footer">
        <a href="<?php echo base_url('index.php/HomeController');?>"  class="btn btn-default active">Cancel</a>
        <button type="submit" class="btn btn-default active" name="registerBtn" style="background-color:#0198E1; color:white;" >Register</button>
      </div>
			    		
			    		</form>
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>
    </div>


</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</html>
