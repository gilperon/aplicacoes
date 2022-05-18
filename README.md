Data: 18-05-2022

Bom dia,
Acabei de subir esse repositório como foi pedido.
Essa é uma aplicação simples utilizando API da coinpayments, e processo de autenticação via JWT token. (fiz isso agora hehe)
Tenho vários projetos feitos, mas devido ao sigilo profissional, não posso fornecer os apps aqui.
De qualquer forma, vou colocar os trabalhos mais recentes que fiz esse ano (2022) e abaixo deixo a explicação do codigo que desenvolvi para esse teste.

Trabalhos: 
1) https://i.imgur.com/IEzZ3jl.png
2) https://i.imgur.com/oZ3rcFJ.png
3) https://i.imgur.com/186ep7Y.png
4) https://i.imgur.com/2Ft8Rz4.png




    Código desenvolvido em PHP Puro - Responsável: Gustavo
    
    Foi construido um endpoint para autenticação usando usuário e senha, e retornando o token de autenticação no formato JWT.
    Utilizando o JWT token de autenticação, o usuário terá acesso ao sistema financeiro, e a opção pagamento com BITCOIN e outras criptomoedas será ativado.
    
    Nesse código, o intuito é mostrar apenas a funcionalidade (backend), então o front não foi desenvolvido

    Dados de acesso para gerar seu JWT Token:

    login: gustavo
    senha: 12345

    
    COMO USAR:
    1. Acessar a pagina inicial (index) 
    2. Clique na aba Credenciais para copiar seus dados de acesso. Em seguida, faça Login, para gerar seu token JWT.
    3. Com o seu token gerado, vá na aba Fazer Requisicoes, insira seu TOKEN de acesso e clique em Verificar Acesso
       Se o seu token for valido, voce será redirecionado para a pagina financeiro, onde poderá fazer pagamentos com bitcoin
    4. Dentro da pagina financeiro.php  clique no botao "Comprar com bitcoin"
    5. Voce poderá fazer pagamentos por qualquer criptomoeda (estou usando a API da coinpayments) 
    6. Coloquei um arquivo que recebe o callback da coinpayments tambem apenas para objeto de estudos, coloquei um exit no comeco pois nesse caso precisaria de credenciais validas da coinpayments)
    
    
    INFORMAÇÕES:
    Deixei algumas partes do código documentadas, para facilitar o entendimento.
    Existem bibliotecas prontas para gerar o token JWT (firebase/php-jwt), mas como o intuito aqui é avaliar conhecimento, fiz uma versão do zero sem precisar composer ou biblioteca exeterna que demanda várias dependencias e arquivos.
    
    
    
    
    
    

