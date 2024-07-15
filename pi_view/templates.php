
     
     
     <!-- CONTAINT -->

    
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