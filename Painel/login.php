
<?php
    //logando quando o user colocou a opção de lembrar senha
    if(isset($_COOKIE['lembrar'])){
        $user = $_COOKIE['user'];
        $password = $_COOKIE['password']; 
        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin_usuarios` WHERE user = ? AND senha = ?");
        $sql->execute(array($user,$password));
        if($sql ->rowCount()==1){
            $info = $sql -> fetch();
            //logamos com sucesso.
            $_SESSION['login'] = true;
            $_SESSION['user'] = $user;
            $_SESSION['password'] = $password;
            $_SESSION['cargo'] = $info['cargo'];
            $_SESSION['nome'] = $info['nome'];
            $_SESSION['img'] = $info['img'];
            header('Location:'.INCLUDE_PATH_PAINEL);
            die();
        }
    }
?>


<?php

    if(isset($_POST['acao'])){
        $user = $_POST['user'];
        $password = $_POST['password'];
        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin_usuarios` WHERE user = ? AND senha = ?");
        $sql->execute(array($user,$password));
        if($sql ->rowCount()==1){
            $info = $sql -> fetch();
            //logamos com sucesso.
            $_SESSION['login'] = true;
            $_SESSION['user'] = $user;
            $_SESSION['password'] = $password;
            $_SESSION['cargo'] = $info['cargo'];
            $_SESSION['nome'] = $info['nome'];
            $_SESSION['img'] = $info['img'];

            if(isset($_POST['lembrar'])){
                setcookie('lembrar', true, time()+(60*60*24),'/');
                setcookie('user',$user, time()+(60*60*24),'/');
                setcookie('password',$password, time()+(60*60*24),'/');
            }
                 header('Location:'.INCLUDE_PATH_PAINEL);
                 die();

            }else{
                 //falhou
                 echo '<div class="box-erro">Usuário ou senha incorreta!</div>';
            }

        }
    ?>


<!DOCTYPE html>
<html lang="pt-br"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo INCLUDE_PATH_PAINEL; ?>css/style.css" rel="stylesheet"/>
    <title>login</title>
</head>
<body>
    
    <div class="mb-3 box-login">
        <h2>Efetue seu login</h2>
        <form method="post">
            <input type="text" name="user" placeholder="Usuário" require><br>
            <input type="password" name="password" placeholder="senha" require><br>
            <div class="form-group-login">
                <input type="submit" name="acao" value="Entrar">
            </div>
            <div class="form-group-login">
                <label> Lembrar-me</label>
                <input type="checkbox" name="lembrar">
            </div>
        </form>
        
    </div><!--box login--->
</body>
</html>