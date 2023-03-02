<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../estilos-css/tela-criar-novo-produto.css" rel="stylesheet" />
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
         
                <h1>Cria um novo Produto</h1>
                        
                    <Form Action="criarprocessamento-produtos.php" method="POST">
                        <br>
                        Nome : 
                        <input type="text" name="nome">
                        <br>
                        Descrição : 
                        <input type="text" name="descrição">
                        <br>
                        Preço : 
                        <input type="number" name="preço">
                        <br>
                        Desconto : 
                        <input type="number" name="desconto">
                        <br>
                        Categoria Id : 
                        <select type="number" name="categoria_id">
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
                            $cmd = $pdo->query("SELECT * FROM CATEGORIA")->fetchAll();
                            //var_dump($cmd);
                            foreach ($cmd as $row) {

                                echo "<option value=\"{$row['CATEGORIA_ID']}\">{$row['CATEGORIA_NOME']}</option>";
                            }
                            ?>
                        </select>
                        <br>
                        Produto Ativo : 
                        <input type="number" name="produto_ativo">
                        <br>
                        <input type="submit" value="Enviar"> 
                    </Form>
                    <br>
               
      

                <a href="tela-lista-produtos.php">Voltar para a Pagina de Lista</a> 
    
            </section>
        </div>
    </main>
</body>
</html>