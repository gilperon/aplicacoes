<?php     
	
	/* 
		Esse é a API para receber pagamentos em criptomoedas usando a coinpayments
		Estou dando exit no arquivo, pois precisa de uma credencial valida para poder verificar
		Mas basicamente a coinpayments retorna para esse endpoint, informando se o pagamento foi concluido ou nao na blockchain
	*/
	exit;

    // IPN para coinpayments
	// https://www.coinpayments.net/index.php?cmd=acct_settings
    $cp_merchant_id = 'xxx'; 
    $cp_ipn_secret = 'xxx'; 
    $cp_debug_email = 'xxx@xxx.com'; 
     
    function errorAndDie($error_msg) { 
        global $cp_debug_email; 
        if (!empty($cp_debug_email)) { 
            $report = 'Error: '.$error_msg."\n\n"; 
            $report .= "POST Data\n\n"; 
            foreach ($_POST as $k => $v) { 
                $report .= "|$k| = |$v|\n"; 
            } 
            mail($cp_debug_email, 'CoinPayments IPN Error', $report); 
        } 
        die('IPN Error: '.$error_msg); 
    } 
     
    if (!isset($_POST['ipn_mode']) || $_POST['ipn_mode'] != 'hmac') { 
        errorAndDie('IPN Mode is not HMAC'); 
    } 
     
    if (!isset($_SERVER['HTTP_HMAC']) || empty($_SERVER['HTTP_HMAC'])) { 
        errorAndDie('No HMAC signature sent.'); 
    } 
     
    $request = file_get_contents('php://input'); 
    if ($request === FALSE || empty($request)) { 
        errorAndDie('Error reading POST data'); 
    } 
     
    if (!isset($_POST['merchant']) || $_POST['merchant'] != trim($cp_merchant_id)) { 
        errorAndDie('No or incorrect Merchant ID passed'); 
    } 
         
    $hmac = hash_hmac("sha512", $request, trim($cp_ipn_secret)); 
    if ($hmac != $_SERVER['HTTP_HMAC']) { 
        errorAndDie('HMAC signature does not match'); 
    } 
     
    // HMAC Signature verified at this point, load some variables. 
    $txn_id = $_POST['txn_id']; 
    $item_name = $_POST['item_name']; 
    $item_number = $_POST['item_number']; 
    $payment_amount = floatval($_POST['amount1']); //usd
	$payer_email = $_POST['email'];
    $amount2 = floatval($_POST['amount2']);  //bitcoin
    $currency1 = $_POST['currency1']; //usd
    $currency2 = $_POST['currency2'];  //bitcoin
    $status = intval($_POST['status']); 
    $status_text = $_POST['status_text']; 
	$secret = $_POST['custom'];
	
	//GET ALL INFORMATION JUST FOR LOGS
	foreach ($_POST as $chave => $valor) { $allinfos[] = $chave . " -> " . $valor; }
	$allinfos = (isset($allinfos)) ? implode("\r\n",$allinfos) : "no infos";


	/* Recebe o STATUS do pagamento pelo IPN callback de coinpayments  */
	/* Inserir conexao com o banco de dados */
	/* Atualiza o banco de dados , invoice, saldo,  */
	
	
?>