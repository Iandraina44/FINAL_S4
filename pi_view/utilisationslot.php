<div id="about" class="section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 margin_top_10">
                    <div class="full margin_top_10">
                        <h3 class="main_heading _left_side margin_top_10">Utilisation des slots</h3>
                        <form id="myForm">
                           
                            <div class="col-md-12">
                                <div class="full field">
                                    <label for="dateInput" class="file-label" id="fileLabel">Date</label>
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
                <div class="col-lg-7">
                    <div class="full margin_top_50_rs">
                     
                        <table id="tableSlotA" style="width:200px; float:left; margin-right:10px">
                            <thead>
                                <tr>
                                    <th>Slot A</th>
                                </tr>
                            </thead>
                            <tbody id="tableBodyA">
                                <!-- Les nouvelles lignes pour le Slot A seront ajoutées ici -->
                            </tbody>
                        </table>

                      
                        <table id="tableSlotB" style="width:200px; float:left; margin-right:10px">
                            <thead>
                                <tr>
                                    <th>Slot B</th>
                                </tr>
                            </thead>
                            <tbody id="tableBodyB">
                              
                            </tbody>
                        </table>

                       
                        <table id="tableSlotC" style="width:200px; float:left; margin-right:10px">
                            <thead>
                                <tr>
                                    <th>Slot C</th>
                                </tr>
                            </thead>
                            <tbody id="tableBodyC">
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener("load", function () {
            function sendData() {
                var xhr;
                if (window.XMLHttpRequest) {
                    xhr = new XMLHttpRequest();
                } else {
                   
                    xhr = new ActiveXObject("Microsoft.XMLHTTP");
                }

                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                          
                            var response = xhr.responseText;
                            handleResponse(response);
                        } else {
                            alert('Une erreur est survenue lors de la requête.');
                        }
                    }
                };

                var formData = new FormData();
                var dateValue = document.getElementById("dateInput").value;
                formData.append("date", dateValue);

                xhr.open("POST", "<?php echo site_url('Welcome/affichage_slot') ?>"); 
                xhr.send(formData);
            }

            function handleResponse(response) {
                var data = JSON.parse(response);

             
                document.getElementById("tableBodyA").innerHTML = "";
                document.getElementById("tableBodyB").innerHTML = "";
                document.getElementById("tableBodyC").innerHTML = "";

              
                data.A.forEach(function (value) {
                    var row = "<tr><td>" + value + "</td></tr>";
                    document.getElementById("tableBodyA").innerHTML += row;
                });

                data.B.forEach(function (value) {
                    var row = "<tr><td>" + value + "</td></tr>";
                    document.getElementById("tableBodyB").innerHTML += row;
                });

                data.C.forEach(function (value) {
                    var row = "<tr><td>" + value + "</td></tr>";
                    document.getElementById("tableBodyC").innerHTML += row;
                });
            }

            var form = document.getElementById("myForm");
            form.addEventListener("submit", function (event) {
                event.preventDefault(); 
                sendData();
            });
        });
    </script>
      