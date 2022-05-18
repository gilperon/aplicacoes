<?php 

    /* OBS: Não foi utilizado padrao MVC, para simplificar o entendimento */
    
    include('callJWT.php'); //-> Inlcuimos o script para criar e verificar token JWT


        /* Passo 1: Solicitando os dados de acesso */
        if (!isset($_SERVER['PHP_AUTH_USER']))
        {
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            print "Sorry - you need valid credentials to be granted access!\n";
            exit;
        }
        else
        { 
            /* Passo 2: Verificando se os dados estão corretos */
            if (($_SERVER['PHP_AUTH_USER'] == 'gustavo') && ($_SERVER['PHP_AUTH_PW'] == '12345')) { 
                
                header('HTTP/1.0 200 OK'); 

                //$generate_jwt = gerenciarJWT($chave_api,1,NULL); //Criamos o Token (Metodo 1 -> funcao disponivel em funcaoJWT.php)
                $generate_jwt = createToken();

                //Decodificar JWT e retornar em formato ARRAY
                $decode_jwt = json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $generate_jwt)[1]))),true);

            }else{  
                header("WWW-Authenticate: Basic realm=\"Private Area\"");
                header("HTTP/1.0 401 Unauthorized");
                print "Sorry - you need valid credentials to be granted access!\n";
                exit;
            }
        }


?>
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
            <div class="col-8 p-5">
                    <h4 class="c-tabs-title">Bem vindo!</h4>

                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Informações</button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Fazer Requisicoes</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active c-tabs-box" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                            <!--Painel 1-->
                            <div class="d-flex flex-column justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="tabs-box w-100">
                                    <h3 class="h5 mb-2">Seu JWT token foi gerado com sucesso:</h3>
                                    <p>Basta copiar e colar o token nas suas requisições para receber privilegios.</p>
                                    <textarea style="width:500px;margin-top:5px;height:100px;"><?php echo $generate_jwt ?></textarea>
                                </div>
                            </div>
                            <div class="c-tabs-break-line"></div>
                            <div class="d-flex align-items-center">
                                <div class="tabs-box w-100">
                                    <h3 class="h5 mb-2">Dados do seu Token:</h3>
                                    <p>Nome da Empresa: <?php echo $decode_jwt["uname"] ?></p>
                                    <p>Origem do token: <?php echo $decode_jwt["iss"] ?></p>
                                </div>
                            </div>
                            <div class="c-tabs-break-line"></div>
                            <div class="d-flex align-items-center">
                                <div class="tabs-box">
                                    <h3 class="h5 mb-2">Como utilizar o token</h3>
                                    <p class="small pe-4">Clique na aba <b>Fazer Requisições</b> para poder adicionar, deletar ou listar usuarios.</p>
                                    <p class="small pe-4">Afim de facilitar a utilização desse script, o token sera enviado em cada requisição via POST por um campo hidden.</p>
                                    <p class="small pe-4">Se o token não estiver presente, ou for invalido o sistema negará a requisição.</p>
                                </div>
                            </div>
                            </div>
                            <!--End Painel 1-->

                        </div>
                        <div class="tab-pane fade c-tabs-box" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="tabs-box">
                                <h3 class="h5 mb-2">Controle do sistema</h3>
                                <p>Se voce tiver um token valido, voce pode fazer compras em bitcoin</p>
                                <form method="post" action="financeiro.php">
                                <input type="text" style="width:500px;margin-bottom:12px;height:38px;padding:5px 10px;" id="token" name="token" placeholder="Insira um token"><br>
                                <button type="submit" class="btn btn-primary">Verificar Acesso</button>
                            </div>
                        </div>
                    </div>


            </div>
            </div>
        </div>



    
</body>
</html>