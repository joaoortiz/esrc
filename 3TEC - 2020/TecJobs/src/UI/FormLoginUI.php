<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../../assets/css/estilo.css">
        <title></title>
    </head>
    <body>
        <div class="container">
            <div class="col-md-12 text-center">

            </div>
            <center>
                <div class="col-md-6 border" style="margin-top:50px; border-radius: 20px;">
                    <form action="src/Control/UsuariosControl.php" method="post">
                        <h5 style="margin: 20px;">Insira os dados abaixo para acesso</h5>



                        <div class="form-group">

                            <div class="input-group CaixaTexto">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-envelope fa- fa-fw"></i></span>
                                </div>
                                <input type="text" name="HTML_email" placeholder="Informe o login de usuário" class="form-control">
                            </div>

                        </div>



                        <div class="form-group">

                            <div class="input-group CaixaTexto">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-key fa- fa-fw"></i></span>
                                </div>
                                <input type="password" name="HTML_senha" placeholder="Informe a senha" class="form-control">
                            </div>
                        </div>

                        
                        
                        <div class="form-group">

                            <a href="src/UI/FormCadastroUsuarioUI.php"><button class="btn btn-outline-primary">Quero me cadastrar</button></a>
                            <input type = "hidden" name="acao" value="1">

                            <button type="submit" class="btn btn-outline-primary">
                                <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                Acessar sistema

                            </button>
                        </div>



                    </form>
                </div>
            </center>



        </div>
    </body>
</html>