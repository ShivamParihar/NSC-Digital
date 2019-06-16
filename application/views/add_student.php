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
                    <li>
                        <a href="<?= base_url('index.php/Operator') ?>">
                            <i class="now-ui-icons users_single-02"></i>
                            <p>User Profile</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="<?= base_url('index.php/Operator/addStudent') ?>">
                            <i class="now-ui-icons design_app"></i>
                            <p>Add Stutent</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('index.php/Operator/list1') ?>">
                            <i class="now-ui-icons design_bullet-list-67"></i>
                            <p>Student List</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('index.php/Operator/attendencePage') ?>">
                            <i class="now-ui-icons education_agenda-bookmark"></i>
                            <p>Take Attendence</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('index.php/Operator/attendenceView') ?>">
                            <i class="now-ui-icons education_agenda-bookmark"></i>
                            <p>View Attendence</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('index.php/Operator/tc') ?>">
                            <i class="now-ui-icons design_app"></i>
                            <p>TC</p>
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
                        <a class="navbar-brand" href="">Add Student</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <p class="navbar-brand">Operator</a>
                            </li>    
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('index.php/Operator') ?>">
                                    <i class="now-ui-icons users_single-02"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Account</span>
                                    </p>
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title">Register</h5>
                            </div>
                            <div class="card-body">
                                <?php echo form_open_multipart('Operator/student_register',['class'=>'bs-component']); ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <?php if( $error = $this->session->flashdata('register_success')); ?>
                                                <label style="color:green;"><?= $error ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Name*</label>
                                                <?php echo form_input(['name'=>'name','value'=>set_value('name'),'class'=>'form-control']); ?>
                                                <div style="color:red;"><small><?php echo form_error('name'); ?></small></div> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Enrollment no.*</label>
                                                <?php echo form_input(['name'=>'enroll_no','value'=>set_value('enroll_no'),'class'=>'form-control']); ?>
                                                <div style="color:red;"><small><?php echo form_error('enroll_no'); ?></small></div> 
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Contact Number*</label>
                                                <?php echo form_input(['name'=>'contact_number','value'=>set_value('contact_number'),'class'=>'form-control']); ?>
                                                <div style="color:red;"><small><?php echo form_error('contact_number'); ?></small></div> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Date Of Birth*</label>
                                                <?php echo form_input(['name'=>'dob','type'=>'date','value'=>set_value('dob'),'class'=>'form-control']); ?>
                                                <div style="color:red;"><small><?php echo form_error('dob'); ?></small></div> 
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Aadhar Number*</label>
                                                <?php echo form_input(['name'=>'aadhar_no','value'=>set_value('aadhar_no'),'class'=>'form-control']); ?>
                                                <div style="color:red;"><small><?php echo form_error('aadhar_no'); ?></small></div> 
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Gender*</label>
                                                <select class="form-control" name="gender">
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
                                                <label>Father's Name*</label>
                                                <?php echo form_input(['name'=>'father_name','value'=>set_value('father_name'),'class'=>'form-control']); ?>
                                                <div style="color:red;"><small><?php echo form_error('father_name'); ?></small></div> 
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Father's Mobile Number</label>
                                                <?php echo form_input(['name'=>'father_mob_no','value'=>set_value('father_mob_no'),'class'=>'form-control']); ?>
                                                <div style="color:red;"><small><?php echo form_error('father_mob_no'); ?></small></div> 
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Father's Occupation</label>
                                                <?php echo form_input(['name'=>'father_occupation','value'=>set_value('father_occupation'),'class'=>'form-control']); ?>
                                                <div style="color:red;"><small><?php echo form_error('father_occupation'); ?></small></div> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Mother's Name*</label>
                                                <?php echo form_input(['name'=>'mother_name','value'=>set_value('mother_name'),'class'=>'form-control']); ?>
                                                <div style="color:red;"><small><?php echo form_error('mother_name'); ?></small></div> 
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Mother's Occupation</label>
                                                <?php echo form_input(['name'=>'mother_occupation','value'=>set_value('mother_occupation'),'class'=>'form-control']); ?>
                                                <div style="color:red;"><small><?php echo form_error('mother_occupation'); ?></small></div> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Admission Date</label>
                                                <?php echo form_input(['name'=>'admission_date','type'=>'date','value'=>set_value('admission_date'),'class'=>'form-control']); ?>
                                                <div style="color:red;"><small><?php echo form_error('admission_date'); ?></small></div> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Class*</label>
                                                <?php echo form_input(['name'=>'class1','value'=>set_value('class1'),'class'=>'form-control']); ?>
                                                <div style="color:red;"><small><?php echo form_error('class1'); ?></small></div> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Section</label>
                                                <?php echo form_input(['name'=>'section','value'=>set_value('section'),'class'=>'form-control']); ?>
                                                <div style="color:red;"><small><?php echo form_error('section'); ?></small></div> 
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email Address</label>
                                                <?php echo form_input(['name'=>'email','value'=>set_value('email'),'class'=>'form-control']); ?>
                                                <div style="color:red;"><small><?php echo form_error('email'); ?></small></div> 
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password*</label>
                                                <?php echo form_input(['name'=>'password','value'=>set_value('password'),'class'=>'form-control']); ?>
                                                <div style="color:red;"><small><?php echo form_error('password'); ?></small></div> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Address*</label>
                                                <?php echo form_input(['name'=>'address','value'=>set_value('address'),'class'=>'form-control']); ?>
                                                <div style="color:red;"><small><?php echo form_error('address'); ?></small></div> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Pin-code*</label>
                                                <?php echo form_input(['name'=>'pincode','value'=>set_value('pincode'),'class'=>'form-control']); ?>
                                                <div style="color:red;"><small><?php echo form_error('pincode'); ?></small></div> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>City*</label>
                                                <?php echo form_input(['name'=>'city','value'=>set_value('city'),'class'=>'form-control']); ?>
                                                <div style="color:red;"><small><?php echo form_error('city'); ?></small></div> 
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>State*</label>
                                                <?php echo form_input(['name'=>'state','value'=>set_value('state'),'class'=>'form-control']); ?>
                                                <div style="color:red;"><small><?php echo form_error('state'); ?></small></div> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Fee ( Yearly )</label>
                                                <?php echo form_input(['name'=>'fee_salary','value'=>set_value('fee_salary'),'class'=>'form-control']); ?>
                                                <div style="color:red;"><small><?php echo form_error('fee_salary'); ?></small></div> 
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Paid Fee</label>
                                                <?php echo form_input(['name'=>'paid_fee','value'=>set_value('paid_fee'),'class'=>'form-control']); ?>
                                                <div style="color:red;"><small><?php echo form_error('paid_fee'); ?></small></div> 
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-md-3 pr-1">
                                            <div class="form-group">
                                                <label class="btn btn-primary" style="color:#fff!important;" for="body">Upload student image</label>
                                                <?php echo form_upload(['name'=>'profile_img_path','value'=>set_value('profile_img_path')]); ?>
                                                <div style="color:red;"><small><?php echo form_error('profile_img_path'); ?></small></div>
                                                <div style="color:red;font-size:30px;z-index:1000;"><small><?php if(isset($upload_error)) { echo $upload_error; }?></small></div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 pr-1">
                                            <div class="form-group">
                                                <label class="btn btn-primary" style="color:#fff!important;" for="body">Upload student signature</label>
                                                <?php echo form_upload(['name'=>'sign_img_path','value'=>set_value('sign_img_path')]); ?>
                                                <div style="color:red;"><small><?php echo form_error('sign_img_path'); ?></small></div>
                                                <div style="color:red;font-size:30px;z-index:1000;"><small><?php if(isset($upload_error)) { echo $upload_error; }?></small></div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 pr-1">
                                            <div class="form-group">
                                                <label class="btn btn-primary" style="color:#fff!important;" for="body">Upload father's signature</label>
                                                <?php echo form_upload(['name'=>'parent_sign_img','value'=>set_value('parent_sign_img')]); ?>
                                                <div style="color:red;"><small><?php echo form_error('parent_sign_img'); ?></small></div>
                                                <div style="color:red;font-size:30px;z-index:1000;"><small><?php if(isset($upload_error)) { echo $upload_error; }?></small></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 pr-1">
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary" value="Submit">
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


