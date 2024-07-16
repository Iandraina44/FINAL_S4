 <!-- section -->
 <div id="about" class="section layout_padding">
         <div class="container">
            
            <div class="row">

                 <div class="col-lg-5 margin_top_10">
               <div class="full margin_top_10">
                  <h3 class="main_heading _left_side margin_top_10">Insertion Calendrier</h3>
                

                  <?php echo form_open('InsertionCalendrier_c/insert'); ?>
                    <div class="col-md-12">
                    <input type="hidden" id="date" name="date" value="<?php echo $date; ?>">
                    <div class="full field">
                        <input type="time" placeholder="Date" name="heure_debut" />
                    </div>
                    </div>
                    <div class="col-md-12">
                                <div class="full field">
                                    <select name="client"  style="width: 100%;border: none;background: #e8e8e8;min-height: 52px;padding: 0 20px;font-size: 14px;font-weight: 400;margin: 10px 0;">
                                       <?php foreach ($all_client as $client): ?>
                                          <option value="<?php echo $client['id']; ?>"><?php echo $client['numero']; ?></option>
                                       <?php endforeach; ?>
                                    </select>
                            
                                </div>
                              </div>
                     <div class="col-md-12">
                        <div class="full field">
                           <select id="voiture" name="voiture"  style="width: 100%;border: none;background: #e8e8e8;min-height: 52px;padding: 0 20px;font-size: 14px;font-weight: 400;margin: 10px 0;">
                              <?php foreach ($all_service as $voiture): ?>
                                 <option value="<?php echo $voiture['idService']; ?>"><?php echo $voiture['nom_service']; ?></option>
                              <?php endforeach; ?>
                           </select>
                     
                        </div>
                     </div>
                             
                    
                    <div class="col-md-12">
                
                    <div class="full center" >
                        <button class="submit_bt" type= "submit">Inserer</button>
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