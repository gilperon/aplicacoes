<?php 

    /* OBS: Não foi utilizado padrao MVC, para simplificar o entendimento */

    include('callJWT.php'); //-> Inlcuimos o script para criar e verificar token JWT

   
    /* Passo 1: Verifica se o token foi enviado */
    if(!isset($_POST['token']))
    {
        header("HTTP/1.0 401 Unauthorized");
        print "Sorry - you need get the token access!\n";
        exit;
    }
    else
    { 

            /* Passo 2: Regex para verificar se o JWT está em formato válido xxx.xxx.xxx */
            if(!preg_match("/[a-zA-Z0-9\-_]+?\.[a-zA-Z0-9\-_]+?\.([a-zA-Z0-9\-_]+)$/",$_POST['token']))
            {
                header("HTTP/1.0 401 Unauthorized");
                print "Desculpe - Esse token não é valido!\n";
                exit;
            }
            else
            {  
                
                /* Passo 3: Decodifica o JWT */

                $token = $_POST['token'];
                $seguranca = verifyToken($token); //Decodificamos com nossa chave_api (Metodo 2 -> funcao disponivel em funcaoJWT.php)



                /* Passo 4: Verificamos a autenticidade do token */
                if($token != $seguranca){ 

                    header("HTTP/1.0 401 Unauthorized");
                    echo "Hacked - you need get the token access!<br>";
                    exit;

                }else{ 
                    
                    /* Passo 4: Libera acesso para LISTAGEM dos usuarios */

                    $decode_jwt = json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $token)[1]))),true);

                }

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
                    <h4 class="c-tabs-title">Bem vindo, <?php echo $decode_jwt["uname"] ?>!</h4>

                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Logado com sucesso</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active c-tabs-box" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                            <!--Painel 1-->
                            <div class="d-flex flex-column justify-content-between">
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
                                    <h3 class="h5 mb-2">Voce pode comprar em criptomoeda</h3>
                                    <p>Estou usando uma API da coinpayments com uma conta antiga apenas para testes</p>
                                    <form action='https://www.coinpayments.net/index.php' id='bcform' method='post'>
                                        <input type='hidden' name='cmd' value='_pay_auto'>
                                        <input type='hidden' name='email' value='gustavo@gmail.com'>
                                        <input type='hidden' name='first_name' value='Gustavo'>
                                        <input type='hidden' name='last_name' value='Empresa'>
                                        <input type='hidden' name='reset' value='1'>
                                        <input type='hidden' name='want_shipping' value='0'>
                                        <input type='hidden' name='merchant' value='121661caf7ef34c0126ac1a4202e9766'>
                                        <input type='hidden' name='currency' value='USD'>
                                        <input type='hidden' name='amountf' value='50'>
                                        <input type='hidden' name='item_name' value='Produto xxx'>
                                        <input type='hidden' name='success_url' value='https://gustavo.com/acesso?v=1&s=1'>	
                                        <input type='hidden' name='cancel_url' value='https://gustavo.com/acesso'>
                                        <input type='hidden' name='custom' value='4353'>	
                                        <button type="submit" class="btn btn-success">Comprar com bitcoin</button>
                                    </form>
                                </div>
                            </div>
                            </div>
                            <!--End Painel 1-->

                        </div>
                    </div>


            </div>
            </div>
        </div>

                        

</body>
</html>