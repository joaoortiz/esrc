<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <link rel="stylesheet" href="../../assets/css/estilo.css">


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script type="text/javascript">

            $(document).ready(function() {

                $('#submit').click(function()
                {
                    var value = $('#listTecn').val();
                    alert($('#tecnologias [value="' + value + '"]').data('value'));
                });
            });

        </script>

        <title>::TecJobs - Professional Networking ::</title>
    </head>
    <body>

        <?php
        require_once "../DAO/EmpresasDAO.php";
        require_once "../DAO/CandidatosDAO.php";
        require_once "../DAO/TecnologiasDAO.php";
        require_once "../Model/Tecnologias.php";
        session_start();

        $objBDEmp = new EmpresasDAO();
        $id = $objBDEmp->consultarUltimaEmpresa();
        $objEmp = $objBDEmp->consultarEmpresa($id);
        
        
        $objBDCand = new CandidatosDAO();
        $idC = $objBDCand->consultarUltimoCandidato();
        $objCand = $objBDCand->consultarCandidato($idC);

        include "TopoUI.php";
        ?>

        <div class="container">



            <?php
            $step = $_GET['step'];
            /*             * **************************************************** STEP 1 ***************************************************** */
            if ($step == 1) {
                ?>
                <div class=" animate__animated animate__zoomIn">
                    <div class="row justify-content-md-center" style="margin-top:150px;">
                        <div class="col-lg-12 text-center text-dark" style="height:150px;">
                            <h2>Seja bem vindo ao TECJOBS</h2>
                            <h3>Quero me cadastrar como:</h3>
                        </div>
                    </div>
                    <div class="row justify-content-md-center">
                        <div class="col-lg-6 text-center">
                            <a href="?step=2&type=3" class="text-dark">
                                <img src="../../img/misc/user.png" class="ImgUser">
                                <h4>Candidato</h4>
                            </a>
                        </div>
                        <div class="col-lg-6 text-center">
                            <a href="?step=2&type=2" class="text-dark">
                                <img src="../../img/misc/company.png" class="ImgUser">
                                <h4>Empresa</h4>
                            </a>
                        </div>

                    </div>
                </div>

                <?php
                /*                 * **************************************************** STEP 2 ***************************************************** */
            } else if ($step == 2) {
                $type = $_GET['type'];
                if ($type == 3) {
                    ?>
                    <form action="../Control/UsuariosControl.php" method="post" enctype="multipart/form-data">
                        <div class="row justify-content-md-center" style="margin-top: 25px;margin-bottom:25px;">
                            <div class="col-lg-2">
                                <img src="../../img/misc/user.png" class="ImgUser">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-12 text-center">
                                <center><h4 class="text-dark">Dados Pessoais</h4></center>
                                <hr>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Email</label>
                                <input type="email" class="form-control" name="HTML_email" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Nome Completo</label>
                                <input type="text" class="form-control" name="HTML_nomeCompleto" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Senha</label>
                                <input type="password" class="form-control" name="HTML_senha" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputPassword4">Confirmar Senha</label>
                                <input type="password" class="form-control"  name="HTML_confSenha" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Data de Nascimento</label>
                                <input type="date" class="form-control" name="HTML_dataNascimento" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Sexo</label>
                                <select class="form-control" name="HTML_sexo">
                                    <option value="M">Masculino</option>
                                    <option value="F">Feminino</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-12 text-center" style="margin-top: 15px;">
                                <center><h4 class="text-dark">Localização e Contato</h4></center>
                                <hr>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Cep</label>
                                <input type="text" class="form-control" name="HTML_cep" required>
                            </div>
                            <div class="form-group col-md-7">
                                <label>Endereço</label>
                                <input type="text" class="form-control" name="HTML_endereco" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Número</label>
                                <input type="text" class="form-control" name="HTML_numero" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Complemento</label>
                                <input type="text" class="form-control"  name="HTML_complemento">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Bairro</label>
                                <input type="text" class="form-control" name="HTML_bairro" required>

                            </div>
                            <div class="form-group col-md-3">
                                <label>Cidade</label>
                                <input type="text" class="form-control" name="HTML_cidade" required>
                            </div>
                        </div>

                        <div class="form-row" style="margin-bottom:10px;">
                            <div class="form-group col-md-6">
                                <label>Telefone</label>
                                <input type="text" class="form-control" id="inputCity" name="HTML_telefone" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Imagem</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input"  name="HTML_imagem">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>

                            </div>

                        </div>
                        <div class="form-row" style="margin-bottom:10px;">
                            <div class="form-group col-md-6">
                                <label>Linkedin</label>
                                <input type="text" class="form-control" id="inputCity" name="HTML_linkedin">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Website</label>
                                <input type="text" class="form-control" id="inputCity" name="HTML_website">

                            </div>

                        </div>
                        <input type="hidden" name="exec" value="3">
                        <input type="hidden" name="type" value="3">


                        <button type="submit" class="btn float-right BotaoLogin">Cadastrar Candidato</button>
                    </form>

                    <?php
                } else if ($type == 2) {
                    ?>    
                    <form action="../Control/UsuariosControl.php" method="post" enctype="multipart/form-data">
                        <div class="row justify-content-md-center" style="margin-top: 25px;margin-bottom:25px;">
                            <div class="col-lg-2">
                                <img src="../../img/misc/company.png" class="ImgUser">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-12 text-center">
                                <center><h4 class="text-dark">Dados Empresariais</h4></center>
                                <hr>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Email</label>
                                <input type="email" class="form-control" name="HTML_email" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Nome Fantasia</label>
                                <input type="text" class="form-control" name="HTML_nomeFantasia" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Senha</label>
                                <input type="password" class="form-control" name="HTML_senha" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Confirmar Senha</label>
                                <input type="password" class="form-control" name="HTML_confSenha" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Categoria</label>
                                <select class="form-control" name="HTML_categoria">
                                    <?php
                                    $objEmpresa = new EmpresasDAO();
                                    $cat = $objEmpresa->listarCategorias();
                                    for ($i = 0; $i < count($cat); $i++) {
                                        ?>
                                        <option value="<?= $cat[$i]->getId(); ?>"><?= $cat[$i]->getNome(); ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>


                            </div>

                        </div>
                        <div class="form-row">
                            <div class="col-lg-12 text-center" style="margin-top: 15px;">
                                <center><h4 class="text-dark">Localização e Contato</h4></center>
                                <hr>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Cep</label>
                                <input type="text" class="form-control" name="HTML_cep" required>
                            </div>
                            <div class="form-group col-md-7">
                                <label>Endereço</label>
                                <input type="text" class="form-control" name="HTML_endereco" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Número</label>
                                <input type="text" class="form-control" name="HTML_numero" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Complemento</label>
                                <input type="text" class="form-control" name="HTML_complemento" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Bairro</label>
                                <input type="text" class="form-control" name="HTML_bairro" required>

                            </div>
                            <div class="form-group col-md-3">
                                <label>Cidade</label>
                                <input type="text" class="form-control" name="HTML_cidade" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">Telefone</label>
                                <input type="text" class="form-control" name="HTML_telefone" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCity">Imagem</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="HTML_imagem">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>

                            </div>

                        </div>
                        <input type="hidden" name="exec" value="3">
                        <input type="hidden" name="type" value="2">
                        <button type="submit" class="btn float-right BotaoLogin">Cadastrar Empresa</button>
                    </form>

                    <?php
                }

                /*                 * **************************************************** STEP 3 ***************************************************** */
            } else if ($step == 3) {
                $type = $_GET['type'];
                if ($type == 2) {
                    ?>

                    <form action="../Control/UsuariosControl.php" method="POST">
                        <div class="row justify-content-md-center" style="margin-top: 25px;margin-bottom:25px;">
                            <div class="col-lg-2">
                                <img src="../../img/users/<?= $objEmp->getImagem(); ?>" class="ImgUser">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-12 text-center" style="margin-top: 15px;">
                                <center><h4 class="text-dark">Nos conte um pouco sobre sua empresa</h4></center>                                                            
                            </div>
                        </div>
                        <div class="form-row justify-content-md-center">
                            <div class="col-lg-8 text-center" style="margin-top: 15px;">
                                <textarea class="form-control" rows="10" name="HTML_info"></textarea>                                
                            </div>                             
                        </div>
                        <div class="form-row justify-content-md-center">
                            <div class="col-lg-8 text-center" style="margin-top: 15px;">

                                <input type="hidden" name="idEmp" value="<?= $id; ?>">
                                <input type="hidden" name="exec" value="4">
                                <input type="hidden" name="type" value="2">
                                <button type="submit" class="btn  BotaoLogin float-right">Registrar Informações</button>                                
                            </div>                             
                        </div>

                    </form>

                    <?php } else if ($type == 3) {
                    ?>

                    <form action="../Control/UsuariosControl.php" method="POST">
                        <div class="row justify-content-md-center" style="margin-top: 25px;margin-bottom:25px;">
                            <div class="col-lg-2">
                                <img src="../../img/users/<?= $objCand->getImagem(); ?>" class="ImgUser">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-12 text-center" style="margin-top: 15px;">
                                <center><h4 class="text-dark">Nos conte um pouco sobre você.</h4></center>                                                            
                            </div>
                        </div>
                        <div class="form-row justify-content-md-center">
                            <div class="col-lg-8 text-center" style="margin-top: 15px;">
                                <textarea class="form-control" rows="10" name="HTML_bio"></textarea>                                
                            </div>                             
                        </div>
                        <div class="form-row justify-content-md-center">
                            <div class="col-lg-8 text-center" style="margin-top: 15px;">

                                <input type="hidden" name="idCand" value="<?= $idC; ?>">
                                <input type="hidden" name="exec" value="4">
                                <input type="hidden" name="type" value="3">
                                <button type="submit" class="btn  BotaoLogin float-right">Registrar Informações</button>                                
                            </div>                             
                        </div>

                    </form>            

                    <?php
                }
                /*                 * **************************************************** STEP 4 ***************************************************** */
            } else if ($step == 4) {
                $type = $_GET['type'];


                if ($type == 2) {
                    ?>
                    <div class="row justify-content-md-center" style="margin-top: 25px;margin-bottom:25px;">
                        <div class="col-lg-2">
                            <img src="../../img/users/<?= $objEmp->getImagem(); ?>" class="ImgUser">
                        </div>
                    </div>
                    <form action="../Control/UsuariosControl.php" method="GET"> 
                        <div class="form-row justify-content-md-center">
                            <div class="col-lg-12 text-center" style="margin-top: 15px;">
                                <hr>
                                <center><h4 class="text-dark">Diga-nos o que você procura</h4></center>                                           
                            </div> 
                        </div>
                        <div class="form-row justify-content-md-center">
                            <div class="col-lg-6" style="margin-top: 15px;">
                                <label>Insira o nome da tecnologia</label>
                                <input list="tecnologias" name="HTML_tecnologias" class="form-control" id="listTecn">
                                <datalist id="tecnologias">
                                    <?php
                                    $objBDTec = new TecnologiasDAO();
                                    $tecn = $objBDTec->listarTecnologias(0,0);
                                    ?>

                                    <?php
                                    for ($i = 0; $i < count($tecn); $i++) {
                                        ?>
                                        <option data-value=<?= $tecn[$i]->getNome(); ?> value="<?= $tecn[$i]->getId() . " - " . $tecn[$i]->getNome(); ?>"></option>

                                    <?php } ?>

                                </datalist> 

                            </div>                             
                            <div class="col-lg-3 text-center" style="margin-top: 15px;padding-top:32px;">
                                <input type="hidden" name="step" value="4">
                                <input type="hidden" name="type" value="2">                                
                                <input type="hidden" name="exec" value="5">                                 
                                <button type="submit" id="btnAddTec" class="btn BotaoLogin text-white" Adicionar Tecnologia</button>
                                <a class="btn text-white BotaoLogin" href="../Control/UsuariosControl.php?exec=6">
                                    Limpar
                                </a>


                            </div>                             
                        </div>

                        <div class="form-row justify-content-md-center" style="margin-top: 15px;">
                            <div class="col-lg-8" id="DivTecnologias">
                                <div class="row">

                                    <?php
                                    if ($_SESSION['necessidades'] != NULL) {
                                        $vImgs = explode(";", $_SESSION['necessidades']);


                                        for ($i = 0; $i < count($vImgs) - 1; $i++) {

                                            $objTec = new Tecnologias();
                                            $objTec = $objBDTec->consultarTecnologia($vImgs[$i]);
                                            ?>
                                            <div class="card col-lg-2">
                                                <div class="card-body">
                                                    <img src="../../img/tech/<?= strtolower($vImgs[$i]) . ".png"; ?>" class="Icones">
                                                    <h5 class="card-title"><?= $objTec->getNome(); ?></h5>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>

                            </div>                            
                        </div>
                        <div class="form-row justify-content-md-center" style="margin-top: 15px;">
                            <div class="col-lg-12 text-center">
                                <a class="btn  BotaoLogin" href="../Control/UsuariosControl.php?exec=7&idEmp=<?= $id ?>" style="background-color:#7952B3;width:350px;height:40px;">
                                    Finalizar cadastro
                                </a>

                            </div>                            
                        </div>
                    </form>
                    <?php
                }else if($type == 3){?>
                    <div class="row justify-content-md-center" style="margin-top: 25px;margin-bottom:25px;">
                        <div class="col-lg-2">
                            <img src="../../img/users/<?= $objCand->getImagem(); ?>" class="ImgUser">
                        </div>
                    </div>
                    <form action="../Control/UsuariosControl.php" method="GET"> 
                        <div class="form-row justify-content-md-center">
                            <div class="col-lg-12 text-center" style="margin-top: 15px;">
                                <hr>
                                <center><h4 class="text-dark">Selecione seus conhecimentos</h4></center>                                           
                            </div> 
                        </div>
                        <div class="form-row justify-content-md-center">
                            <div class="col-lg-6" style="margin-top: 15px;">
                                <label>Insira o nome da tecnologia</label>
                                <input list="tecnologias" name="HTML_tecnologias" class="form-control" id="listTecn">
                                <datalist id="tecnologias">
                                    <?php
                                    $objBDTec = new TecnologiasDAO();
                                    $tecn = $objBDTec->listarTecnologias(0,0);
                                    ?>

                                    <?php
                                    for ($i = 0; $i < count($tecn); $i++) {
                                        ?>
                                        <option data-value=<?= $tecn[$i]->getNome(); ?> value="<?= $tecn[$i]->getId() . " - " . $tecn[$i]->getNome(); ?>"></option>

                                    <?php } ?>

                                </datalist> 

                            </div>                             
                            <div class="col-lg-3 text-center" style="margin-top: 15px;padding-top:32px;">
                                <input type="hidden" name="step" value="4">
                                <input type="hidden" name="type" value="3">                                
                                <input type="hidden" name="exec" value="8">                                 
                                <button type="submit" id="btnAddTec" class="btn  BotaoLogin">Adicionar Tecnologia</button>
                                <a class="btn  BotaoLogin" href="../Control/UsuariosControl.php?exec=9">
                                    Limpar
                                </a>


                            </div>                             
                        </div>

                        <div class="form-row justify-content-md-center" style="margin-top: 15px;">
                            <div class="col-lg-8" id="DivTecnologias">
                                <div class="row">

                                    <?php
                                    if ($_SESSION['conhecimentos'] != NULL) {
                                        $vImgs = explode(";", $_SESSION['conhecimentos']);


                                        for ($i = 0; $i < count($vImgs) - 1; $i++) {

                                            $objTec = new Tecnologias();
                                            $objTec = $objBDTec->consultarTecnologia($vImgs[$i]);
                                            ?>
                                            <div class="card col-lg-2">
                                                <div class="card-body">
                                                    <img src="../../img/tech/<?= strtolower($vImgs[$i]) . ".png"; ?>" class="Icones">
                                                    <h5 class="card-title"><?= $objTec->getNome(); ?></h5>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>

                            </div>                            
                        </div>
                        <div class="form-row justify-content-md-center" style="margin-top: 15px;">
                            <div class="col-lg-12 text-center">
                                <a class="btn  BotaoLogin" href="../Control/UsuariosControl.php?exec=10&idCand=<?= $idC ?>" style="background-color:#7952B3;width:350px;height:40px;">
                                    Finalizar cadastro
                                </a>

                            </div>                            
                        </div>
                    </form>
            
            
            
                <?php    
                }
            }
            ?>
        </div>
    </body>
</html>