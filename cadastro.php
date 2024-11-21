<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "solicitacoes_matheusv";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if($conn -> connect_error){
        die("Falha na conexão : ". $conn -> connect_error);
    }
    
    if(isset($_POST['create-cliente'])) {

        $nome_cliente = $_POST['nome-cliente'];
        $email_cliente = $_POST['email-cliente'];
        $telefone_cliente = $_POST['telefone-cliente'];

        $sql = "INSERT INTO Clientes (nome_cliente, email_cliente, telefone_cliente)
        VALUES('$nome_cliente', '$email_cliente', '$telefone_cliente')";

        if($conn -> query($sql) === TRUE){
            echo "Novo cliente adicionado com sucesso!";
        }else{
            echo "Erro:". $sql."<br>".$conn->error;
        }
        $conn -> close();
     }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Cadastro</title>
</head>
<body>
    <h1>BEM VINDO A TELA DE CADASTRO</h1>

    <form method="POST" action="">
        <label for="nome-cliente">Nome do cliente:</label>
        <input type="text" name="nome-cliente" required>
        <br><br>
        <label for="email-cliente">Email do Cliente</label>
        <input type="email" name="email-cliente" required>
        <br><br>
        <label for="telefone-cliente">Telefone do cliente</label>
        <input type="tel" name="telefone-cliente" required>
        <br>
        <button type="submit" name="create-cliente">CADASTRAR</button>
    </form>
</body>
</html>