<nav class="navbar navbar-expand-lg navbar-light MenuTopo">
    
        <div class="col-lg-2 text-center">
            <?php if(isset($_SESSION['statusLogin']) && $_SESSION['statusLogin'] == 1){ ?>
            <a class="navbar-brand text-white" href="ProfileUI.php">
            <?php }else{ ?>
                <a class="navbar-brand text-white" href="../../index.php">
            <?php } ?>
                
                <img src="../../img/misc/logo.png" class="ImgLogo">
                
                
            </a>
        </div>

       <?php if(isset($_SESSION['statusLogin']) && $_SESSION['statusLogin']!=0){ ?>
        
        <div class="col-lg-1">
            <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
        </div>

        <div class="col-lg-1">
            <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
        </div>
        
        <div class="col-lg-4">

            <form class="form-inline FormPesquisa" action="ListaEmpresasUI.php" method="POST">
                <div class="input-group mb-2 mr-sm-2"  style="margin-top:5px;padding-left: 35px;">


                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-search"></i></span>
                    </div>
                    <input list="empresas" name="HTML_nome" placeholder="Pesquisar Empresas" class="form-control" style="width:280px;">
                                <datalist id="empresas">
                                <?php
                                    $objBDEmp = new EmpresasDAO();
                                    $emp = $objBDEmp->listarEmpresas("","",0);
                                    ?>

                                    <?php
                                    for ($i = 0; $i < count($emp); $i++) {
                                        ?>
                                        <option value="<?=$emp[$i]->getNomeFantasia();?>"><?= $emp[$i]->getNomeFantasia();?></option>

                                    <?php } ?>

                                </datalist> 
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <input type="hidden" name="tipo" value="1">
                            <button type="submit" class="" style="border-width:0px;">
                                Buscar
                            </button>

                        </div>
                    </div>
                </div>
                <input type="hidden" name="busca" value="1">
            </form>

        </div>

        <div class="col-lg-2 justify-content-md-center text-white text-center">
            <font class="TextoDados">
            Olá, <?=$_SESSION['nome'];?>             
            <br>
            <?=$_SESSION['horaLogin'];?>             
            </font>
        </div> 
         <div class="col-lg-1">
            <a class="nav-link active text-white" aria-current="page" href="#">
                <img src="../../img/users/<?=$_SESSION['imagem']?>" class="img-fluid rounded ImgPerfilMini border border-light">
            </a>
        </div>
    

        <div class="navbar-nav col-lg-1 justify-content-md-center">
            <a href="../Control/UsuariosControl.php?exec=2" class="text-light">                
                <font class="LinkTopo">
                    <i class="fa fa-sign-out fa-2x"></i>                    
                </font>
            </a>
        </div> 
            
            <?php } ?> 
    
</nav>