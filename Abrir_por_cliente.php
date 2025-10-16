<?php
$caminho = 'C:\xampp\htdocs\dbfaseamento.db';

try {
    $base = new PDO('sqlite:' . $caminho);
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erro ao conectar: ' . $e->getMessage());
}

$result = $base->query('SELECT * FROM LOGIN');

echo '<table border="1">';
echo '<tr><th>ID</th><th>Nome</th><th>Password</th><th>Editar</th></tr>';

foreach ($result as $row) {
    // garante que índice existe
    $id = isset($row['id']) ? $row['id'] : '';
    $username = isset($row['username']) ? $row['username'] : '';
    $password = isset($row['password']) ? $row['password'] : '';

    echo '<tr>';
    echo '<td>' . htmlspecialchars($id) . '</td>';
    echo '<td>' . htmlspecialchars($username) . '</td>';
    echo '<td>' . htmlspecialchars($password) . '</td>';
    // usa urlencode para segurança na URL e evita interpolação ambígua
    echo '<td><a href="Alterar.php?id=' . urlencode($id) . '">Editar</a></td>';
    echo '</tr>';
}

echo '</table>';
?>
