<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "solicitacoes_matheusv";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if($conn -> connect_error){
        die("Falha na conexão : ". $conn -> connect_error);
    }

    $sql = "SELECT * FROM Solicitacoes ORDER BY status_solicitacao, urgencia";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // ... (your table rows)
            echo "<td>" . $row['id_solicitacao'] . "</td>";
            echo "<td>" . $row['fk_cliente'] . "</td>";
            echo "<td>" . $row['descricao'] . "</td>";
            echo "<td>" . $row['urgencia'] . "</td>";
            echo "<td>" . $row['status_solicitacao'] . "</td>";
            echo "<td>" . $row['data_abertura'] . "</td>";
            echo "<td>" . $row['fk_funcionario'] . "</td>";
            echo "</tr>";   
        }
    } else {
        echo "Nenhuma solicitação encontrado.";
    }

    if(isset($_POST['create-solicitacao'])) {

        $descricao = $_POST['descricao'];
        $urgencia = $_POST['urgencia'];
        $fk_cliente = $_POST['fk_cliente'];
        $status_solicitacao = $_POST['status_solicitacao'];
        $data_abertura = $_POST['data_abertura'];
        $fk_funcionario = $_POST['fk_funcionario'];

        $sql = "INSERT INTO Solicitacoes (descricao, urgencia, fk_cliente, status_solicitacao, data_abertura, fk_funcionario)
        VALUES('$descricao', '$urgencia', '$fk_cliente', '$status_solicitacao', '$data_abertura', '$fk_funcionario')";

        if($conn -> query($sql) === TRUE){
            echo "Nova solicitação adicionado com sucesso!";
        }else{
            echo "Erro:". $sql."<br>".$conn->error;
        }
        $conn -> close();
     }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface</title>
</head>
<body>
<form method="POST" action="">
        <label for="descricao">Descricao da solicitação:</label>
        <input type="text" name="descricao" required>
        <br><br>
        <label for="urgencia">Urgencia</label>
        <input type="text" name="urgencia" required>
        <br><br>
        <label for="fk_cliente">FK cliente</label>
        <input type="number" name="fk_cliente" required>
        <br><br>
        <label for="status_solicitacao">Status da solicitação</label>
        <input type="text" name="status_solicitacao" required>
        <br><br>
        <label for="data_abertura">Data de abertura</label>
        <input type="date" name="data_abertura" required>
        <br><br>
        <label for="fk_funcionario">Fk Funcionario</label>
        <input type="number" name="fk_funcionario" required>
        <br><br>
        <button type="submit" name="create-solicitacao">CADASTRAR</button>
    </form>
</body>
</html>