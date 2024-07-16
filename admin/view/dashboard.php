<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        .chart-container {
            width: 50%;
            margin: auto;
        }
    </style>
</head>
<body>

<div class="section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin_top_10">
                <div class="full margin_top_10">
                    <h3 class="main_heading _left_side margin_top_10">Chiffre d'Affaires</h3>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="full field">
                                <label>Chiffre d'Affaires Total</label>
                                <p><?php echo $total; ?> €</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="full field">
                                <label>Chiffre d'Affaires Payé</label>
                                <p><?php echo $paye; ?> €</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="full field">
                                <label>Chiffre d'Affaires Non Payé</label>
                                <p><?php echo $nonpaye; ?> €</p>
                            </div>
                        </div>
                    </div>
                    <div class="chart-container">
                        <canvas id="myPieChart"></canvas>
                    </div>
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
                    data: [<?php echo $paye; ?>, <?php echo $nonpaye; ?>],
                    backgroundColor: ['#36a2eb', '#ff6384']
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
                                return tooltipItem.label + ': ' + tooltipItem.raw + ' €';
                            }
                        }
                    }
                }
            }
        });
    });
</script>

</body>
</html>
