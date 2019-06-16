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
                        <a href="<?= base_url('index.php/Accountant') ?>">
                            <i class="now-ui-icons users_single-02"></i>
                            <p>User Profile</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="<?= base_url('index.php/Accountant/list1') ?>">
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
                        <a class="navbar-brand" href="">List</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <p class="navbar-brand">Accountant</a>
                            </li>    
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('index.php/Accountant') ?>">
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
                                <h5 class="title">List</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <?php if( $error = $this->session->flashdata('update_query')); ?>
                                                <label style="color:red;"><?= $error ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <?php echo form_open('Sendlist/getListClass'); ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="sel1">Select Class :</label>
                                                <select class="form-control" name="class1">
                                                <option value="">All</option>    
                                                <option value="1">1st</option>
                                                <option value="2">2nd</option>
                                                <option value="3">3rd</option>        
                                                <option value="4">4th</option>        
                                                <option value="5">5th</option>        
                                                <option value="6">6th</option>        
                                                <option value="7">7th</option>        
                                                <option value="8">8th</option>        
                                                <option value="9">9th</option>        
                                                <option value="10">10th</option>        
                                                <option value="11">11th</option>        
                                                <option value="12">12th</option>        
                                                </select>      
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="sel1">Select Section :</label>
                                                <select class="form-control" name="section">
                                                <option value="">All</option>    
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>        
                                                <option value="D">D</option>        
                                                <option value="E">E</option>        
                                                </select>      
                                            </div>
                                        </div>
                                    </div>    
                                    <div class="row">
                                        <div class="col-md-2 pr-1">
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary" value="Go">
                                            </div>
                                        </div>
                                    </div>                              
                                </form>
                                <div class="table-responsive">
                                    <table class="table table-striped small">
                                        <thead class="text-primary font-weight-bold">
                                <?php
                                function getSR7(){
                                    static $sr=0;
                                    $sr++;
                                    return $sr;
                                }
                                
                                ?>
                                <tr>                                    
                                    <th>Sr no.</th>
                                    <th>Enroll no.</th>
                                    <th>Name</th>
                                    <th>Class</th>
                                    <th>Fee</th>
                                    <th>Paid</th>
                                    <th>Due</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if( count($dblist) ): ?>
                                    <?php foreach( $dblist as $row ): ?>
                                <tr>
                                    <td><?=  getSR7(); ?></td>
                                    <td><?= $row->enroll_no ?></td>
                                    <td><?= $row->name ?></td>
                                    <td><?= $row->class1 ?>  <?= $row->section ?></td>
                                    <td><?= $row->fee_salary ?></td>
                                    <td><?= $row->paid_fee ?></td>
                                    <td><?= $row->fee_salary-$row->paid_fee ?></td>
                                    <td>
                                        <?php
                                        $modify = base_url('index.php/Editupdate/ModifyFromList/').$row->unique_id;
                                        
                                        echo '<a href="'.$modify.'" class="btn pt-2 pb-2 pl-3 pr-3" style="background-color:green;color:white;"><i class="fa fa-edit"></i></a>';
                                        
                                        ?>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                                
                            </tbody>
                                    </table>
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


