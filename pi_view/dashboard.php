<div id="about" class="section layout_padding">
        <div class="container">
        <div class="full margin_top_10">
           <h3 class="main_heading _left_side margin_top_10">Tableau de bord</h3>
           
        </div>

            <div class="row">
                <div class="col-lg-6 margin_top_10">
                  
             
                       <div class="carousel-inner">
                        <div class="carousel-item active">
                           <div class="testomonial_section">
                              <div class="full center">
                                <div class="client_img" style="margin-top:-100px">
                                  <img src="<?php echo base_url("assets/images/1.png")?>" alt="#" />
                                </div>
                              </div>
                              <div class="full testimonial_cont text_align_center"style="margin-top:-140px" >
                                <p><strong>Chiffre d'affaire total</strong><br><strong class="ornage_color">150000</strong></p>
                               
                              </div>
                            </div> 
                        </div>

                      

                      

                     </div>
                    
                        
             
                </div>
                <div class="col-lg-6">
              
                        <canvas id="myPieChart" width="200" height="200" style="margin-top:-80px"></canvas>
            
               </div>
               </div>

               
               <div class="row">
                <div class="col-lg-6 margin_top_10">
                  
             
                       <div class="carousel-inner">
                        <div class="carousel-item active">
                           <div class="testomonial_section">
                              <div class="full center">
                                <div class="client_img" style="margin-top:-10px">
                                  <img src="<?php echo base_url("assets/images/2.png")?>" alt="#" />
                                </div>
                              </div>
                              <div class="full testimonial_cont text_align_center"style="margin-top:-100px" >
                                <p><strong>Chiffre d'affaire par type de voiture</strong></p>
                               
                               
                              </div>
                            </div> 
                        </div>

                      

                      

                     </div>
                    
                        
             
                </div>
                <div class="col-lg-4">
              
               
            
               </div>
              
        
           
               <div class="full center" style="margin-top:-160px">
                                  <button class="submit_bt" style="margin-right:10px">Utile</button>
                                  <button class="submit_bt" style="margin-right:10px">4*4</button>
                                  <button class="submit_bt" style="margin-right:10px">4*4</button>
                                

               </div>  
                
               <div class="full center" style="margin-top:-50px;width:500px; margin-left:100px" >
               <table id="tableSlotA" >
                            <thead>
                                <tr>
                                    <th>Marque</th>
                                    <th>Total Tarif Services</th>
                                    <th>Nombre de fois</th>

                                </tr>
                            </thead>
                            <tr>
                                    <th>Marque</th>
                                    <th>Total Tarif Services</th>
                                    <th>Nombre de fois</th>

                                </tr>
                        </table>
                </div>  
                </div>

                <div class="row">
                <div class="col-lg-6 margin_top_10">
                  
             
                       <div class="carousel-inner">
                        <div class="carousel-item active">
                           <div class="testomonial_section">
                              <div class="full center">
                                <div class="client_img">
                                  <img style="width:300px;" src="<?php echo base_url("assets/images/5.png")?>"alt="#" />
                                </div>
                              </div>
                              <div class="full testimonial_cont text_align_center"style="margin-top:-140px" >
                                <p><strong>Nombre de voiture traite</strong><br><strong class="ornage_color">par jour</strong></p>
                              
                                <form id="myForm">
                           
                            <div class="col-md-12">
                                <div class="full field">
                                  
                                    <input type="date" id="dateInput" name="date" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="full center">
                                    <button class="submit_bt" type="submit">Valider</button>
                                </div>
                            </div>
                        </form>
                              </div>
                            </div> 
                        </div>

                      

                      

                     </div>
                     <div class="full testimonial_cont text_align_center"style="margin-top:-50px" >
                                <p><strong>Nombre de voiture traite le 222 </strong></p>
                              
                              </div>
                        
             
                </div>
               
               </div>

                
               </div>
               </div>
               

               <script src="<?php echo base_url('assets/js/Chart.js'); ?>"></script>
<script>
    window.addEventListener("load", function () {
        var ctx = document.getElementById('myPieChart').getContext('2d');
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Payé', 'Non Payé'],
                datasets: [{
                    label: 'Chiffre d\'Affaires',
                    data: [1, 4],
                    backgroundColor: ['#36a2eb', ' #f36b2a']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw + ' Ar';
                            }
                        }
                    }
                }
            }
        });
    });
</script>
