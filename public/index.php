<?php

require __DIR__ . '/../vendor/autoload.php';

use Alura\Cursos\Controller\InterfaceControladorRequisicao;

$caminho = $_SERVER['PATH_INFO'];
$rotas = require __DIR__ . '/../config/routes.php';

if (!array_key_exists($caminho,$rotas)){
    http_response_code(404);
    exit();
}

session_start();
$ehRotaDeLogin = stripos($caminho, 'login');
if (!isset($_SESSION['logado']) && $ehRotaDeLogin === false){
    header('Location: /login');
    exit();
}

$classeControladora = $rotas[$caminho];
/** var InterfaceControladoraRequisicao $cont */

$cont = new $classeControladora();

$cont -> processaRequisicao();


/*

switch ($_SERVER['PATH_INFO']) {
    case '/listar-cursos':
        $cont = new ListarCursos();
        $cont->processaRequisicao();
        break;
    case '/novo-curso':
        $cont = new FormularioInsercao();
        $cont->processaRequisicao();
        break;
    case '/salvar-curso':
        $cont = new Persistencia();
        $cont->processaRequisicao();
        break;
    default:
        echo "Erro 404";
        break;
*/
