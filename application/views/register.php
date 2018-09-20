<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
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
    <div class="row">
        <div class="col-lg-4 col-sm-4 well">
        <?php
        $attributes = array("class" => "form-horizontal", "id" => "loginform", "name" => "loginform");
        echo form_open("Welcome/login", $attributes);?>
        <fieldset>
            <legend>Login</legend>
            <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="txt_username" class="control-label">Username</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                <input class="form-control" id="txt_username" name="txt_username" placeholder="Username" type="text" value="<?php echo set_value('txt_username'); ?>" />
                <span class="text-danger"><?php echo form_error('txt_username'); ?></span>
            </div>
            </div>
            </div>

            <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
            <label for="txt_password" class="control-label">Password</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                <input class="form-control" id="txt_password" name="txt_password" placeholder="Password" type="password" value="<?php echo set_value('txt_password'); ?>" />
                <span class="text-danger"><?php echo form_error('txt_password'); ?></span>
            </div>
            </div>
            </div>

            <div class="form-group">
            <div class="col-lg-12 col-sm-12 text-center">
                <input id="btn_login" name="btn_login" type="submit" class="btn btn-default" value="Login" />
                <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-default" value="Cancel" />
            </div>
            </div>
        </fieldset>
        <?php echo form_close(); ?>
        <?php echo $this->session->flashdata('msg'); ?>
        </div>

        <div class="col-md-2"></div>
        <div class="col-md-5  well">

        <?php echo $this->session->flashdata('msg1'); ?>
                <?php echo form_open('Welcome/register');  ?>
                        <fieldset>
                      <legend>Registration Form</legend>
                      <div class="form-group">
                          <label for="">Username: </label>
                          <input type="text" name="username" class="form-control" value="<?php echo set_value('username'); ?>" placeholder="Enter Username" />
                               <span class="text-danger"><?php echo form_error('username'); ?></span>
                      </div>

                      <div class="form-group">
                    <label for="">Password: </label>
                    <input type="password" name="password" class="form-control" placeholder="Enter Password" value="<?php echo set_value('password'); ?>" />
                 <span class="text-danger"><?php echo form_error('password'); ?></span>
                </div>
                   <div class="form-group">
                    <label for="">Confirm Password: </label>
                    <input type="password" name="passconf" class="form-control" value="<?php echo set_value('passconf'); ?>" placeholder="Confirm Password" />
                    <span class="text-danger"><?php echo form_error('passconf'); ?></span>
                   </div>
                    <div class="form-group">
                    <label for="">Email Address: </label>
                    <input type="email" name="email" value="<?php echo set_value('email'); ?>" class="form-control" placeholder="Enter Email" />
                 <span class="text-danger"><?php echo form_error('email'); ?></span>
                 </div>

                    <div class="form-group">
                    <button type="submit" class="btn btn-info">Register</button>
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
</body>
</html>