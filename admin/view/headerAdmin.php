<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>avalon</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css")?>">
      <!-- style css -->
      <link rel="stylesheet" href="<?php echo base_url("assets/css/style2.css")?>">

      <!-- Responsive-->
      <link rel="stylesheet" href="<?php echo base_url("assets/css/responsive.css")?>">
      <!-- fevicon -->
      <link rel="icon" href="" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="<?php echo base_url("assets/css/jquery.mCustomScrollbar.min.css")?>">
      <!-- awesome fontfamily -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- Tweaks for older IEs-->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

    <!-- <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/locales/fr.js'></script>
    <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/dist/tippy.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script> -->
   <script src="<?php echo base_url("assets/fullcalendar-6.1.15/dist/index.global.min.js") ?>"></script>
   <!-- <link href='<?php echo base_url("application/libraries/main.min.css' rel='stylesheet") ?>' />
   <link rel="stylesheet" href="<?php echo base_url("application/libraries/tippy.css") ?>"> -->
    <style>
        #calendar {
            max-width: 900px;
            margin: 0 auto;
        }
    </style>
      
   </head>
   <!-- body -->
   <body class="main-layout">
   <!-- <script src="<?php echo base_url("application/libraries/jquery-3.6.0.min.js") ?>"></script>
    <script src='<?php echo base_url("application/libraries/main.min.js") ?>'></script>
    <script src='<?php echo base_url("application/libraries/locales/fr.js") ?>'></script>
    <script src="<?php echo base_url("application/libraries/popper-core.js") ?>"></script>
    <script src="<?php echo base_url("application/libraries/tippy.js") ?>"></script>
     -->
   
   <div class="wrapper">

      <div class="sidebar">
         <!-- Sidebar  -->
        <nav id="sidebar">

            <div id="dismiss">
                <i class="fa fa-arrow-left"></i>
            </div>

            <ul class="list-unstyled components">
                
                <li class="active">
                    <a href="#home">Home</a>
                </li>
                <li>
                    <a href="#about">Nos services</a>
                </li>
                <li>
                    <a href="#why_choose_us">Liste des devis</a>
                </li>
                <li>
                    <a href="#testimonial">Insertion Calendrier</a>
                </li>
              
            </ul>

        </nav>
      </div>



      <!-- section -->
      <section id="home" class="top_section">
         <div class="row">
            <div class="col-lg-12">
               <!-- header -->
      <header>
         <!-- header inner -->
         <div class="container">
            <div class="row">
               <div class="col-lg-3 logo_section">
                  <div class="full">
                     <div class="center-desk">
                        <div class="logo"> <a href="index.html"><img style="width:100px;margin-top:-15px" src="<?php echo base_url("assets/images/logo2.png")?>" alt="#"></a> </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-9">
                  <div class="right_header_info">
                     <ul>
                        <li><img style="margin-right: 15px;" src="<?php echo base_url("assets/images/phone_icon.png")?>" alt="#" /><a href="#">987-654-3210</a></li>
                        <li><img style="margin-right: 15px;" src="<?php echo base_url("assets/images/mail_icon.png")?>" alt="#" /><a href="#">gulfgarage@gmail.com</a></li>
                        <!-- <li><img src="images/search_icon.png" alt="#" /></li> -->
                         <li>
                           <button type="button" id="sidebarCollapse">
                              <img src="<?php echo base_url("assets/images/menu_icon.png")?>" alt="#" />
                           </button>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <!-- end header inner -->
      </header>

      
      
      <!-- end header -->
            </div>
         </div>
      </section>
      <!-- end section -->