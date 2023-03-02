<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="estilos-css/tela-lista-adm.css" rel="stylesheet" />
    <title>Administrador</title>
</head>
<body>
    
    <main>
        <header>

        </header>
        <div>
            <section id="section-um">
                <img src="imagens/icone-adm.png" id="imagem-icone-adm">
                <h2>ADMINISTRADOR</h2>
                <a href="tela-adm.html"><p>HOME</p></a>
                <a href="tela-lista-adm.php"><p>ADMINISTRADORES</p></a>
                <a href="tela-categorias.html"><p>CATEGORIAS</p></a>
                <a href="tela-produtos.php"><p>PRODUTOS</p></a>
            </section>
            <section id="section-dois">
                <h1>lista de adms</h1>
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

//Monta o comando de Inserção no Banco
$cmd = $pdo->query("SELECT * FROM ADMINISTRADOR");
?>      
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Senha</th>
            <th>Atualizacao</th>
            <th>Exclusao</th>            
        </tr>
<?php
    //Lista os admins
    while($linha = $cmd->fetch()){
?>
        <tr>
            <td>
                <?php
                    echo $linha["ADM_ID"];
                ?>
            </td>
            <td>
                <?php
                    echo $linha["ADM_NOME"];
                ?>                
            </td>
            <td>
                <?php
                    echo $linha["ADM_EMAIL"];
                ?>
            </td>    
            <td>
                 <?php
                    echo $linha["ADM_SENHA"];
                ?>
            </td>    
            <td>
                <a href="atualizarform.php?id=<?php echo $linha["ADM_ID"] ?>">Atualizar</a>
            </td>
            <td>
                <a href="excluirform.php?id=<?php echo $linha["ADM_ID"] ?>">Excluir</a>
            </td>        
        </tr>
    <?php
    } //while($linha = $cmd->fetch())
?>
    </table>
                <div id="btn-adicionar-adm">
                    <a href="tela-admn-criar-novo-adm.html"><h2>adicionar adm</h2></a>
                    

                </div>
    
            </section>

        </div>
        

    </main>
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

//Captura os valores das variáveis
$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];
    
//Monta o comando de Inserção no Banco
$cmdtext = "INSERT INTO ADMINISTRADOR (ADM_NOME, ADM_EMAIL, ADM_SENHA) VALUES('" . $nome . "','" . $email . "','" .$senha . "')" ;
$cmd = $pdo->prepare($cmdtext);

//Executa o comando e verifica se teve sucesso
$status = $cmd->execute();
if($status){
    header('Location: tela-lista-adm.php');
    
} else {
    echo "Ocorreu um erro ao inserir";
}
?>
</body>
</html>  
