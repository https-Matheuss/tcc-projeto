<?php
// Define cabeçalhos para download no navegador
header('Content-Type: text/csv; charset=UTF-8');
header('Content-Disposition: attachment; filename="exemplo.csv"');
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

// Abre a saída padrão (php://output) para enviar direto ao navegador
$saida = fopen('php://output', 'w');

// Escreve dados no CSV (usa ; como separador)
fputcsv($saida, ['Olá, mundo!', 'teste', 'teste2','lero lero'], ';');

// Fecha a saída (não precisa salvar no servidor)
fclose($saida);
exit;
?>