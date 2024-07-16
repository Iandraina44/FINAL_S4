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
                                <p><strong>Chiffre d'affaire total</strong><br><strong class="ornage_color"><?php echo $total; ?> Ar</strong></p>
                               
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
               <?php foreach ($types_voiture as $type): ?>
            <div class="col-md-3">
             
                <button  onclick="showChiffreAffaire('<?php echo $type['id_type_voiture']; ?>')" class="submit_bt" style="margin-right:10px">  
                   <?php echo $type['marque']; ?></button>
                 
                </button>
            </div>
        <?php endforeach; ?>
                                
                                

               </div>  


                
               <div class="full center" style="margin-top:-50px;width:500px; margin-left:100px" >

               <?php if (!empty($chiffre_affaire_voiture)): ?>
       
        <table border="1">
            <thead>
                <tr>
                    <th>Marque</th>
                    <th>Total Tarif Services</th>
                    <th>Nombre de Fois</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($chiffre_affaire_voiture as $ca): ?>
                    <tr>
                        <td><?php echo $ca['marque']; ?></td>
                        <td><?php echo $ca['total_tarif_services']; ?> €</td>
                        <td><?php echo $ca['nombre_de_fois']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
              
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
                                <input type="date" id="date" name="date" onchange="updateDashboard(this.value)" value="<?php echo date('Y-m-d'); ?>">
                                   
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
                     <?php if (!empty($voitures_par_date)): ?>
                      <p><strong>Nombre de voiture traite le <?php echo $voitures_par_date[0]['date_jour']; ?> est <?php echo $voitures_par_date[0]['nombre_voitures']; ?></strong></p>
            <?php else: ?>
                <p>Aucune réservation trouvée pour cette date.</p>
            <?php endif; ?>
                             
                              
                              </div>
                        
             
                </div>
               
               </div>

                
               </div>
               </div>
               

               <script src="<?php echo base_url('assets/js/Chart.js'); ?>"></script>
<script>

function updateDashboard(date) {
        var form = document.createElement('form');
        form.method = 'POST';
        form.action = '<?php echo site_url('Dashboard_c/index'); ?>';
        
        var hiddenField = document.createElement('input');
        hiddenField.type = 'hidden';
        hiddenField.name = 'date';
        hiddenField.value = date;

        form.appendChild(hiddenField);
        document.body.appendChild(form);
        form.submit();
    }
   function showChiffreAffaire(id_type_voiture) {
        var form = document.createElement('form');
        form.method = 'POST';
        form.action = '<?php echo site_url('Dashboard_c/index'); ?>';
        
        var hiddenField = document.createElement('input');
        hiddenField.type = 'hidden';
        hiddenField.name = 'id_type_voiture';
        hiddenField.value = id_type_voiture;

        form.appendChild(hiddenField);
        document.body.appendChild(form);
        form.submit();
    }
    window.addEventListener("load", function () {
        var ctx = document.getElementById('myPieChart').getContext('2d');
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Payé', 'Non Payé'],
                datasets: [{
                    label: 'Chiffre d\'Affaires',
                    data: [<?php echo $paye; ?>, <?php echo $nonpaye; ?>],
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
