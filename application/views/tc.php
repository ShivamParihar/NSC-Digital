
<html>
<head>
    <style>
        body{
            margin:20px;
            text-align: center;
            font-family: ;
        }
        *{
            box-sizing:border-box;
        }
        div{
            text-align: center;
            padding:50px;
            border : 1px solid black;
            line-height:25px;
            font-family:verdana;
        }
        .left{
            text-align: left;
        }
        .right{
            text-align: right;
        }
        input{
            border : none;
            border-bottom:1px dotted black;
            line-height:25px;
            font-family:verdana;
            text-align:center;
        }
        .large{
            width:250px;
        }
        .small{
            width:80px;
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

    </style>
</head>
<body>
    <input type="button" class="but" onclick="printDiv('printableArea')" value="Print" />
    <a class="but" href="<?=base_url('index.php/operator'); ?>">Back</a>

<div class="content1" id="printableArea">

        <h1>Application for Transfer Certificate</h1>
        <br/>
        
        <p class="right"><?= date('Y-m-d');?></p>
        
        <p class="left">To<br/>
        The prinicipal<br/>
        <?= $this->session->userdata('school_name');?>
        </p>
        <br/>
        
        <p class="left">
            Sir,<br/>
            My <input type="text" class="small"> Named <input type="text" class="large"> is a pupil of  <input type="text" class="small"> Standard of your School.
            He/She intends to continue his/her study in the <input type="text" class="large"> School. 
            I therefore request you to issue his/her Transfer Certificate and oblige.
            <br/><br/>
            <strong>Reason</strong> :  <input type="text" class="large"> 
        </p>
        <br/>
        
        <p class="left">Yours faithfully,</p>
        <p class="left">Signature
        <br/>(Parent or Guardian)
        </p>
        
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