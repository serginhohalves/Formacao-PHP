<?php    
// preparando a conexão com o banco de dados
$conn = new mysqli(
    'localhost',
    'root',
    '#*Brasil03',
    'dbphp7'
);

// verificando se houve erro na conexão
if($conn->connect_error) // se houver erro aa conexão
{
    echo "Error " . $conn->connect_error; // então mostra o erro
    exit;
}


// inserindo dados no banco de dados via prepared statement
// $stmt = $conn->prepare("INSERT INTO tb_usuarios(deslogin, dessenha) VALUES (?, ?)");
// $stmt->bind_param("ss", $login, $pass);
// $login = "user";
// $pass = "12345";
// $stmt-> execute();


// inserindo dados no banco de dados via query

$result = $conn->query("SELECT * FROM tb_usuarios ORDER BY deslogin");

while($row = $result->fetch_assoc()){

   var_dump($row);
} 

?>
