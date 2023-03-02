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
$cmd = $pdo->query("SELECT * FROM PRODUTO");

$data = $cmd->fetchAll();

?>  


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
$descricao = $_POST["descrição"];
$preco = $_POST["preço"];
$desconto = $_POST["desconto"];
$categoriaId= $_POST["categoria_id"];
$produtoAtivo= $_POST["produto_ativo"];
    
//Monta o comando de Inserção no Banco
$cmdtext = "INSERT INTO PRODUTO (PRODUTO_NOME, PRODUTO_DESC, PRODUTO_PRECO, PRODUTO_DESCONTO, CATEGORIA_ID, PRODUTO_ATIVO) VALUES('" . $nome . "','" . $descricao . "'," . $preco . "," . $desconto . "," . $categoriaId . "," . $produtoAtivo . ")" ;
$cmd = $pdo->prepare($cmdtext);

//Executa o comando e verifica se teve sucesso
$status = $cmd->execute();
if($status){
    header('Location: tela-lista-produtos.php');
   
} else {
    echo "Ocorreu um erro ao inserir";
}
?>
</body>
</html>  
