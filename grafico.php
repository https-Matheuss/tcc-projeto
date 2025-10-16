<?php
$labels = ['Janeiro', 'Fevereiro', 'Março', 'Abril'];
$valores = [120, 90, 150, 100];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Gráfico com Valores em Cima</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
</head>
<body>
    <h2>Vendas por Mês</h2>
    <canvas id="graficoBarras" style="width: 200px; height: 50px;"></canvas>

    <script>
        const ctx = document.getElementById('graficoBarras').getContext('2d');
        const graficoBarras = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    label: 'Vendas',
                    data: <?php echo json_encode($valores); ?>,
                    backgroundColor: 'rgba(54, 162, 235, 0.7)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    datalabels: {
                        anchor: 'end',
                        align: 'start',
                        color: '#000',
                        font: {
                            weight: 'bold'
                        },
                        formatter: function(value) {
                            return value;
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
            plugins: [ChartDataLabels]
        });
    </script>
</body>
</html>