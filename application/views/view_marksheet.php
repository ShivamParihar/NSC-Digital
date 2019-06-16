<!DOCTYPE html>
<html>
<head>
<style>
body{
    
            line-height:20px;
            font-family:verdana;
}
img{
	float:left;
    
}
table,th,td{ border:1px solid black;
			border-collapse:collapse;
			padding : 5px;
			border-radius:50px;
			}
			
.right{
    text-align:right;
}
.upper{
    text-transform:uppercase;
}
.capitalize{
    text-transform:capitalize;
}
.but{
    background-color: orange;
  border: none;
  border-radius:5px;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin:20px;
}
.content1{border-style:solid;
	padding-top: 30px;
  padding-right: 10px;
  padding-bottom: 20px;
  padding-left: 10px;
	}
	img.ri{float:right;}


</style>
</head>
<body>
    <input type="button" class="but" onclick="printDiv('printableArea')" value="Print" />
    <a class="but" href="<?=base_url('index.php/student'); ?>">Back</a>

<div class="content1" id="printableArea">
    <?php 
    $profile_img_path = $this->session->userdata('profile_img_path');
    $img_path = base_url('uploads/'.$profile_img_path);
    
    $school_img_path = $this->session->userdata('profile_img_path3');
    $school_img_path = base_url('uploads/'.$school_img_path);
    
    ?>
<p class="upper">
   <center>  
<img src="<?=$school_img_path ?>" alt="logo" style="width:120px;height:120px">
    
   <h1><b><?= $this->session->userdata('school_name') ?> </b></h1>
		<p class="capatalize">Address : <?= $this->session->userdata('address') ?>,<?= $this->session->userdata('city') ?>,<?= $this->session->userdata('state') ?><br/>
		 Phone : <?= $this->session->userdata('contact_number') ?><br/>
		Email : <?= $this->session->userdata('email') ?></p>
   </center>
</p>
<hr/>
<center>
    <h2>
	Report Card<br>
</h2>
</center>
<p>
<img class="ri" src="<?= $img_path ?>" alt="go" width="95" height="95">

Name: <?=$this->session->userdata('name'); ?><br>
Class: <?=$this->session->userdata('class1'); ?> <?=$this->session->userdata('section'); ?><br>
Enrollment no.: <?=$this->session->userdata('enroll_no'); ?><br>
Father's Name: <?=$this->session->userdata('father_name'); ?><br>
Mobile no.: <?=$this->session->userdata('contact_number'); ?><br>
Address: <?=$this->session->userdata('address'); ?>
</p>
<p align="left">
</p>
<table style="width:100%">
  <tr>
    <th>Subjects</th>
    <th colspan="2">Term-1</th> 
    <th colspan="2">Term-2</th>
    <th>Grade points</th>
  </tr>
  <tr>
    <td></td>
    <td>Marks obtained</td>
    <td>Total Marks</td>
     <td>Marks obtained</td>
    <td>Total Marks</td>
    <td></td>
  </tr>
  <tr>
    <td>English</td>
    <td>25</td>
    <td>30</td>
     <td>28</td>
     <td>30</td>
     <td>A</td>
  </tr>
  <tr>
     <td>Hindi</td>
    <td>25</td>
    <td>30</td>
     <td>28</td>
     <td>30</td>
     <td>A</td>
  </tr>
	<tr>
     <td>Maths</td>
    <td>25</td>
    <td>30</td>
     <td>28</td>
     <td>30</td>
     <td>A</td>
  </tr>
  <tr>
    <td>Science</td>
    <td>25</td>
    <td>30</td>
     <td>28</td>
     <td>30</td>
     <td>A</td>
  </tr>
  <tr>
    <td>Social Science</td>
    <td>25</td>
    <td>30</td>
     <td>28</td>
     <td>30</td>
     <td>A</td>
  </tr>
  
  
</table>
<p> Percentage: 92% <br>
Result : PASS </p>
<p class="right">Principal's sign</p>
<p>Teacher's sign </p>
<br/><br/>
<table width=100%>
<tr>
	<th colspan="2">Grading Scale</th>
</tr>
<tr>
	<td>A</td>
    <td>above 90%</td>
</tr>
<tr>
	<td>B</td>
    <td>above 75%</td>
</tr>
<tr>
	<td>C</td>
    <td>above 65%</td>
</tr>
<tr>
	<td>D</td>
    <td>above 50%</td>
</tr>
<tr>
	<td>E</td>
    <td>below 40%</td>
</tr>


</div>
<script>
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
    }
</script>
</body>
</html>