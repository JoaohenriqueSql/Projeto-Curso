<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gerador de senhas</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.5/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
</head>

<body>
    <div class="container">
        <h2 class="title">Gerador de senhas</h2>
        <div class="result">
            <div class="result__title field-title">Senha gerada</div>
            <div class="result__info right">clique para copiar</div>
            <div class="result__info left">copiado</div>
            <div class="result__viewbox" id="result">CLIQUE EM GERAR</div>
            <button id="copy-btn" style="--x: 0; --y: 0"><i class="far fa-copy"></i></button>
        </div>
        <div class="length range__slider" data-min="6" data-max="16">
            <div class="length__title field-title" data-length='0'>Caracteres:</div>
            <input id="slider" type="range" min="6" max="16" value="11" />
            <!--poderá alterar o valor da quantidade maxima de caracteres | data-min/data-max para texto, min/max para caracteres-->
        </div>

        <div class="settings">
            <span class="settings__title field-title">definições</span>
            <div class="setting">
                <input type="checkbox" id="uppercase" checked />
                <label for="uppercase">Incluir maiúsculas</label>
            </div>
            <div class="setting">
                <input type="checkbox" id="lowercase" checked />
                <label for="lowercase">Incluir minúsculas</label>
            </div>
            <div class="setting">
                <input type="checkbox" id="number" checked />
                <label for="number">Incluir números</label>
            </div>
            <div class="setting">
                <input type="checkbox" id="symbol" />
                <label for="symbol">Incluir símbolos</label>
            </div>
        </div>

        <button class="btn generate" id="generate">Gerar senha</button>
    </div>

    <script src="js/script.js"></script>

</body>

</html>