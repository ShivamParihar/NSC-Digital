<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/img/apple-icon.png') ?>">
    <link rel="icon" type="image/jpg" href="<?= base_url('assets/img/logo.jpg') ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>NSC Digital</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/css/now-ui-dashboard.css?v=1.0.1') ?>" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?= base_url('assets/demo/demo.css') ?>" rel="stylesheet" />
</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="orange">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
            <div class="logo">
                <h5  class="simple-text logo-mini"><strong>NSC Digital</strong></h5>                
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="active">
                        <a href="<?= base_url('index.php/Subdm') ?>">
                            <i class="now-ui-icons users_single-02"></i>
                            <p>User Profile</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('index.php/Subdm/addSchool') ?>">
                            <i class="now-ui-icons design_app"></i>
                            <p>Add School</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('index.php/Subdm/list1') ?>">
                            <i class="now-ui-icons design_bullet-list-67"></i>
                            <p>List</p>
                        </a>
                    </li>
                    <li class="active-pro">
                        <a href="<?= base_url('index.php/Logincontroller/logout') ?>">
                            <i class="now-ui-icons arrows-1_cloud-download-93"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute bg-primary fixed-top">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="">User Profile</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <p class="navbar-brand">Sub DM</a>
                            </li>    
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('index.php/Subdm') ?>">
                                    <i class="now-ui-icons users_single-02"></i>
                                    
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="panel-header panel-header-sm">
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title">Sub-DM Profile</h5>
                            </div>
                            <div class="card-body">
                                <?php echo form_open('Editupdate/updateFromProfile',['class'=>'bs-component']); ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <?php if( $error = $this->session->flashdata('update_query')); ?>
                                                <label style="color:green;"><?= $error ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <?php echo form_input(['name'=>'name','value'=>$this->session->userdata('name'),'class'=>'form-control']); ?>
                                                <div style="color:red;"><small><?php echo form_error('name'); ?></small></div> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Date Of Birth</label>
                                                <?php echo form_input(['name'=>'dob','type'=>'date','value'=>$this->session->userdata('dob'),'class'=>'form-control']); ?>
                                                <div style="color:red;"><small><?php echo form_error('dob'); ?></small></div> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Aadhar Number</label>
                                                <?php echo form_input(['name'=>'aadhar_no','value'=>$this->session->userdata('aadhar_no'),'class'=>'form-control']); ?>
                                                <div style="color:red;"><small><?php echo form_error('aadhar_no'); ?></small></div> 
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select class="form-control" name="gender">
                                                <option value=""><?=$this->session->userdata('gender')?></option>    
                                                <option value="Male">Male</option>    
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                                </select>
                                                <div style="color:red;"><small><?php echo form_error('gender'); ?></small></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Father's Name</label>
                                                <?php echo form_input(['name'=>'father_name','value'=>$this->session->userdata('father_name'),'class'=>'form-control']); ?>
                                                <div style="color:red;"><small><?php echo form_error('father_name'); ?></small></div> 
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Mother's Name</label>
                                                <?php echo form_input(['name'=>'mother_name','value'=>$this->session->userdata('mother_name'),'class'=>'form-control']); ?>
                                                <div style="color:red;"><small><?php echo form_error('mother_name'); ?></small></div> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Contact Number</label>
                                                <?php echo form_input(['name'=>'contact_number','value'=>$this->session->userdata('contact_number'),'class'=>'form-control']); ?>
                                                <div style="color:red;"><small><?php echo form_error('contact_number'); ?></small></div> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email Address</label>
                                                <?php echo form_input(['name'=>'email','value'=>$this->session->userdata('email'),'class'=>'form-control']); ?>
                                                <div style="color:red;"><small><?php echo form_error('email'); ?></small></div> 
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <?php echo form_input(['name'=>'password','value'=>$this->session->userdata('password'),'class'=>'form-control']); ?>
                                                <div style="color:red;"><small><?php echo form_error('password'); ?></small></div> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <?php echo form_input(['name'=>'address','value'=>$this->session->userdata('address'),'class'=>'form-control']); ?>
                                                <div style="color:red;"><small><?php echo form_error('address'); ?></small></div> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>City</label>
                                                <?php echo form_input(['name'=>'city','value'=>$this->session->userdata('city'),'class'=>'form-control']); ?>
                                                <div style="color:red;"><small><?php echo form_error('city'); ?></small></div> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>State</label>
                                                <?php echo form_input(['name'=>'state','value'=>$this->session->userdata('state'),'class'=>'form-control']); ?>
                                                <div style="color:red;"><small><?php echo form_error('state'); ?></small></div> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Pincode</label>
                                                <?php echo form_input(['name'=>'pincode','value'=>$this->session->userdata('pincode'),'class'=>'form-control']); ?>
                                                <div style="color:red;"><small><?php echo form_error('pincode'); ?></small></div> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 pr-1">
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary" value="Save changes">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="<?= base_url('assets/img/back.jpg') ?>" alt="...">
                            </div>
                            <div class="card-body">
                                <div class="author">
                                    <a href="#">
                                        <?php 
                                        $profile_img_path = $this->session->userdata('profile_img_path');
                                        if($profile_img_path == ""){
                                            $img_path = base_url('assets/img/user.png');                                        
                                        }
                                        else{
                                            $img_path = base_url('uploads/'.$profile_img_path);
                                        }
                                        ?>
                                        <img class="avatar border-gray" src="<?= $img_path ?>" alt="no image">
                                        
                                    </a>
                                    <h5 class="title"><?= $this->session->userdata('name') ?></h5>
                                </div>
                                <?php echo form_open_multipart('Editupdate/updateProfilePhoto',['class'=>'bs-component']); ?>
                                <div class="row" style="text-align:center;">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="btn btn-primary" style="color:#fff!important;" for="body">
                                                <i class="fa fa-upload"></i>
                                                Upload
                                            </label>
                                            <?php echo form_upload(['name'=>'profile_img_path','value'=>set_value('profile_img_path')]); ?>
                                            <div style="color:red;"><small><?php echo form_error('profile_img_path'); ?></small></div>
                                            <div style="color:red;font-size:30px;z-index:1000;"><small><?php if(isset($upload_error)) { echo $upload_error; }?></small></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" value="Save">
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="copyright">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>, Designed by
                        <a href="https://www.infocentroid.com/" target="_blank">InfoCentroid</a>. Coded by
                        <a href="" target="_blank">Shivam</a>.
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="<?= base_url('assets/js/core/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/js/core/popper.min.js') ?>"></script>
<script src="<?= base_url('assets/js/core/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/js/plugins/perfect-scrollbar.jquery.min.js') ?>"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chart JS -->
<script src="<?= base_url('assets/js/plugins/chartjs.min.js') ?>"></script>
<!--  Notifications Plugin    -->
<script src="<?= base_url('assets/js/plugins/bootstrap-notify.js') ?>"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?= base_url('assets/js/now-ui-dashboard.js?v=1.0.1') ?>"></script>
<!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src="<?= base_url('assets/demo/demo.js') ?>></script>

</html>


