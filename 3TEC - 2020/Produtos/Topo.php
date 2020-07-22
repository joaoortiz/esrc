<nav class="navbar navbar-expand-lg BarraTopo">
    <div class="collapse navbar-collapse">
        
        <div class="nav navbar-brand col-lg-1">
            <a href="index.php">    
                <img src="img/Logo.png" class="Logo">
            </a>
        
        </div>
      
        <div class="navbar nav col-lg-7">
          
            <?php
            
            $sqlCat = "Select * from categorias";
            $rsCat = mysqli_query($vConn, $sqlCat) or die (mysqli_error($vConn));
            
            while($tblCat = mysqli_fetch_array($rsCat)){                 
            ?>
            
            <a href="index.php?cc=<?=$tblCat['codigo_CATEGORIA']?>" class="LinksTopo">
                <?=$tblCat['nome_CATEGORIA']?>
            </a>
            
            
            <?php
            }
            ?>
            
        </div>
        
        <div class="navbar nav col-lg-2">
            
            <form class="form-inline FormPesquisa" action="index.php" method="POST">
                <div class="input-group mb-2 mr-sm-2" style="margin-top:18px;">
                                       
                    <input type="text" class="form-control" name="HTML_produto">
                    
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
            </center>
            
        </div>
        
        
        <div class="col-lg-2" style="padding-left:90px;">
            
            <?php if(!isset($_SESSION['statusLogin'])){ ?>
            
            <button class="btn btn-light" data-toggle="modal" data-target="#FormCadastroUsuario">
                <i class="fa fa-user-plus fa-2x text-black"></i>
            </button>

            <button class="btn btn-light" data-toggle="modal" data-target="#FormLogin">
                <i class="fa fa-sign-in fa-2x text-black"></i> 
            </button>
            
            <?php }else{ ?>
            
            <a href="Painel.php">
            <center>
            <i class="fa fa-user fa-2x text-white"></i>
            <br>
            <font class="TextoProduto text-white">
                <?=$_SESSION['login'];?>
            </font>
            </center>
            </a>
            
            <?php }?>
            
        </div>
        
    </div>   
</nav>