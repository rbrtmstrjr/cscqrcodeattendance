<!DOCTYPE html>
<html>

<head>
<link href="<?php echo base_url(); ?>assets/skin/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/skin/css/haha.css" rel="stylesheet">

<!-- Animation Css -->
<link href="<?php echo base_url(); ?>assets/skin/plugins/animate-css/animate.css" rel="stylesheet" />
<!-- Jquery Core Js -->
<script src="<?php echo base_url(); ?>assets/skin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap Core Js -->
<script src="<?php echo base_url(); ?>assets/skin/plugins/bootstrap/js/bootstrap.js"></script>
</head>

<body style="background-color: #eee;">
	<div class="container back">
		<div class="login-container">
            <div class="row">
            	<div class="col-md-4"></div>
                <div class="col-md-4 login-form-2">
                	<center>
                	<img src="<?php echo base_url(); ?>assets/skin/images/logo.jpg"  width="50%">
                    <h3>
                       College Student Council
                    </h3>
                        <small>MAKING ATTENDANCE FASTER IN EASY WAY.</small>
                    
                    </center>
                    <hr>
                    <form method="POST" action="<?php echo base_url(); ?>system_admin/login">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="Your Username *" required />
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Your Password *" required />
                        </div>
                        <?php if($this->session->flashdata('error')): ?>
                            <div style="background-color:#F44336;color:#fff;" class="alert alert-dismissible animated rubberBand" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <?php echo $this->session->flashdata('error').'</p>'; ?>
                                </div>    
                        <?php endif; ?>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Login" />
                        </div>
                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
        </div>
</body>
</html>