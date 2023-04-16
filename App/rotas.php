<?php

use App\Controller\ContaController;
use App\Controller\CorrentistaController;

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($uri)
{

	/**
	 * Rotas para Correntista
	 */
    case "/api/correntistas":
        CorrentistaController::getCorrentistas();
    break;

    case "/api/correntista/by-id":
        CorrentistaController::getCorrentistaById();
    break;

    case "/api/correntista/new":
        CorrentistaController::addCorrentista();
    break;

    case "/api/correntista/update":
        CorrentistaController::updateCorrentista();
    break;

    case "/api/correntista/connect":
        CorrentistaController::getCorrentistaByCPFandSenha();
    break;

	/**
	 * Rotas para Conta
	 */
	case "/api/contas":
		ContaController::getContas();
	break;

	case "/api/conta/by-id":
		ContaController::getContaById();
	break;

	case "/api/conta/by-numero":
		ContaController::getContaByNumero();
	break;

	case "/api/conta/by-correntista":
		ContaController::getContaByCorrentista();
	break;

	case "/api/conta/new":
		ContaController::addConta();
	break;

	case "/api/conta/update":
		ContaController::updateConta();
	break;

    default:
        http_response_code(403);
    break;
}

?>