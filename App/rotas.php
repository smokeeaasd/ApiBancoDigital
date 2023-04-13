<?php

use App\Controller\CorrentistaController;

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($uri)
{

    case "/api/correntistas":
        CorrentistaController::getCorrentistas();
    break;

    case "/api/correntista/by-id":
        CorrentistaController::getCorrentista();
    break;

    default:
        http_response_code(403);
    break;
}

?>