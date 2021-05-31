<div class="box-content left w100">
    <h2><i class="fas fa-window-restore"></i>Usuários do Painel</h2>
    <div class="table-responsive">
        <div class="row">
            <div class="col">
                <span>Nome</span>
            </div> <!--col-->
            <div class="col">
                <span>Cargo</span>
            </div> <!--col-->
            <div class="clear"></div>
        </div><!--row-->
        <?php
            $usuariosPainel = MySql::conectar()->prepare("SELECT * FROM tb_admin_usuarios");
            $usuariosPainel->execute();
            $usuariosPainel = $usuariosPainel->fetchAll();
            foreach($usuariosPainel as $kay => $value){
        ?>

        <div class="row">
            <div class="col">
                <span><?php echo $value['user']?></span>
            </div> <!--col-->
            <div class="col">
                <span><?php echo pegarCargo($value['cargo']);?></span>
            </div> <!--col-->
            <div class="clear"></div>

        </div><!--row-->
        <?php } ?>

    </div><!--table-responsive-->

</div>