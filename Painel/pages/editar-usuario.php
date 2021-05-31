<div class="box-content">
    <h2><i class="fa fa-pencil"></i> Editar Usuário</h2>

    <form method="post" enctype="multipart/form-data">
        <?php
            if(isset($_POST['acao'])){
                //Enviei meu formulário.
                $nome = $_POST['nome'];
                $senha = $_POST['senha'];
                $imagem = $_FILES['imagem'];
                $imagem_atual = $_POST['imagem-atual'];
                $usuario = new Usuario();

                if($imagem['name'] != ''){
                    //o usuário selecionou uma imagem
                    if(Painel::imagemValida($imagem)){
                        //Posso fazer o upload
                        Painel::deleteFile($imagem_atual);
                        $imagem = Painel::uploadFile($imagem);
                        if($usuario->atualizarUsuario($nome, $senha, $imagem)){
                            $_SESSION['img'] = $imagem;
                            Painel::alert('sucesso', 'Cadastro atualizado com sucesso junto com a imagem!');
                        }else{
                            Painel::alert('erro', 'Ocorreu um erro ao atualizar junto com a imagem!');
                        }

                    }else{
                        Painel::alert('erro', 'O formato não é valido');
                    }


                }else{
                    //ele não selecionou nenhuma imagem
                    $imagem = $imagem_atual;
                    if($usuario->atualizarUsuario($nome, $senha, $imagem)){
                        Painel::alert('sucesso', 'Cadastro atualizado com sucesso!');
                    }else{
                        Painel::alert('erro', 'Ocorreu um erro ao atualizar!');
                    }
                }
                
            }
        ?>

        <div class="from-group">
            <label>Nome:</label>
            <input type="text" name="nome" require value="<?php echo $_SESSION['nome']; ?>">
        </div><!--from-group-->

        <div class="from-group">
            <label>Senha:</label>
            <input type="password" name="senha" require value="<?php echo $_SESSION['password']; ?>">
        </div><!--from-group-->

        <div class="from-group">
            <label>Imagem:</label>
            <input type="file" name="imagem" require>
            <input type="hidden" name="imagem-atual" value="<?php echo $_SESSION['img']; ?>">
        </div><!--from-group-->

        <div class="from-group">
            <input type="submit" name="acao" value="Atualizar!">
        </div><!--from-group-->

    </form>
</div><!--Box-content-->