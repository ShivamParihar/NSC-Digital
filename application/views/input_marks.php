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
                    <li>
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
                        <a class="navbar-brand" href="">Notifications</a>
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
                                <h5 class="title">Create Marksheet</h5>
                            </div>
                            <div class="card-body">
                                <?php echo form_open('Operator/setSession',['class'=>'bs-component','id'=>'sessionForm']); ?>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input name="name" type="text" disabled="" class="form-control" value="<?= $this->session->userdata('name1') ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Enrollment no.</label>
                                            <input name="enroll_no" type="text" disabled="" class="form-control" value="<?= $this->session->userdata('enroll_no1') ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Class</label>
                                            <input name="class1" type="text" disabled="" class="form-control" value="<?= $this->session->userdata('class11') ?>  <?= $this->session->userdata('section1') ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Session</label>
                                            <select class="form-control" name="session1" onchange="document.getElementById('sessionForm').submit();">
                                                <option value="<?= $this->session->userdata('session1'); ?>"><?= $this->session->userdata('session1'); ?>-<?= $this->session->userdata('session1')+1; ?></option>
                                                <option value="2016">2016-2017</option>    
                                                <option value="2017">2017-2018</option>
                                                <option value="2018">2018-2019</option>
                                                <option value="2019">2019-2020</option>        
                                                <option value="2020">2020-2021</option>        
                                                <option value="2021">2021-2022</option>
                                                <option value="2022">2022-2023</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                </form>
                                <?php echo form_open('Operator/setMarks',['class'=>'bs-component']); ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <?php if( $error = $this->session->flashdata('register_success')); ?>
                                                <label style="color:green;"><?= $error ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Subject*</label>
                                                <select class="form-control" name="subject">
                                                <option value="English">English</option>    
                                                <option value="Hindi">Hindi</option>
                                                <option value="Maths">Maths</option>
                                                <option value="Science">Science</option>        
                                                <option value="Social Science">Social Science</option>        
                                                <option value="History">History</option>
                                                <option value="Polital Science">Polital Science</option>
                                                <option value="Economics">Economics</option>
                                                <option value="Physics">Physics</option>
                                                <option value="Chemistry">Chemistry</option>
                                                <option value="Biology">Biology</option>
                                                </select> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Student Marks*</label>
                                                <?php echo form_input(['name'=>'marks','class'=>'form-control']); ?>
                                                <div style="color:red;"><small><?php echo form_error('marks'); ?></small></div> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Total Marks*</label>
                                                <?php echo form_input(['name'=>'total_marks','class'=>'form-control']); ?>
                                                <div style="color:red;"><small><?php echo form_error('total_marks'); ?></small></div> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary" value="Add">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <a class="btn btn-primary" href="<?=base_url('/index.php/Operator/getMarksheet'); ?>" >Marksheet</a>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                            <div class="table-responsive">
                                    <table class="table table-striped small">
                                        <thead class="text-primary font-weight-bold">
                                <?php
                                function getSR6(){
                                    static $sr=0;
                                    $sr++;
                                    return $sr;
                                }
                                if( count($dblist)>0){
                                echo'<tr>                                    
                                    <th>Sr no.</th>
                                    <th>Subject</th>
                                    <th>Marks</th>
                                    <th>Total Marks</th>
                                    <th>Remove</th>
                                </tr>';
                                }
                                ?>
                            </thead>
                            <tbody>
                                <?php if( count($dblist)>0): ?>
                                    <?php foreach( $dblist as $row ): ?>
                                <tr>
                                    <td><?=  getSR6(); ?></td>
                                    <td><?= $row->subject ?></td>
                                    <td><?= $row->marks ?></td>
                                    <td><?= $row->total_marks ?></td>
                                    <td>
                                        <?php
                                        $marks = base_url('index.php/Operator/deleteMarks/').$row->student_id."/".$row->subject;
                                        echo '<a href="'.$marks.'" class="btn pt-2 pb-2 pl-3 pr-3" style="background-color:red;color:white;"><i class="fa fa-trash"></i></a>';
                                        
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
        <script>
		/*function addRow(tableID) {
			var table = document.getElementById(tableID);

            
			var rowCount = table.rows.length;
			var x=document.querySelectorAll(" .row");
			
			var row = table.insertRow(rowCount);
            var cell1 = row.insertCell(0);
             var div = document.createElement('div');

    div.className = 'row';
            div.innerHTML =
        '<div class="col-md-4">\
                                            <div class="form-group">\
                                                <label>Subject*</label>\
                                                <input type="text" name="" class="form-control">\
                                                <div style="color:red;"><small></small></div> \
                                            </div>\
                                        </div>\
                                        <div class="col-md-4">\
                                            <div class="form-group">\
                                                <label>Student Marks*</label>\
                                                <input type="text" name="" class="form-control">\
                                                <div style="color:red;"><small></small></div> \
                                            </div>\
                                        </div>\
                                        <div class="col-md-4">\
                                            <div class="form-group">\
                                                <label>Total Marks*</label>\
                                                <input type="text" name="" class="form-control">\
                                                <div style="color:red;"><small></small></div> \
                                            </div>\
                                        </div>';
            cell1.append(div);
            */
			/*var cell1 = row.insertCell(0);
			var element1 = document.createElement("input");
			element1.type = "text";
			element1.class= "form-control";
			element1.name="as";
			cell1.appendChild(element1);

			var cell2 = row.insertCell(1);
			cell2.innerHTML = rowCount + 1;

			var cell3 = row.insertCell(2);
			var element2 = document.createElement("input");
			element2.type = "text";
			element2.name = "txtbox[]";
			cell3.appendChild(element2);*/


		}
	</script>
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


