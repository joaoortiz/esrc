<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#7953B3;">
    <div class="container-fluid">

        <div class="col-lg-2">
            <a class="navbar-brand text-white" href="#">Tecjobs</a>
        </div>

        <div class="col-lg-1">
            <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
        </div>

        <div class="col-lg-1">
            <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
        </div>



        <div class="col-lg-4">
            
            <form class="form-inline FormPesquisa" action="index.php" method="POST">
                <div class="input-group mb-2 mr-sm-2"  style="margin-top:5px;">
                                       
                    <input type="text" class="form-control" name="HTML_produto" placeholder="Pesquisar Empresas">
                    
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <button type="submit" class="" style="border-width:0px;">
                                <i class="fa fa-md fa-search"></i>
                            </button>
                            
                        </div>
                    </div>
                </div>
                <input type="hidden" name="busca" value="1">
            </form>
            
        </div>
        
        <div class="col-lg-3">
            <?php
            if(isset($_SESSION['permissao']) &&$_SESSION['permissao'] != 0){
            ?>
            <?=$_SESSION['nome'];?>
            
            <a href="../Control/Logoff.php">Sair</a>
            <?php
            }
            ?>
        </div>
    </div>
</div>
</nav>