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
    <a class="but" href="<?=base_url('index.php/Operator/inputMarks/'.$this->session->userdata('unique_id1')); ?>">Back</a>

<div id="printableArea">
<div class="content1" >    
    <?php 
    $profile_img_path = $this->session->userdata('profile_img_path1');
    $img_path = base_url('uploads/'.$profile_img_path);
    
    $school_img_path = $this->session->userdata('profile_img_path3');
    $school_img_path = base_url('uploads/'.$school_img_path);
    
    ?>
<p class="upper">
   <center>  
<img src="<?=$school_img_path ?>" alt="logo" style="width:120px;height:120px">
    
   <h1><b><?= $this->session->userdata('school_name') ?> </b></h1>
		<p class="capatalize">Address : <?= $this->session->userdata('address2') ?>, <?= $this->session->userdata('city2') ?>, <?= $this->session->userdata('state2') ?><br/>
		 Phone : <?= $this->session->userdata('contact_number2') ?><br/>
		Email : <?= $this->session->userdata('email2') ?></p>
   </center>
</p>
<hr/>
<center>
    <h2>Report Card</h2>
    <h4><?= $this->session->userdata('session1')?> - <?= $this->session->userdata('session1')+1 ?></h4><br/>
</center>
<p>
<img class="ri" src="<?= $img_path ?>" alt="go" width="95" height="95">

Name: <?=$this->session->userdata('name1'); ?><br>
Class: <?=$this->session->userdata('class11'); ?> <?=$this->session->userdata('section1'); ?><br>
Enrollment no.: <?=$this->session->userdata('enroll_no1'); ?><br>
Father's Name: <?=$this->session->userdata('father_name1'); ?><br>
Mobile no.: <?=$this->session->userdata('contact_number1'); ?><br>
Address: <?=$this->session->userdata('address1'); ?>
</p>
<p align="left">
</p>

<table style="width:100%">
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
    <th>Marks obtained</th>
    <th>Total Marks</th>
</tr>';
}
?>
<?php if( count($dblist)>0): ?>
    <?php foreach( $dblist as $row ): ?>
<tr>
    <td><?=  getSR6(); ?></td>
    <td><?= $row->subject ?></td>
    <td><?= $row->marks ?></td>
    <td><?= $row->total_marks ?></td>
</tr>
    <?php endforeach; ?>
<?php endif; ?>
 </table>

<p>Result : PASS </p>
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