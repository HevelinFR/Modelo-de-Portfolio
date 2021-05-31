<?php
    verificaPermissaoPagina(2);
?>

<div class="box-content">
    <h2><i class="fa fa-pencil"></i> Adicionar Usuário</h2>

    <form method="post" enctype="multipart/form-data">
       
        <?php
            if(isset($_POST['acao'])){
                //enviei meu formulário
                $user = $_POST['user'];
                $nome = $_POST['nome'];
                $senha = $_POST['senha'];
                $imagem = $_FILES['imagem']; //não é obrigatório selecionar uma imgem
                $cargo = $_POST['cargo'];

                if($user == ''){
                    Painel::alert('erro', 'O login está vazio!');
                }else if($nome == ''){
                    Painel::alert('erro', 'O nome está vazio!');
                }else if($senha == ''){
                    Painel::alert('erro', 'O Senha está vazio!');
                }else if(strlen ($senha ) < 8){
                    Painel::alert('erro', 'A senha deve conter no mínimo 8 caracteres!');
                }else if($cargo == ''){
                    Painel::alert('erro', 'O cargo precisa está selecionado!');
                }else if($imagem['name'] == ""){
                    Painel::alert('erro', 'A iamgem precisa está selecionada!');
                }else{
                    if(Painel::imagemValida($imagem) == false){
                        Painel::alert('erro', 'O formato da imagem não está correto!');

                    }else if(Usuario::userExiste($user)){
                        Painel::alert('erro', 'Esse nome de usuário ja existe, selecione outro!'); 
                    }else{
                        //Pode casatrar no banco de dados!
                        $usuario = new Usuario();
                        $imagem = Painel::uploadFile($imagem);
                        $usuario->cadastrarUsuario($user,$senha,$imagem,$nome,$cargo);
                        Painel::alert('sucesso', 'O cadastro do usuário '.$user.' foi feito com sucesso!');
                    }
                }
                }
        ?>

        <div class="from-group">
            <label>Usuário:</label>
            <input type="text" name="user" require>
        </div><!--from-group-->

        <div class="from-group">
            <label>Nome:</label>
            <input type="text" name="nome" require>
        </div><!--from-group-->

        <div class="from-group">
            <label>Senha:</label>
            <input type="password" name="senha" require>
        </div><!--from-group-->

        <div class="from-group">
            <label>cargo:</label>
            <select name="cargo">
                <?php
                    foreach(Painel::$cargos as $kay => $value){
                        echo '<option value="'.$kay.'">'.$value.'</option>';
                    }
                ?>
            </select>
        </div><!--from-group-->


        <div class="from-group">
            <label>Imagem:</label>
            <input type="file" name="imagem" >
            
        </div><!--from-group-->

        <div class="from-group">
            <input type="submit" name="acao" value="Cadastrar!">
        </div><!--from-group-->

    </form>
</div><!--Box-content-->