<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZCOND</title>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="login.css">
    <link rel="shortcut icon" href="./imagem/favicon.png">
</head>
<body>
<iframe src="header.html"></iframe>
    <main>
        <form class="hamburguer" action="loginteste.php" method="POST">
            <h1>FAÇA O SEU <span style="color:#0D83F0E5;">LOGIN</span> AGORA</h1>
            <br>
                <div class="formulario">
                    <input class="caixa" type="text" name="email" placeholder="Digite seu e-mail..." autocomplete="off" />
                    <br>
                    <input class="caixa2" type="password" name="senha" placeholder="Digite sua senha..." autocomplete="off"/>
                </div>
            
                <div class="macarrao">
                    <input class="botão" type="submit" name="submit" id="button" value="Enviar">
                    <div>
                        <a href="cadastramento.php"><p>Não possui conta?</p></a>
                    </div>
                </div>       
        </form>
        <img class="imagem" src="/PROJETO/imagem/4957136 1.png">
    </main>
    
</body>
</html>