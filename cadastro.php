<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Formulário de Cadastro - Processamento</title>
</head>
<body>
    <?php
    // Verifica se o formulário foi enviado
    if (isset($_POST['nome']) && isset($_POST['endereco']) && isset($_POST['cidade'])) {

        $nome = $_POST['nome'];
        $endereco = $_POST['endereco'];
        $cidade = $_POST['cidade'];

        echo "<h1>Dados Recebidos:</h1>";
        echo "<p><strong>Nome:</strong> $nome</p>";
        echo "<p><strong>Endereço:</strong> $endereco</p>";
        echo "<p><strong>Cidade:</strong> $cidade</p>";

        } else {
            echo "<h1>Erro: Todos os campos são obrigatórios.</h1>";
        }

        // Conexão com o banco de dados
        $conexao = mysqli_connect("localhost", "root", "", "aula_php");

        if (!$conexao) {
            die("Erro de conexão com o banco de dados");
        }

        // Inserir os dados no banco de dados
        $sql = "INSERT INTO alunos (nome, endereco, cidade) VALUES ('$nome', '$endereco', '$cidade')";

        $resultadp = mysqli_query($conexao, $sql);

        // Fecha a conexão com o banco
        mysqli_close($conexao);
        
    ?>
</body>
</html>
