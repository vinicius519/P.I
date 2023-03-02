<html>
        <head>
            <title>Excluir o Administrador</title>
        </head>
        <body>
            <h1>Excluir o Administrador</h1>
            <br>
            <Form Action="excluirprocessamento.php" method="POST">
                <input type="hidden" name="id" value="">
                <br>
                Nome : 
                <input type="text" name="nome" value="">
                <br>
                Email : 
                <input type="text" name="email" value="">
                <br>
                <input type="submit" value="Enviar"> 
            </Form>
            
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

//Coleta os dados do Administrador
$id = $_GET["id"];

//Realiza uam Query SQL para buscar o administrador que tenha o EMAIL e a SENHA passado p
$admin = $pdo->query("SELECT * FROM ADMINISTRADOR WHERE ADM_ID=" . $id)->fetch();

//Se o retorno for vazio (0), então a senha ou email estão incorretos
$nome = $admin["ADM_NOME"];
$email = $admin["ADM_EMAIL"];
?>
       
        </body>
        </html>    