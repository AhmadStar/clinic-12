<?php
  include 'view_config.php';
?>
<!DOCTYPE html>
<html lang="ar" xml:lang="ar">
  <head>
    <title><?php echo @$title ?></title>
    <link rel="icon" href="<?php echo base_url() ?>content/img/head.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href='<?php echo base_url() ?>content/css/bootstrap.min.css' media="screen,print"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"  rel="stylesheet">
    <link rel="stylesheet" href='<?php echo base_url() ?>content/css/ui/jquery-ui.min.css' media="screen"/>
    <link rel="stylesheet" href='<?php echo base_url() ?>content/css/print.css' media="print"/>
    <link rel="stylesheet" href='<?php echo base_url() ?>content/css/wfmi-style.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href='<?php echo base_url() ?>content/css/style.css'/>
     <link rel="stylesheet" href='https://fonts.googleapis.com/earlyaccess/amiri.css'/>
     <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/earlyaccess/droidarabickufi.css">
    
    
    
    <style>
      body{font-family:tahoma;
       }
      legend{color:rgba(10,120,180,50);}
      #sidebar {margin-bottom:10px;}
      .glyphicon { margin-right:5px; }
      .panel-body { padding:0px; }
      .panel-body table tr td { padding-left: 15px }
      .panel-body .table {margin-bottom: 0px; }
      .modal-lg{width:85%;}
      .form-group{margin-bottom:0px;}
      .form-group .form-control{margin-bottom:10px;}
      .table{margin-bottom:3px;}
      .pagination{margin:1px 0px;}
    </style>
    <?php if(isset($css))echo $css ?>

    <script src="<?php echo base_url() ?>content/js/jquery-2.1.0.min.js"></script>
    <script src="<?php echo base_url() ?>content/js/jquery.cookie.js"></script>
    <!--<script src="<?php echo base_url() ?>content/js/ui/jquery-ui.min.js"></script>-->
    <script src="<?php echo base_url() ?>content/js/bootstrap.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src='<?php echo base_url() ?>content/js/html5shiv.js'></script>
      <script src='<?php echo base_url() ?>content/js/respond.min.js'></script>
    <![endif]-->

  </head>
<!--  <body  dir="rtl" lang="ar" class="AR wrapper">-->
                            
    <body  dir="rtl" lang="ar" class="AR wrapper" style="background-image: url('<?php echo base_url() ?>content/img/<?php  if($this->uri->segment(1) =='')
                            echo 'home';
                       else
                            echo $this->uri->segment(1);?>.jpg'); background-size: cover">                        
                               
    <div class="container">
      <header>
        <section>
          <?php
            if($this->bitauth->logged_in()){
              include_once 'repository/nav.php';
            }else{
              include_once 'repository/logo.php';
            }
          ?>
        </section>
        <div id="fixedNavPadding" style="margin-bottom:72px" class="hidden"></div>
      </header>
      <div class="content">
<?php /*
   content will be here by php 
   footer comes after content in footer.php file 
   css will be in head tag and scripts should be in footer script area 
*/ ?>