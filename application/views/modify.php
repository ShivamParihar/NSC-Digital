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
                        <a class="navbar-brand" href="">User profile</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
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
                                <h5 class="title">Profile</h5>
                            </div>
                            <div class="card-body">
                                <?php
                                $role = $this->session->userdata('role');
                                if($role == 1)
                					$back = base_url('index.php/Superadmin/list1');
				                elseif ($role == 2)     
				                    $back = base_url('index.php/Admin/list1');
				                elseif ($role == 3) 
				                    $back = base_url('index.php/Dm/list1');		
				                elseif ($role == 4) 
				                    $back = base_url('index.php/Subdm/list1');		
				                elseif ($role == 5) 
				                    $back = base_url('index.php/School/list1');			
				                elseif ($role == 6) 
				                    $back = base_url('index.php/Operator/list1');		
				                elseif ($role == 7) 
				                    $back = base_url('index.php/Accountant/list1');			
				                
                                ?>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <a class="btn btn-primary" href="<?= $back ?>">Back</a>
                                        </div>
                                    </div>
                                </div>
                                <?php echo form_open('Editupdate/updateProfile',['class'=>'bs-component']); ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <?php if( $error = $this->session->flashdata('update_query')); ?>
                                                <label style="color:green;"><?= $error ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                    
                                        <?php
                                    //if user is school
                                        if($this->session->userdata('role1') == 5){
                                            $name1 = $this->session->userdata('name1');
                                            echo '<div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Prinicipal Name*</label>
                                                        <input name="name1" type="text" class="form-control" value="'.$name1.'">
                                                    </div>
                                                  </div>';
                                        }
                                        else{
                                            $name1 = $this->session->userdata('name1');
                                            echo '<div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Name*</label>
                                                        <input name="name1" type="text" class="form-control" value="'.$name1.'">
                                                    </div>
                                                  </div>';
                                        }
                                    ?>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Contact Number*</label>
                                                <input name="contact_number1" type="text" class="form-control" value="<?= $this->session->userdata('contact_number1') ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    //if user is school, operator ,accountant or student
                                        if($this->session->userdata('role1') == 5 || $this->session->userdata('role1') == 6 || $this->session->userdata('role1') == 7 ||$this->session->userdata('role1') == 8){
                                            $school_name1 = $this->session->userdata('school_name1');
                                            echo '<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>School Name*</label>
                                                        <input name="school_name1" type="text" class="form-control" value="'.$school_name1.'">
                                                    </div>
                                                </div>
                                            </div>';
                                        }
                                    ?>
                                    <?php
                                    //if user is operator or accountant or student
                                        if($this->session->userdata('role1') != 5){
                                            $dob1 = $this->session->userdata('dob1');
                                            $aadhar_no1 = $this->session->userdata('aadhar_no1');
                                            $gender1 = $this->session->userdata('gender1');
                                            $father_name1 = $this->session->userdata('father_name1');
                                            $mother_name1 = $this->session->userdata('mother_name1');
                                            
                                    
                                    echo '<div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Date Of Birth*</label>
                                                    <input name="dob1" type="date" class="form-control" value="'.$dob1.'">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Aadhar Number*</label>
                                                    <input name="aadhar_no1" type="text" class="form-control" value="'.$aadhar_no1.'">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Gender*</label>
                                                    <select class="form-control" name="gender1">
                                                    <option value="">'.$gender1.'</option>    
                                                    <option value="Male">Male</option>    
                                                    <option value="Female">Female</option>
                                                    <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Father\'s Name*</label>
                                                    <input  name="father_name1" type="text" class="form-control" value="'.$father_name1.'">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Mother\'s Name*</label>
                                                    <input  name="mother_name1" type="text" class="form-control" value="'.$mother_name1.'">
                                                </div>
                                            </div>
                                        </div>';
                                        }
                                    ?>
                                    <?php
                                    //if user is student
                                        if($this->session->userdata('role1') == 8){
                                            $admission_date1 = $this->session->userdata('admission_date1');
                                    
                                        echo '<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Admission Date*</label>
                                                        <input name="admission_date1" type="text" class="form-control" value="'.$admission_date1.'">
                                                    </div>
                                                </div>
                                            </div>';
                                        }
                                    ?>
                                    <?php
                                    //if user is student
                                        if($this->session->userdata('role1') == 6 || $this->session->userdata('role1') == 7){
                                            $admission_date1 = $this->session->userdata('admission_date1');
                                    
                                        echo '<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Joining Date</label>
                                                        <input name="admission_date1" type="text" class="form-control" value="'.$admission_date1.'">
                                                    </div>
                                                </div>
                                            </div>';
                                        }
                                    ?>
                                    <?php
                                    //if user is student
                                        if($this->session->userdata('role1') == 8){
                                            $father_mob_no1 = $this->session->userdata('father_mob_no1');
                                            $father_occupation1 = $this->session->userdata('father_occupation1');
                                            $mother_occupation1 = $this->session->userdata('mother_occupation1');
                                            $enroll_no1 = $this->session->userdata('enroll_no1');
                                            $class11 = $this->session->userdata('class11');
                                            $section1 = $this->session->userdata('section1');
                                    
                                    echo'<div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Father\'s Mobile Number</label>
                                                    <input  name="father_mob_no1" type="text" class="form-control" value="'.$father_mob_no1.'">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Father\'s Occupation</label>
                                                    <input  name="father_occupation1" type="text" class="form-control" value="'.$father_occupation1.'">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Mother\'s Occupation</label>
                                                    <input  name="mother_occupation1" type="text" class="form-control" value="'.$mother_occupation1.'">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Enrollment no.*</label>
                                                    <input name="enroll_no1" type="text" class="form-control" value="'.$enroll_no1.'">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Class*</label>
                                                    <input name="class11" type="text" class="form-control" value="'.$class11.'">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Section</label>
                                                    <input name="section1" type="text" class="form-control" value="'.$section1.'">
                                                </div>
                                            </div>
                                        </div>';
                                        }
                                    ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email Address</label>
                                                <input name="email1" type="text" class="form-control" value="<?= $this->session->userdata('email1') ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password*</label>
                                                <input name="password1" type="text" class="form-control" value="<?= $this->session->userdata('password1') ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address*</label>
                                                <input name="address1" type="text" class="form-control" value="<?= $this->session->userdata('address1') ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>City*</label>
                                                <input name="city1" type="text" class="form-control" value="<?= $this->session->userdata('city1') ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>State*</label>
                                                <input name="state1" type="text" class="form-control" value="<?= $this->session->userdata('state1') ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Pincode*</label>
                                                <input name="pincode1" type="text" class="form-control" value="<?= $this->session->userdata('pincode1') ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    //if user is student
                                        if($this->session->userdata('role1') == 8){
                                            $fee_salary1 = $this->session->userdata('fee_salary1');
                                            $paid_fee1 = $this->session->userdata('paid_fee1');
                                            $due_fee1 = $fee_salary1-$paid_fee1;
                                    
                                    echo '<div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Fee ( Yearly )</label>
                                                    <input name="fee_salary1" type="text" class="form-control" value="'.$fee_salary1.'">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Paid Fee</label>
                                                    <input name="paid_fee1" type="text" class="form-control" value="'.$paid_fee1.'">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Due Fee</label>
                                                    <input name="state" type="text" disabled="" class="form-control" value="'.$due_fee1.'">
                                                </div>
                                            </div>
                                        </div>';
                                        }
                                    ?>
                                    <?php
                                    /*
                                        if($this->session->userdata('role') == 1 && $this->session->userdata('role1') == 2){
                                    
                                        $delete_link = base_url('index.php/Editupdate/deleteFromList/').$this->session->userdata('unique_id1');
                                    
                                        echo '<div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <input type="submit" class="btn btn-primary" value="Update">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <a class="btn btn-primary" href="'.$delete_link.'">Delete Profile</a>
                                                    </div>
                                                </div>
                                            </div>';
                                            
                                        }*/
                                        
                                        //if($this->session->userdata('role') != 1 ){
                                    
                                        $delete_link = base_url('index.php/Editupdate/deleteFromList/').$this->session->userdata('unique_id1');
                                    
                                        echo '<div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <input type="submit" class="btn btn-primary" value="Update">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <a class="btn btn-primary" href="'.$delete_link.'">Delete Profile</a>
                                                    </div>
                                                </div>
                                            </div>';
                                        //}
                                    ?>
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
                                        $profile_img_path = $this->session->userdata('profile_img_path1');
                                        if($profile_img_path == ""){
                                            $img_path = base_url('assets/img/user.png');                                        
                                        }
                                        else{
                                            $img_path = base_url('uploads/'.$profile_img_path);
                                        }
                                        ?>
                                        <img class="avatar border-gray" src="<?= $img_path ?>" alt="no image">
                                        
                                    </a>
                                    <?php
                                    if($this->session->userdata('role1') == 5)
                                        $name = $this->session->userdata('school_name1');
                                    else
                                        $name = $this->session->userdata('name1');
                                    ?>
                                    <h5 class="title"><?= $name ?></h5>
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


                                        
                                        
                                        
                                        
                                        
                                        
                                        