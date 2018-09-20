<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
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

<div class="container">
     <div class="row">
          <div class="col-lg-6 col-sm-6">
             <h1>Welcome: <?php echo $this->session->userdata('email');  ?></h1>
          </div>
          <div class="col-lg-6 col-sm-6">
               <ul class="nav nav-pills pull-right" style="margin-top:20px">
                    <li class="active"><a href="<?php echo site_url('Welcome/logout'); ?>">Logout</a></li>
               </ul>
          </div>
     </div>
     <hr/>
     <div class="row">
         <div class="col-md-6">
                  <div class="panel panel-primary">
                            <div class="panel-heading">
                              User Details
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                              <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                         <thead>
                                             <tr>
                                                 <th>First Name</th>
                                                 <th>Last Name</th>
                                                 <th>Username</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             <?php
                                               foreach($user as $row){
                                                   ?>
                                                    <tr>
                                                        <td><?php echo $row['fname']; ?></td>
                                                       <td><?php echo $row['lname']; ?></td>
                                                       <td><?php echo $row['username']; ?></td>
                                                    </tr>
                                                   <?php
                                               }
                                             ?>
                                         </tbody>
                                    </table>
                              </div>

                            </div>
                  </div>

         </div>
     </div>
</div>

<!--load jQuery library-->
<script src="<?php echo base_url(); ?>public/jquery/jquery.min.js"></script>
<!--load bootstrap.js-->
<script src="<?php echo base_url(); ?>public/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>