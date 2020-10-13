<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <link rel="stylesheet" type="text/css" href="/css/custom.css">
    <title>Controle de Estoque Laravel</title>
</head>
<body>
    <div class="container">

        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/">
                        Sistema de Gerenciamento de Estoque
                    </a>
                </div>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/produtos">Produtos</a></li>
                    <li><a href="/produtos/novo">Cadastrar</a></li>
                </ul>
            </div>
        </nav>

        @yield('conteudo')

        <div id="clear"></div>

        <footer class="footer">
            <p>Todos os Direitos Reservados</p>
        </footer>

    </div>
</body>
</html>
