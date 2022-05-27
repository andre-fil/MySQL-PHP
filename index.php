<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilos/css.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Livros</title>
    <?php
    function thumb ($arq){
        $caminho = "fotos/$arq";
        if (is_null($arq) || !file_exists($caminho)){
            return "fotos/indis.png";
        } else{
            return $caminho;
        }
    }

    ?>

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
                #definindo um objeto de busca - pegando todos os registros da tabela livros
                $busca = $banco->query("select * from livros order by nome");

                #verificando se a busca foi bem sucedida//se retornou algum registro
                if(!$busca){
                    echo"<tr><td>Foi encontrado um erro na busca!</td></tr>";
                }else{

                    #num_rows = atributo que define quantos resultados foram retornados
                    if($busca->num_rows == 0){
                        echo "<tr><td>Não foi retornado nenhum registro!</td></tr>";
                    } else{

                        #pegando o resultado das buscas na var reg e mostrando cada campo
                        while($reg = $busca->fetch_object()){
                            $t = thumb($reg->capa);
                            echo"<tr><td><img src='$t' class='mini'/> <td>$reg->nome";
                            echo"<td>info";
                        }
                    }
                }
            ?>
           
        </table>
    </div>
</body>
</html>

<img src="" alt="" srcset="">