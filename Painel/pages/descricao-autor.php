<?php
    verificaPermissaoPagina(2);
?>

<div class="box-content">
    <h2><i class="fa fa-pencil"></i> Descrição Autor</h2>

    <form method="post" enctype="multipart/form-data">
       
        <?php
            if(isset($_POST['acao'])){
                if(Painel::insert($_POST)){
                    Painel::alert('sucesso', 'Cadastro relizado com suceso!');
                }else{
                    Painel::alert('erro', 'Campos vazios não são permitidos!');
                }   
            }       
        ?>

        <div class="from-group">
            <label>Nome:</label>
            <input type="text" name="nome" require>
        </div><!--from-group-->

        
        <div class="from-group">
            <label>Descricão do autor:</label>
            <textarea name="descricao"></textarea>
        </div><!--from-group-->


        <div class="from-group">
            <label>Imagem:</label>
            <input type="file" name="imagem" >
            
        </div><!--from-group-->

        <div class="from-group">
            <input type="hidden" name="nome_tabela" value="tb_site_descricaoat">
            <input type="submit" name="acao" value="Cadastrar!">
        </div><!--from-group-->

    </form>
</div><!--Box-content-->