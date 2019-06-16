<!DOCTYPE html>
<html>
<head>
    <style>
.content1{border-style:solid;
	padding-top: 30px;
  padding-right: 10px;
  padding-bottom: 20px;
  padding-left: 10px;
	}
img.le{float:left;}

img.ri{float:right;}

    
h4.font{font-family:Courier New; text-transform:uppercase;text-align: center;}
        
h1.ali{ 
		font-family:verdana;
        text-transform:uppercase;}   
        
h3.f{font-family:verdana;
        text-transform:uppercase;text-align: center;
        } 
ul.a{list-style-type:circle;}  

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

</style>

</head>
<body>
    <input type="button" class="but" onclick="printDiv('printableArea')" value="Print" />
    <a class="but" href="<?=base_url('index.php/student'); ?>">Back</a>

<div class="content1" id="printableArea">
<p>
    <?php 
    $profile_img_path = $this->session->userdata('profile_img_path');
    $img_path = base_url('uploads/'.$profile_img_path);
    
    $school_img_path = $this->session->userdata('profile_img_path3');
    $school_img_path = base_url('uploads/'.$school_img_path);
    
    ?>
<img class="le" src="<?= $school_img_path ?>" alt="logo" width="150" height="150">
    <h1><center><?=$this->session->userdata('school_name'); ?></center></h1>
		<h4 class="font"><?=$this->session->userdata('address3'); ?> ,<?=$this->session->userdata('city3'); ?> ,<?=$this->session->userdata('state3'); ?><br>
		PHONE:<?=$this->session->userdata('contact_number3'); ?><br>
		EMAIL:<?=$this->session->userdata('email3'); ?>
        </h4>
<h3 class="f"><u>admit-card</u></h3>
<hr>
</p>
<p>
<img class="ri" src="<?= $img_path ?>" alt="go" width="95" height="95">

Name: <?=$this->session->userdata('name'); ?><br>
Class: <?=$this->session->userdata('class1'); ?> <?=$this->session->userdata('section'); ?><br>
Enrollment no.: <?=$this->session->userdata('enroll_no'); ?><br>
Father's Name: <?=$this->session->userdata('father_name'); ?><br>
Mobile no.: <?=$this->session->userdata('contact_number'); ?><br>
Address: <?=$this->session->userdata('address'); ?>
</p>
<h3>
This is to verify that <?=$this->session->userdata('name'); ?> is admitted to give examination.</h3>
</p>
<hr>
<p><b>Important Note</b><p><hr/>
<ul class="a">

<li>Students should note the dates of examination carefully from time table.</li>
<li>Occupy your seats 15 mintues before the commencement of exam. 
</li>
<li>Please check your seating arrangement carefully</li>
<li>Mobile phones and scientific devices are prohibited in the examination hall</li>
<li>Please read the instruction on the answer book carefully</li>
</ul><br><br>
<p align="right">Controller of Examinations</p>


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