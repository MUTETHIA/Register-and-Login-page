<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Form</title>
    <!--link the bootstrap css file-->
    <link href="<?php echo base_url(); ?>public/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <style type="text/css">
    .colbox {
        margin-left: 0px;
        margin-right: 0px;
    }
    .error,.required{
        color: #FF1F1F;
    }

    </style>
</head>
<body>
        <!-- Navigation Menu -->
<nav class="navbar navbar-inverse" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>
        <div class="collapse navbar-collapse" id="navbar1">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo site_url('Welcome/user_login'); ?>">Login</a></li>

            </ul>
        </div>
    </div>
</nav>
<hr/>

<div class="container">
        <div class="col-md-3"></div>
        <div class="col-md-5  well">
           <?php echo $this->session->flashdata('msg1'); ?>
             <?php $attributes = array("name" => "register", "id" =>"register","autocomplete"=>"off"); ?>
                <?php echo form_open('Welcome/register',$attributes);  ?>
                        <fieldset>
                      <legend>User Registration Form</legend>
                      <div class="form-group">
                    <label for="">First Name: </label>
                    <input type="text" name="fname" id="fname" value="<?php echo set_value('fname'); ?>" class="form-control" placeholder="Enter First Name" />
                 <span class="text-danger"><?php echo form_error('fname'); ?></span>
                 </div>
                 <div class="form-group">
                    <label for="">Last Name: </label>
                    <input type="text" name="lname" id="lname" value="<?php echo set_value('lname'); ?>" class="form-control" placeholder="Enter Second Name" />
                 <span class="text-danger"><?php echo form_error('lname'); ?></span>
                 </div>
                      <div class="form-group">
                          <label for="">Username: </label>
                          <input type="text" name="username" id="username" class="form-control" value="<?php echo set_value('username'); ?>" placeholder="Enter Username" />
                               <span class="text-danger"><?php echo form_error('username'); ?></span>
                      </div>

                      <div class="form-group">
                    <label for="">Password: </label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" value="<?php echo set_value('password'); ?>" />
                 <span class="text-danger"><?php echo form_error('password'); ?></span>
                </div>

                    <div class="form-group">
                    <button type="submit" class="btn btn-info" name="register">Register</button>
                    <div class="col-md-2"></div>
                    <a href="<?php echo site_url('Welcome/user_login'); ?>"><button type="button" class="btn btn-warning">Login</button> </a>

                   </div>

                   </div>
                        </fieldset>
                <?php echo form_close(); ?>
        </div>
    </div>


</div>

<!--load jQuery library-->
<script src="<?php echo base_url(); ?>public/jquery/jquery.min.js"></script>
<!--load bootstrap.js-->
<script src="<?php echo base_url(); ?>public/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>public/jquery/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>public/jquery/additional-methods.js"></script>
<script src="<?php echo base_url(); ?>public/jquery/form-validator.js"></script>
</body>
</html>