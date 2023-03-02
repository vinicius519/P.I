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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="..\estilos-css/tela-lista-produtos.css" rel="stylesheet" />
    <title>Administrador</title>
</head>
<body>
    
    <main>
        <header>

        </header>
        <div>
            <section id="section-um">
                <img src="../imagens/icone-adm.png" id="imagem-icone-adm">
                <h2>ADMINISTRADOR</h2>
                <a href="../ADMINISTRADOR/tela-adm.html"><p>HOME</p></a>
                <a href="../ADMINISTRADOR/tela-lista-adm.php"><p>ADMINISTRADORES</p></a>
                <a href="../CATEGORIA/tela-categorias.html"><p>CATEGORIAS</p></a>
                <a href="tela-produtos.php"><p>PRODUTOS</p></a>
            </section>
            <section id="section-dois">
                <h1>lista de adms</h1>
            <table border="1">
                <tr>
                    <th>Id</th>
                    <th>Nome do Produto</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Desconto</th>
                    <th>Id Categoria</th>
                    <th>Produto Ativo</th>
                    <th>Atualizacao</th>
                    <th>Exclusao</th>            
                </tr>
                <?php
    //Lista os admins
    foreach ($data as $linha) {
        echo "<tr>";
        echo "<td>{$linha["PRODUTO_ID"]}</td>";
        echo "<td>{$linha["PRODUTO_NOME"]}</td>";
        echo "<td>{$linha["PRODUTO_DESC"]}</td>";
        echo "<td>{$linha["PRODUTO_PRECO"]}</td>";
        echo "<td>{$linha["PRODUTO_DESCONTO"]}</td>";
        echo "<td>{$linha["CATEGORIA_ID"]}</td>";
        echo "<td>{$linha["PRODUTO_ATIVO"]}</td>";
        echo "<td><a href=\"atualizarform.php?id={$linha["PRODUTO_ID"]}\">Atualizar</a></td>";
        echo "<td><a href=\"excluirform.php?id={$linha["PRODUTO_ID"]}\">Excluir</a></td>";     
        echo "</tr>";
    }

?>
            </table>
                <div id="btn-adicionar-adm">
                    <a href="tela-criar-novo-produto.php"><h2>adicionar produto</h2></a>
                    

                </div>
    
            </section>

        </div>
        

    </main>
</body>
</html>