<html>

    <head>

        <meta charset="utf-8">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="css/estilo.css" type="text/css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>

    <body>

        <?php
        session_start();
        $permissao = $_SESSION['permissao'];

        include "Conexao.php";
        include "Topo.php";
        ?>

        <div class="container-fluid">

            <?php
            if ($permissao == 1) {
                include "HomeAdm.php";
            } else if ($permissao == 2) {
                include "HomeUser.php";
            }
            ?>

            <hr>

            <?php
            if (isset($_GET['idPg'])) {
                $idPg = $_GET['idPg'];

                if ($idPg == 20)
                    include "ListaEstoque.php";
                else if($idPg == 23)
                    include "FormAlteraProduto.php";
            }else{
                include "FormCadastroProduto.php";
            }
            ?>

        </div>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>

    <script>
        var max_fields = 4;
        var wrapper = $(".inputs");
        var add_button = $("#adicionarcampo");

        var x = 1;
        $(add_button).click(function(e) {
            e.preventDefault();
            var length = wrapper.find("input:text.textAdded").length;

            if (x <= max_fields) {
                x++;
                $(wrapper).append('<div class="row LinhaForm"><div class="col"><label class="TextoForm">Imagem:</label><div class="input-group"  style="width:500px;"><div class="input-group-prepend"><span class="input-group-text" id="inputGroupFileAddon01">Upload</span></div><div class="custom-file"><input type="file" name="HTML_foto[]" class="custom-file-input"/><label class="custom-file-label" for="inputGroupFile01">Choose file</label></div></div></div><a href="#" class="remove_field">Remover</a></div>');
            }

        });

        $(wrapper).on("click", ".remove_field", function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })

          // popovers initialization - on hover
   $('[data-toggle="popover-hover"]').popover({
      html: true,
      trigger: 'hover',
      placement: 'right',
      content: function () {return '<img src="' + $(this).data('img') + '" width=120 height=40/>';}
    });
    </script>






</html>
