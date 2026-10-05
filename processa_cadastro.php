<?php
    include  "conexao.php";

    // verifica se os dados foram enviados pelo metodo post
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome = trim($_POST['nome']);
        $email = trim($_POST['email']);
        $senha = $_POST['senha'];
        $tipo_perfil = trim($_POST['tipo_perfil']);

        $emailExists = "select usuario_id from tbl_usuarios where email = :email";
        $consulta = $cn->prepare($emailExists);
        $consulta->bindValue(':email', $email, PDO::PARAM_STR);
        $consulta->execute();

        if($consulta ->rowCount() > 0){
            echo "<script>
                alert('O email informado já está cadastrado no sistema! Tente fazer o login');
                window.location.href= 'login.php';
            </script>";
        }
    }
?>
