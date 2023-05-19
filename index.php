<?php
require 'conexao.php';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Consulta para verificar se as credenciais são válidas
    $sql = "SELECT * FROM usuarios WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Credenciais válidas, redireciona para a página de sucesso
        while($res_1 = mysqli_fetch_assoc($result)){
            $status = $res_1['status'];
            $nome = $res_1['nome'];
            $username = $res_1['username'];
            $password = $res_1['password'];
            $painel = $res_1['painel'];
            if($status == 'Inativo'){
                echo "<h2>Voce esta inativo procure a administração</h2>";
            }else{
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['nome'] = $nome;
                $_SESSION['painel'] = $painel;
                $_SESSION['password'] = $password;
                if ($painel == 'admin') {
                    header("Location: Admin");
                    exit();
                } else if($painel == 'aluno') {
                    header("Location: Aluno");
                    exit();
                }else if($painel == 'professor') {
                    header("Location: Professor");
                    exit();
                }
            }
        }
        
        
    } else {
        // Credenciais inválidas, exibe mensagem de erro
        $erro = "Usuário ou senha inválidos";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>FESVIP|ALUNO</title>
    <link rel="stylesheet" href="css/estilo.css"/>
    <link rel="Shortcut icon" href="img/icone.png"/>
</head>
<body>
    <div id="logo">
    <img src="img/FESVIP.png" alt="">
    </div>

    <?php if (isset($erro)) { ?>
        <p style="color: red;"><?php echo $erro; ?></p>
    <?php } ?>
    <div class="container">
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
      <div class="form-group">
        <label for="username">Usuário:</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="form-group">
        <input type="submit" value="Login">
      </div>
    </form>
  </div>
</div>
</body>
</html>