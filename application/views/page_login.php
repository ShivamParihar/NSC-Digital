<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>sign in</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abel">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Acme'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?= link_tag('assets/css/form.css') ?>
	<style>
		body, html {
			height: 100%;
			margin: 0;
			padding:0px;
		}
		
		.bg {
			/* The image used */
			background-image: url("<?= base_url('assets/img/loginBk0.jpg') ?>");
			
			/* Full height */	
			height: 108%; 
			
			/* Center and scale the image nicely */
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
			
			position:relative;
            width:100%;    
		}
		.form{
    top:50px;
	
}

		.form1{
    top:30px;
	
}

	</style>
</head>
<body>
<div class="bg">
	<div class="form" style='background-color:#fff;'>
			<img src="<?= base_url('assets/img/logo.jpg') ?>" alt="logo" style="width:100px;height:100px;">
            <p class="webname">NSC DIGITALS</p>    
            <?php echo form_open('logincontroller/admin_login'); ?>
            <?php if( $error = $this->session->flashdata('login_failed')); ?>
            <p class="err"><?= $error ?></p>
				<small>Mobile number*</small><br/>
                <?php echo form_input(['name'=>'contact_no','value'=>set_value('contact_no')]); ?><br/>
				<small><?php echo form_error('contact_no'); ?></small><br/>
                <small>Password*</small><br/>
                <?php echo form_password(['name'=>'password']); ?><br/>
				<small><?php echo form_error('password'); ?></small><br/>
				<input class="button" type="submit" value="Login" style="margin-bottom: 20px;">
            </form>
            <a href="Resetpassword" style="text-decoration:none;color:#0080ff"><small>Forgot password?</small></a><br/><br/>
   	</div>
</div>
		
		
<srcipt src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<srcipt src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>


</body>
</html>
