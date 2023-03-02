<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Autenticacao</title>
</head>
<body>
    <br>
    <h1>Login - Autenticacao</h1>
    <br>
<?php
//Dados para conexao ao MySQL → MySQL
$mysqlhostname = "144.22.244.104";
$mysqlport = "3306";
$mysqlusername = "Alpha2Go";
$mysqlpassword = "Alpha2Go";
$mysqldatabase = "Alpha2Go";

//Mostra a String de Conexao ao MySQL → Criei a String de conexão e conectei ao banco (PDO)
$dsn = 'mysql:host=' . $mysqlhostname . ';dbname=' . $mysqldatabase . ';port=' . $mysqlport;
$pdo = new PDO($dsn, $mysqlusername,$mysqlpassword);   

//Captura o post do Usuario
$email = $_POST["email"];
$senha = $_POST["senha"];

//Realiza uma Query SQL para buscar o administrador que tenha o EMAIL e a SENHA passado pelo Usuario
$admin = $pdo->query("SELECT * FROM ADMINISTRADOR WHERE ADM_EMAIL='" . $email . "' AND ADM_SENHA='" . $senha . "'")->fetchAll(PDO::FETCH_ASSOC);

//Se o retorno for vazio (0), então a senha ou email estão incorretos
if(count($admin)==0){
    header('Location: login-adm.html');
} else {
    header('Location: tela-adm.html');
}
?>

</body>
</html>