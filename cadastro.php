<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Formulário de Cadastro - Processamento</title>
</head>
<body>
    <?php
    // Conexão com o banco de dados
    $conexao = mysqli_connect("localhost", "root", "", "aula6");

    if (!$conexao) {
        die("Erro de conexão com o banco de dados");
    }

    // Verifica se o formulário foi enviado via POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Verifica se todos os campos foram preenchidos
        if (isset($_POST['nome']) && isset($_POST['endereco']) && isset($_POST['cidade']) &&
            !empty($_POST['nome']) && !empty($_POST['endereco']) && !empty($_POST['cidade'])) {

            // Escapa os dados para prevenir SQL Injection
            $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
            $endereco = mysqli_real_escape_string($conexao, $_POST['endereco']);
            $cidade = mysqli_real_escape_string($conexao, $_POST['cidade']);

            // Exibe os dados recebidos
            echo "<h1>Dados Recebidos:</h1>";
            echo "<p><strong>Nome:</strong> $nome</p>";
            echo "<p><strong>Endereço:</strong> $endereco</p>";
            echo "<p><strong>Cidade:</strong> $cidade</p>";

            // Inserir os dados no banco de dados
            $sql = "INSERT INTO alunos (nome, endereco, cidade) VALUES ('$nome', '$endereco', '$cidade')";

            // Executa a consulta SQL
            $resultado = mysqli_query($conexao, $sql);

            // Verifica se a inserção foi bem-sucedida
            if ($resultado) {
                echo "<h1>Cadastro realizado com sucesso!</h1>";
            } else {
                echo "<h1>Erro ao cadastrar os dados.</h1>";
            }
        } else {
            echo "<h1>Erro: Todos os campos são obrigatórios.</h1>";
        }
    }

    // Fecha a conexão com o banco
    mysqli_close($conexao);
    ?>
</body>
</html>
