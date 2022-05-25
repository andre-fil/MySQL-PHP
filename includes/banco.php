<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banco de dados</title>
</head>
<body>
    <pre>
        <?php

        #criar a conexão com o BD. Passar os parametros 'servidor', 'usuario','senha','nome do banco'

        $banco = new mysqli('localhost', 'root','','bd_livros');

        #verificar se a conexão deu certo, caso não, matar o processo;
        if($banco->connect_errno){
            "<p>erro $banco->errno --> $banco->connect_error</p>";
            die();
        }

        #Realizar uma query e guardar numa var

        $busca = $banco->query('select nome, nota from livros');

        #Verificar se a busaca deu certo
        if(!$busca){
            echo "<p>falha na busca! $banco->error</p>";
        }

        #guardar a busca na var e imprimir

        while($res = $busca->fetch_object()){
            print_r($res);
        }

        ?>



    </pre>
    
</body>
</html>



