<div id="about" class="section layout_padding">
         <div class="container">
            
            <div class="row">

                 <div class="col-lg-5 margin_top_10">
               <div class="full margin_top_10"">
                  <h3 class="main_heading _left_side margin_top_10"> Modifier Service</h3>
                

                  <?php echo form_open(site_url('Service_c/modify')); ?>
                  <div class="col-md-12">
                    <input type="hidden"  name="id" value="<?php echo $service['idService']; ?>" />
                    <div class="full field">
                        <input type="text" placeholder="Nom du service" name="nom" value="<?php echo $service['nom_service']; ?>"/>
                    </div>
                    </div>
                    <div class="col-md-12">
                    <div class="full field">
                        <input type="time" placeholder="" name="duree" value="<?php echo $service['duree']; ?>"/>
                    </div>
                    </div>
                    <div class="col-md-12">
                    <div class="full field">
                        <input type="number" placeholder="Tarif" name="tarif" value="<?php echo $service['tarif']; ?>"/>
                    </div>
                    </div>
                             
                    
                    <div class="col-md-12">
                
                    <div class="full center" >
                        <button class="submit_bt" type= "submit">Modifier</button>
                    </div>
                  
                    
                    </div>
        
    
                <?php echo form_close(); ?>
               </div>
              
            </div>

            <div class="col-lg-7">
               <div class="full margin_top_50_rs">
                  <img class="img-responsive" src="<?php echo base_url("assets/images/about_us.png")?>" alt="#" />
               </div>
            </div>

               </div>

         </div>
      </div>