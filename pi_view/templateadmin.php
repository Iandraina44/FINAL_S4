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
      <link rel="stylesheet" href=<?php echo base_url("assets/css/jquery.mCustomScrollbar.min.css")?>">
      <!-- awesome fontfamily -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- Tweaks for older IEs-->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout">
    
   
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
                    <a href="#why_choose_us">why Choose Us</a>
                </li>
                <li>
                    <a href="#testimonial">Testimonial</a>
                </li>
                <li>
                    <a href="#contact">Contact</a>
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
     
     
     <!-- CONTAINT -->
  <!-- section -->
 

 
 <!-- END CONTAINT -->
      <!-- footer -->
      <footer>
         <div class="container">
           <div class="row">
              <div class="col-md-6">
                <div class="full">
                  <h3>GULF</h3>
                </div>
              </div>
              <div class="col-md-6">
                <div class="full">
                   <ul class="social_links">
                      <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                   </ul>
                </div>
              </div>
              <div class="col-md-4">
                 <div class="full">
             
                    <h4 class="widget_heading">  ETU002629 Mamy Ny Aina  </h4>
                 </div>
                
              </div>
              <div class="col-md-4">
                 <div class="full">
                   <h4 class="widget_heading">ETU002453 Iandraina </h4>
                 </div>
                
              </div>
              <div class="col-md-4">
                 <div class="full">
                   <h4 class="widget_heading"> ETU002557 Miantsa</h4>
                  
                 </div>
              </div>
           </div>
         </div>
      </footer>
      <!-- end footer -->

  

   </div>
</div>

   <div class="overlay"></div>
      
      <!-- Javascript files-->
      <script src="<?php echo base_url("assets/js/jquery.min.js")?>"></script>
      <script src="<?php echo base_url("assets/js/popper.min.js")?>"></script>
      <script src="<?php echo base_url("assets/js/bootstrap.bundle.min.js")?>"></script>
      <!-- Scrollbar Js Files -->
      <script src="<?php echo base_url("assets/js/jquery.mCustomScrollbar.concat.min.js")?>"></script>
      <script src="<?php echo base_url("assets/js/custom.js")?>"></script>
      <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
      </script>
    
     
   </body>
</html>