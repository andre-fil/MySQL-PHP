<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="modelo/css.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Livros</title>
</head>
<body>
    <?php
        #include "includes/banco.php"
        require_once "includes/banco.php"
    ?>
    <div id="corpo">
        <h1>Escolha seu livro</h1>
        <table class="listagem">
            <?php
                $busca = $banco->query("select * from livros order by nome");

                if(!$busca){
                    echo"<tr><td>Foi encontrado um erro na busca!</td></tr>";
                }else{
                    if($busca->num_rows == 0){
                        echo "<tr><td>Não foi retornado nenhum registro!</td></tr>";
                    } else{
                        while($reg = $busca->fetch_object())
                        echo "<tr><td>$reg->capa</td><td>$reg->nome</td></tr>";
                    }
                }
            ?>
           
        </table>
    </div>
</body>
</html>