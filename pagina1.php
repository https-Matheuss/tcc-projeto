<?php
// Conexão com o banco
$caminho = 'C:\xampp\htdocs\dbfaseamento.db';
$base = new PDO('sqlite:' . $caminho);

// Captura o CNPJ enviado pelo formulário
$cnpj = isset($_GET['cnpj']) ? $_GET['cnpj'] : null;

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta por CNPJ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            color: #333;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"] {
            padding: 5px;
            margin: 5px 0;
            width: 200px;
        }

        input[type="submit"] {
            padding: 6px 12px;
            background: #007bff;
            border: none;
            color: white;
            font-weight: bold;
            cursor: pointer;
            border-radius: 4px;
        }

        input[type="submit"]:hover {
            background: #0056b3;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 15px;
            font-size: 14px;
        }

        table th, table td {
            border: 1px solid #ccc;
            padding: 6px;
            text-align: center;
        }

        table th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        table tr:nth-child(even) {
            background-color: #fafafa;
        }

        table td:empty {
            background: #ffe5e5; /* realça células vazias */
        }
    </style>
</head>
<body>
    <h2>🔍 Consulta de Produtos por CNPJ</h2>

    <form method="get">
        <label>Digite o CNPJ:</label><br>
        <input type="text" name="cnpj" value="<?= htmlspecialchars($cnpj) ?>">
        <input type="submit" value="Buscar">
    </form>

    <?php if ($cnpj): ?>
        <h3>Resultados para o CNPJ: <span style="color: #007bff;"><?= htmlspecialchars($cnpj) ?></span></h3>

        <?php
        $sql = "
            SELECT CLIENTE, NOME_CLIENTE, CNPJ, PRODUTO, DESCRICAO_PRODUTO,
                ROUND(SUM(CASE WHEN EMISSAO BETWEEN '2025-01-01' AND '2025-01-31' THEN QUANTIDADE END),2) AS JANEIRO_25,
                ROUND(SUM(CASE WHEN EMISSAO BETWEEN '2025-02-01' AND '2025-02-28' THEN QUANTIDADE END),2) AS FEVEREIRO_25,
                ROUND(SUM(CASE WHEN EMISSAO BETWEEN '2025-03-01' AND '2025-03-31' THEN QUANTIDADE END),2) AS MARCO_25,
                ROUND(SUM(CASE WHEN EMISSAO BETWEEN '2025-04-01' AND '2025-04-30' THEN QUANTIDADE END),2) AS ABRIL_25,
                ROUND(SUM(CASE WHEN EMISSAO BETWEEN '2025-05-01' AND '2025-05-31' THEN QUANTIDADE END),2) AS MAIO_25,
                ROUND(SUM(CASE WHEN EMISSAO BETWEEN '2025-06-01' AND '2025-06-30' THEN QUANTIDADE END),2) AS JUNHO_25,
                ROUND(SUM(CASE WHEN EMISSAO BETWEEN '2025-07-01' AND '2025-07-31' THEN QUANTIDADE END),2) AS JULHO_25,
                ROUND(SUM(CASE WHEN EMISSAO BETWEEN '2025-08-01' AND '2025-08-31' THEN QUANTIDADE END),2) AS AGOSTO_25,
                ROUND(SUM(CASE WHEN EMISSAO BETWEEN '2025-09-01' AND '2025-09-30' THEN QUANTIDADE END),2) AS SETEMBRO_25,
                ROUND(SUM(CASE WHEN EMISSAO BETWEEN '2025-10-01' AND '2025-10-31' THEN QUANTIDADE END),2) AS OUTUBRO_25,
                ROUND(SUM(CASE WHEN EMISSAO BETWEEN '2025-11-01' AND '2025-11-30' THEN QUANTIDADE END),2) AS NOVEMBRO_25,
                ROUND(SUM(CASE WHEN EMISSAO BETWEEN '2025-12-01' AND '2025-12-31' THEN QUANTIDADE END),2) AS DEZEMBRO_25
            FROM FATURAMENTO 
            WHERE CNPJ = '$cnpj'
            GROUP BY PRODUTO
        ";

        $result = $base->query($sql);
        ?>

        <table>
            <tr>
                <th>CLIENTE</th>
                <th>NOME CLIENTE</th>
                <th>PRODUTO</th>
                <th>DESCRIÇÃO PRODUTO</th>
                <th>JAN 25</th>
                <th>FEV 25</th>
                <th>MAR 25</th>
                <th>ABR 25</th>
                <th>MAI 25</th>
                <th>JUN 25</th>
                <th>JUL 25</th>
                <th>AGO 25</th>
                <th>SET 25</th>
                <th>OUT 25</th>
                <th>NOV 25</th>
                <th>DEZ 25</th>
            </tr>

            <?php foreach ($result as $row): ?>
                <tr>
                    <td><?= $row['CLIENTE'] ?></td>
                    <td><?= $row['NOME_CLIENTE'] ?></td>
                    <td><?= $row['PRODUTO'] ?></td>
                    <td><?= $row['DESCRICAO_PRODUTO'] ?></td>
                    <td><?= $row['JANEIRO_25'] ?></td>
                    <td><?= $row['FEVEREIRO_25'] ?></td>
                    <td><?= $row['MARCO_25'] ?></td>
                    <td><?= $row['ABRIL_25'] ?></td>
                    <td><?= $row['MAIO_25'] ?></td>
                    <td><?= $row['JUNHO_25'] ?></td>
                    <td><?= $row['JULHO_25'] ?></td>
                    <td><?= $row['AGOSTO_25'] ?></td>
                    <td><?= $row['SETEMBRO_25'] ?></td>
                    <td><?= $row['OUTUBRO_25'] ?></td>
                    <td><?= $row['NOVEMBRO_25'] ?></td>
                    <td><?= $row['DEZEMBRO_25'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>
</html>