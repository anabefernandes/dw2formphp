<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inria+Sans:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Madimi+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro concluido!</title>
</head>
<body>
    <?php
        if($_POST){
            $destino = 'imagens/' . $_FILES['Foto']['name'];
            $arquivo_tmp = $_FILES['Foto']['tmp_name'];
            move_uploaded_file( $arquivo_tmp, $destino  );

            $nomeCompleto=$_POST['nome'];
            $email=$_POST['email'];
            $senha=$_POST['senha'];
            $dataNascimento=$_POST['dataNascimento'];
            $cidade=$_POST['cidade'];
            $estado=$_POST['estado'];
            $sexo=$_POST['sexo'];
            $arrayInteresses=$_POST['interesses'];
            $sobre=$_POST['sobre'];
            $cor=$_POST['cor'];

            list($ano, $mes, $dia) = explode('-', $dataNascimento);
            $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
            $nascimento = mktime(0, 0, 0, $mes, $dia, $ano);
            $idade = floor((((($hoje - $nascimento)/60)/60)/24)/365.25);

            echo "<div class='divDetalhada'>
            <style>
            .divDetalhada{
                background-color: $cor;
            }
            </style>";

            echo "<header>
            <h1>Cadastro concluído. Parabéns!</h1>
            </header>";

            echo "<div class='resposta'><label>Nome completo: </label>" . $nomeCompleto . "</div>";
            echo "<div class='resposta'><label>Email: </label>" .$email. "</div>";
            echo "<div class='resposta'><label>Senha: </label>" .$senha. "</div>";
            echo "<div class='resposta'><label>Data de nascimento: </label>" .$dataNascimento. "</div>";
            echo "<div class='resposta'><label>Idade: </label>" .$idade. " anos</div>";
            echo "<div class='resposta'><label>Cidade: </label>" .$cidade. "</div>";
            echo "<div class='resposta'><label>Estado: </label>" .$estado. "</div>";
            echo "<div class='resposta'><label>Sexo: </label>" .$sexo. "</div>";
            echo "<div class='resposta'><label>Interesses: </label></div>";
            foreach($arrayInteresses as $interesse){
                echo "<div class='resposta'>" .$interesse. "</div>";
            }
            echo "<div class='resposta'><label>Sobre você: </label>" .$sobre. "</div>";
            echo "<div class='resposta'><label>Cor escolhida em hexadecimal: </label>" .$cor. "</div>";
            echo "<img src='" . $destino . "' alt='Minha Foto'>";
            echo "<div class='nomes'><label>Ana Fernandes | Gabriel Rigoni | José Leão</label></div>";
            echo "</div>";

        }
    ?>
</body>
</html>