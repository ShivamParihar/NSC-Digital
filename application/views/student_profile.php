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
                        <a href="<?= base_url('index.php/Superadmin') ?>">
                            <i class="now-ui-icons users_single-02"></i>
                            <p>User Profile</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('index.php/Student/viewMarksheet') ?>">
                            <i class="now-ui-icons ui-1_simple-add"></i>
                            <p>Marksheet</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('index.php/Student/viewAdmitcard') ?>">
                            <i class="now-ui-icons ui-1_simple-add"></i>
                            <p>Admit Card</p>
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
                                <p class="navbar-brand">Student</a>
                            </li>    
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('index.php/Superadmin') ?>">
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
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title">Student Profile</h5>
                            </div>
                            <div class="card-body">
                                <?php echo form_open('Editupdate/updateFromProfile',['class'=>'bs-component']); ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input name="name" type="text" disabled="" class="form-control" value="<?= $this->session->userdata('name') ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>School Name</label>
                                                <input name="school_name" type="text" disabled="" class="form-control" value="<?= $this->session->userdata('school_name') ?>">
                                            </div>
                                        </div>                                                                    
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Enrollment no.</label>
                                                <input name="enroll_no" type="text" disabled="" class="form-control" value="<?= $this->session->userdata('enroll_no') ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Contact Number</label>
                                                <input name="contact_number" type="text" disabled="" class="form-control" value="<?= $this->session->userdata('contact_number') ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Date Of Birth</label>
                                                <input name="enroll_no" type="text" disabled="" class="form-control" value="<?= $this->session->userdata('dob') ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Aadhar Number</label>
                                                <input name="contact_number" type="text" disabled="" class="form-control" value="<?= $this->session->userdata('aadhar_no') ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <input name="contact_number" type="text" disabled="" class="form-control" value="<?= $this->session->userdata('gender') ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Father's Name</label>
                                                <input  name="father_name" type="text" disabled="" class="form-control" value="<?= $this->session->userdata('father_name') ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Father's Mobile Number</label>
                                                <input  name="father_name" type="text" disabled="" class="form-control" value="<?= $this->session->userdata('father_mob_no') ?>">
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Father's Occupation</label>
                                                <input  name="father_name" type="text" disabled="" class="form-control" value="<?= $this->session->userdata('father_occupation') ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Mother's Name</label>
                                                <input  name="father_name" type="text" disabled="" class="form-control" value="<?= $this->session->userdata('mother_name') ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Mother's Occupation</label>
                                                <input  name="father_name" type="text" disabled="" class="form-control" value="<?= $this->session->userdata('mother_occupation') ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Admission Date</label>
                                                <input name="class1" type="text" disabled="" class="form-control" value="<?= $this->session->userdata('admission_date') ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Class</label>
                                                <input name="class1" type="text" disabled="" class="form-control" value="<?= $this->session->userdata('class1') ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Section</label>
                                                <input name="class1" type="text" disabled="" class="form-control" value="<?= $this->session->userdata('section') ?>">
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email Address</label>
                                                <input name="email" type="text" disabled="" class="form-control" value="<?= $this->session->userdata('email') ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input name="password" type="text" disabled="" class="form-control" value="<?= $this->session->userdata('password') ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input name="address" type="text" disabled="" class="form-control" value="<?= $this->session->userdata('address') ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input name="city" type="text" disabled="" class="form-control" value="<?= $this->session->userdata('city') ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>State</label>
                                                <input name="state" type="text" disabled="" class="form-control" value="<?= $this->session->userdata('state') ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Pincode*</label>
                                                <input name="pincode" type="text" disabled="" class="form-control" value="<?= $this->session->userdata('pincode') ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Fee</label>
                                                <input name="state" type="text" disabled="" class="form-control" value="<?= $this->session->userdata('fee_salary') ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Paid Fee</label>
                                                <input name="state" type="text" disabled="" class="form-control" value="<?= $this->session->userdata('paid_fee') ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Due Fee</label>
                                                <input name="state" type="text" disabled="" class="form-control" value="<?= $this->session->userdata('fee_salary')-$this->session->userdata('paid_fee') ?>">
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
      <?php
    //success message after delete and update profile
 if( $error = $this->session->flashdata('update_query')){
     
     echo '<script>
            function loadAlert() {
                alert("' . $error . '");
            }
            loadAlert();
          </script>';
 }
?>
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


