<div class="right_header_info">
      <ul>
   
         <div class="button_section">
         <a href="form_ajouter"> Ajouter </a>
       
      </div>
         
         
      </ul>
   </div>
           
  <div id="about" class="section layout_padding">
         <div class="container">
            
            <div class="row">
            
                  <div class="full slider_cont_section">
                  <div class="col-md-12">
               <div class="full center">
                 <h2 class="heading_main orange_heading" style="margin-top:-40px">Nos services</h2>
               </div>
             </div>
             </div>
            <div class="row">
            <?php foreach ($all_service as $service): ?>
             <div class="col-lg-4" style="margin-top:-40px">
    
             <div class="full">
             <div class="choose_blog text_align_center" >
                        <img src="<?php echo base_url("assets/images/serciveicone.png")?>" />
                        <h4 style="color:black"><?php echo $service['nom_service']; ?></h4>
                        <p  style="color:black">Tarif du service : <strong> <?php echo $service['tarif']; ?></strong></p>
                        <p  style="color:black">Duree : <strong> <?php echo $service['duree']; ?> </strong> </p>
                        <p><a href="<?php echo site_url('Service_c/form_modify?id=' . $service['idService'] . '&mod=u'); ?>" style="color: #f36b2a">Modifier  / </a><a href="<?php echo site_url('Service_c/delete?id=' . $service['idService'] . '&mod=d'); ?>" style="color: #f36b2a">Supprimer</a></p>
                       
                        <!-- <a href="about.html">About Us</a> -->
                    
                     </div>
                 </div>
             </div>
             <?php endforeach; ?>
             
                        
                   
                        </div>
                     <!-- </div> -->
                  <!-- </div> -->
               </div>

               </div>
              
            </div>

           

               </div>

         </div>
      </div>
      