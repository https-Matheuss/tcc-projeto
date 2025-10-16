 <style>
        table td:empty{background:  red;}
</style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php


 echo '<a href="Login.html">Voltar a tela de login</a><br>';
 echo '<a href="pagina1.php" target="_blank"> Busca por CNPJ</a>';
$username=$_POST['username'];
$password=$_POST['password'];

$caminho = 'C:\xampp\htdocs\dbfaseamento.db';

$base= new PDO('sqlite:'.$caminho);



$result=$base->query("SELECT LOGIN,SENHA,CODIGO FROM VENDEDORES WHERE LOGIN ='$username'");
foreach ($result as $row){
     $login1=$row['LOGIN'];
     $senha1=$row['SENHA'];
     $cod=$row['CODIGO'];
}

if ($login1==$username && $senha1==$password){
    //header('location:0002-RODRIGO VALDOMIRO.php');
    
        $result=$base->query("SELECT VENDEDOR AS COD,FATURAMENTO.GERENTE,FATURAMENTO.NOME_VENDEDOR,CLIENTE,NOME_CLIENTE,ESTADO,CNPJ,
    ROUND(SUM(CASE WHEN EMISSAO>='2023-08-01' AND EMISSAO<='2023-08-31' THEN TOTAL END),2) AS AGOSTO_2023,
    ROUND(SUM(CASE WHEN EMISSAO>='2023-09-01' AND EMISSAO<='2023-09-30' THEN TOTAL END),2) AS SETEMBRO_2023,
    ROUND(SUM(CASE WHEN EMISSAO>='2023-10-01' AND EMISSAO<='2023-10-31' THEN TOTAL END),2) AS OUTUBRO_2023,
    ROUND(SUM(CASE WHEN EMISSAO>='2023-11-01' AND EMISSAO<='2023-11-31' THEN TOTAL END),2) AS NOVEMBRO_2023,
    ROUND(SUM(CASE WHEN EMISSAO>='2023-12-01' AND EMISSAO<='2023-12-31' THEN TOTAL END),2) AS DEZEMBRO_2023,
    ROUND(SUM(CASE WHEN EMISSAO>='2024-01-01' AND EMISSAO<='2024-01-31' THEN TOTAL END),2) AS JANEIRO_24,
    ROUND(SUM(CASE WHEN EMISSAO>='2024-02-01' AND EMISSAO<='2024-02-29' THEN TOTAL END),2) AS FEVEREIRO_24,
    ROUND(SUM(CASE WHEN EMISSAO>='2024-03-01' AND EMISSAO<='2024-03-31' THEN TOTAL END),2) AS MARÇO_24,
    ROUND(SUM(CASE WHEN EMISSAO>='2024-04-01' AND EMISSAO<='2024-04-30' THEN TOTAL END),2) AS ABRIL_24,
    ROUND(SUM(CASE WHEN EMISSAO>='2024-05-01' AND EMISSAO<='2024-05-31' THEN TOTAL END),2) AS MAIO_24,
    ROUND(SUM(CASE WHEN EMISSAO>='2024-06-01' AND EMISSAO<='2024-06-30' THEN TOTAL END),2) AS JUNHO_24,
    ROUND(SUM(CASE WHEN EMISSAO>='2024-07-01' AND EMISSAO<='2024-07-31' THEN TOTAL END),2) AS JULHO_24,
    ROUND(SUM(CASE WHEN EMISSAO>='2024-08-01' AND EMISSAO<='2024-08-31' THEN TOTAL END),2) AS AGOSTO_24,
    ROUND(SUM(CASE WHEN EMISSAO>='2024-09-01' AND EMISSAO<='2024-09-30' THEN TOTAL END),2) AS SETEMBRO_24,
    ROUND(SUM(CASE WHEN EMISSAO>='2024-10-01' AND EMISSAO<='2024-10-31' THEN TOTAL END),2) AS OUTUBRO_24,
    ROUND(SUM(CASE WHEN EMISSAO>='2024-11-01' AND EMISSAO<='2024-11-30' THEN TOTAL END),2) AS NOVEMBRO_24,
    ROUND(SUM(CASE WHEN EMISSAO>='2024-12-01' AND EMISSAO<='2024-12-31' THEN TOTAL END),2) AS DEZEMBRO_24,
    ROUND(SUM(CASE WHEN EMISSAO>='2025-01-01' AND EMISSAO<='2025-01-31' THEN TOTAL END),2) AS JANEIRO_25,
    ROUND(SUM(CASE WHEN EMISSAO>='2025-02-01' AND EMISSAO<='2025-02-29' THEN TOTAL END),2) AS FEVEREIRO_25,
    ROUND(SUM(CASE WHEN EMISSAO>='2025-03-01' AND EMISSAO<='2025-03-31' THEN TOTAL END),2) AS MARÇO_25,
    ROUND(SUM(CASE WHEN EMISSAO>='2025-04-01' AND EMISSAO<='2025-04-30' THEN TOTAL END),2) AS ABRIL_25,
    ROUND(SUM(CASE WHEN EMISSAO>='2025-05-01' AND EMISSAO<='2025-05-31' THEN TOTAL END),2) AS MAIO_25,
    ROUND(SUM(CASE WHEN EMISSAO>='2025-06-01' AND EMISSAO<='2025-06-31' THEN TOTAL END),2) AS JUNHO_25,
    ROUND(SUM(CASE WHEN EMISSAO>='2025-07-01' AND EMISSAO<='2025-07-31' THEN TOTAL END),2) AS JULHO_25,
    ROUND(SUM(CASE WHEN EMISSAO>='2025-08-01' AND EMISSAO<='2025-08-31' THEN TOTAL END),2) AS AGOSTO_25,
    ROUND(SUM(CASE WHEN EMISSAO>='2025-09-01' AND EMISSAO<='2025-09-31' THEN TOTAL END),2) AS SETEMBRO_25,
    ROUND(SUM(CASE WHEN EMISSAO>='2025-10-01' AND EMISSAO<='2025-10-31' THEN TOTAL END),2) AS OUTUBRO_25,
    ROUND(SUM(CASE WHEN EMISSAO>='2025-11-01' AND EMISSAO<='2025-11-31' THEN TOTAL END),2) AS NOVEMBRO_25,
    ROUND(SUM(CASE WHEN EMISSAO>='2025-12-01' AND EMISSAO<='2025-12-31' THEN TOTAL END),2) AS DEZEMBRO_25,

    ROUND(SUM(TOTAL),2) AS TOTAL
    FROM FATURAMENTO INNER JOIN VENDEDORES ON FATURAMENTO.VENDEDOR=VENDEDORES.CODIGO 
    WHERE VENDEDOR=$cod AND EMISSAO>='2023-008-01' GROUP BY CLIENTE ORDER BY TOTAL DESC");

    echo '<table border="1" width="50%" >';

    echo'<tr>
            <td>COD</td>
            <td>GERENTE</td>
            <td>VENDEDOR</td>
            <td>CLIENTE</td>
            <td>NOME CLIENTE</td>
            <td>ESTADO</td>
            <td>CNPJ</td>
            <td>AGOSTO 23</td>
            <td>SETEMBRO 23</td>
            <td>OUTUBRO 23</td>
            <td>NOVEMBRO 23</td>
            <td>DEZEMBRO 23</td>
            <td>JANEIRO 24</td>
            <td>FEVEREIRO 24</td>
            <td>MARÇO 24</td>
            <td>ABRIL 24</td>
            <td>MAIO 24</td>
            <td>JUNHO 24</td>
            <td>JULHO 24</td>
            <td>AGOSTO 24</td>
            <td>SETEMBRO 24</td>
            <td>OUTUBRO 24</td>
            <td>NOVEMBRO 24</td>
            <td>DEZEMBRO 24</td>
            <td>JANEIRO 25</td>
            <td>FEVEREIRO 25</td>
            <td>MARÇO 25</td>
            <td>ABRIL 25</td>
            <td>MAIO 25</td>
            <td>JUNHO 25</td>
            <td>JULHO 25</td>
            <td>AGOSTO 25</td>
            <td>SETEMBRO 25</td>
            <td>OUTUBRO 25</td>
            <td>NOVEMBRO 25</td>
            <td>DEZEMBRO 25</td>

            <td>TOTAL</td>
            

            </tr>';

    foreach($result as $row){
        echo '<tr>'.
        '<td>'.$row['COD'].'</td>'.
        '<td>'.$row['GERENTE'].'</td>'.
        '<td>'.$row['NOME_VENDEDOR'].'</td>'.
        '<td>'.$row['CLIENTE'].'</td>'.
        '<td>'.$row['NOME_CLIENTE'].'</td>'.
        '<td>'.$row['ESTADO'].'</td>'.
        '<td>'.$row['CNPJ'].'</td>'.
        '<td>'.$row['AGOSTO_2023'].'</td>'.
        '<td>'.$row['SETEMBRO_2023'].'</td>'.
        '<td>'.$row['OUTUBRO_2023'].'</td>'.
        '<td>'.$row['NOVEMBRO_2023'].'</td>'.
        '<td>'.$row['DEZEMBRO_2023'].'</td>'.
        '<td>'.$row['JANEIRO_24'].'</td>'.
        '<td>'.$row['FEVEREIRO_24'].'</td>'.
        '<td>'.$row['MARÇO_24'].'</td>'.
        '<td>'.$row['ABRIL_24'].'</td>'.
        '<td>'.$row['MAIO_24'].'</td>'.
        '<td>'.$row['JUNHO_24'].'</td>'.
        '<td>'.$row['JULHO_24'].'</td>'.
        '<td>'.$row['AGOSTO_24'].'</td>'.
        '<td>'.$row['SETEMBRO_24'].'</td>'.
        '<td>'.$row['OUTUBRO_24'].'</td>'.
        '<td>'.$row['NOVEMBRO_24'].'</td>'.
        '<td>'.$row['DEZEMBRO_24'].'</td>'.
        '<td>'.$row['JANEIRO_25'].'</td>'.
        '<td>'.$row['FEVEREIRO_25'].'</td>'.
        '<td>'.$row['MARÇO_25'].'</td>'.
        '<td>'.$row['ABRIL_25'].'</td>'.
        '<td>'.$row['MAIO_25'].'</td>'.
        '<td>'.$row['JUNHO_25'].'</td>'.
        '<td>'.$row['JULHO_25'].'</td>'.
        '<td>'.$row['AGOSTO_25'].'</td>'.
        '<td>'.$row['SETEMBRO_25'].'</td>'.
        '<td>'.$row['OUTUBRO_25'].'</td>'.
        '<td>'.$row['NOVEMBRO_25'].'</td>'.
        '<td>'.$row['DEZEMBRO_25'].'</td>'.
        '<td>'.number_format($row['TOTAL'],2,",",".").'</td>'.  
        '</tr>';
        
    }
    echo '</table>';
    $result2=$base->query("SELECT ROUND(SUM(CASE WHEN EMISSAO>='2024-12-01' AND EMISSAO<='2024-12-31' THEN TOTAL END),2) AS V_DEZEMBRO_24,
                                  ROUND(SUM(CASE WHEN EMISSAO>='2025-01-01' AND EMISSAO<='2025-01-31' THEN TOTAL END),2) AS V_JANEIRO_25,
                                  ROUND(SUM(CASE WHEN EMISSAO>='2025-02-01' AND EMISSAO<='2025-02-28' THEN TOTAL END),2) AS V_FEVEREIRO_25,
                                  ROUND(SUM(CASE WHEN EMISSAO>='2025-03-01' AND EMISSAO<='2025-03-31' THEN TOTAL END),2) AS V_MARCO_25,
                                  ROUND(SUM(CASE WHEN EMISSAO>='2025-04-01' AND EMISSAO<='2025-04-30' THEN TOTAL END),2) AS V_ABRIL_25,
                                  ROUND(SUM(CASE WHEN EMISSAO>='2025-05-01' AND EMISSAO<='2025-05-30' THEN TOTAL END),2) AS V_MAIO_25,
                                  ROUND(SUM(CASE WHEN EMISSAO>='2025-06-01' AND EMISSAO<='2025-06-30' THEN TOTAL END),2) AS V_JUNHO_25,
                                  ROUND(SUM(CASE WHEN EMISSAO>='2025-07-01' AND EMISSAO<='2025-07-30' THEN TOTAL END),2) AS V_JULHO_25,
                                  ROUND(SUM(CASE WHEN EMISSAO>='2025-08-01' AND EMISSAO<='2025-08-30' THEN TOTAL END),2) AS V_AGOSTO_25,
                                  ROUND(SUM(CASE WHEN EMISSAO>='2025-09-01' AND EMISSAO<='2025-09-30' THEN TOTAL END),2) AS V_SETEMBRO_25,
                                  ROUND(SUM(CASE WHEN EMISSAO>='2025-10-01' AND EMISSAO<='2025-10-30' THEN TOTAL END),2) AS V_OUTUBRO_25,
                                  ROUND(SUM(CASE WHEN EMISSAO>='2025-11-01' AND EMISSAO<='2025-11-30' THEN TOTAL END),2) AS V_NOVEMBRO_25,
                                  ROUND(SUM(CASE WHEN EMISSAO>='2025-12-01' AND EMISSAO<='2025-12-30' THEN TOTAL END),2) AS V_DEZEMBRO_25
                            FROM FATURAMENTO WHERE VENDEDOR=$cod");
    foreach ($result2 as $row2) {
        $labels = ['DEZEMBRO 24','JANEIRO 25','FEVEREIRO 25','MARÇO 25','ABRIL 25','MAIO 25','JUNHO 25','JULHO 25','AGOSTO 25','SETEMBRO 25','OUTUBRO 25','NOVEMBRO 25','DEZEMBRO 25'];
        $valores = [$row2['V_DEZEMBRO_24'],$row2['V_JANEIRO_25'],$row2['V_FEVEREIRO_25'],$row2['V_MARCO_25'],$row2['V_ABRIL_25'], $row2['V_MAIO_25'],$row2['V_JUNHO_25'] , $row2['V_JULHO_25'], $row2['V_AGOSTO_25'], $row2['V_SETEMBRO_25'], $row2['V_OUTUBRO_25'],$row2['V_NOVEMBRO_25'] ,$row2['V_DEZEMBRO_25'] ];  
        
    }

}
    else{header('location:Login.html');

    }
?>

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
<a href="https://www.google.com/"> alou</a>

