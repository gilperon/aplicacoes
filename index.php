<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5.0 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>JWT Autenticador</title>
    <style>
        body{background:#F9F9F9;}
        .tabs-box p{margin-bottom:5px;}
        .tabs-box > h3{color:#73879c;font-weight: 600;}
        .c-tabs-box{border:1px solid #dfe3e7;border-top:0;background:#fff;padding:15px 20px;border-radius: 0 0 5px 5px;}
        .c-tabs-title{color:#73879c;padding:0 2px 10px;}
        .c-tabs-break-line{height:20px;}
    </style>
</head>
<body>

        <div class="container">
            <div class="row">
            <div class="col-12 p-5">
                    <h4 class="c-tabs-title">Script para autenticações (JWT Tokens - PHP Puro) </h4>

                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Informações</button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Credenciais</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active c-tabs-box" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                            <!--Painel 1-->
                            <div class="d-flex flex-column justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="tabs-box">
                                    <h3 class="h5 mb-2">Informações</h3>
                                    <p class="small pe-4">Esse script irá criar um token JWT, para ser utilizados em autenticações, aplicações (API RESTful) bem como controlar acessos ao sistema.</p>
                                    <p class="small pe-4">Em uma aplicação existem diversas maneiras para manipular e gerenciar acessos, seja por SESSION, Banco de dados, etc...</p>
                                    <p class="small pe-4">O intuito desse código é mostrar uma método eficiente de autenticação afim de economizar recursos do servidor, pois desse modo não será preciso armazenar SESSIONS e nem fazer demasiadas consultas ao banco de dados.</p>
                                    <p class="small pe-4">Existem bibliotecas prontas para isso como firebase/php-jwt, mas como o intuito é agregar conhecimento fiz uma versão do zero em <b>php puro</b>, sem precisar composer ou biblioteca exeterna que demanda de muitos arquivos.</p>
                                    <p class="small pe-4">Afim de simplificar o entendimento, não foi utilizado padrão MVC e orientação a objeto nesse repositório.</p>
                                </div>
                            </div>
                            <div class="c-tabs-break-line"></div>
                            <div class="d-flex align-items-center">
                                <div class="tabs-box">
                                    <h3 class="h5 mb-2">Como utilizar</h3>
                                    <p class="small pe-4">Nesse código, o intuito é mostrar apenas a funcionalidade (back-end), então o front não foi desenvolvido.</p>
                                    <p class="small pe-4">Clique na aba <b>Credenciais</b> para copiar seus dados de acesso.</p>
                                    <p class="small pe-4">Em seguida, faça <b>Login</b>, para gerar seu token JWT.</p>
                                </div>
                            </div>
                            </div>
                            <!--End Painel 1-->

                        </div>
                        <div class="tab-pane fade c-tabs-box" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="tabs-box">
                                <h3 class="h5 mb-2">Dados de acesso</h3>
                                <p class="small pe-4">Login: <b>gustavo</b><br>Senha: <b>12345</b></p>
                                <p class="small pe-4">Clique em Login para gerar seu token.</p>
                                <a class="btn btn-sm btn-success" href="login.php">Fazer Login</a>
                            </div>
                        </div>
                    </div>


            </div>
            </div>
        </div>



    
</body>
</html>