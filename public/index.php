<?php

require __DIR__ . '/../vendor/autoload.php';

use Nyholm\Psr7\Factory\{Psr17Factory};
use Nyholm\Psr7Server\{ServerRequestCreator};
use Psr\Container\ContainerInterface;
use Psr\Http\Server\{RequestHandlerInterface};



$caminho = $_SERVER['PATH_INFO'];
$rotas = require __DIR__ . '/../config/routes.php';

if (!array_key_exists($caminho, $rotas)) {
    http_response_code(404);
    exit();
}

session_start();

$ehRotaDeLogin = stripos($caminho, 'login');
if (!isset($_SESSION['logado']) && $ehRotaDeLogin === false) {
    header('Location: /login');
    exit();
}


$psr17Factory = new Psr17Factory();

$creator = new ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory
    $psr17Factory, // UriFactory
    $psr17Factory, // UploadedFileFactory
    $psr17Factory  // StreamFactory
);

//requisita o servidor
$serverRequest = $creator->fromGlobals();

$classeControladora = $rotas[$caminho];
/** @var ContainerInterface $container */
$container = require __DIR__. '/../config/dependencies.php';
/** @var RequestHandlerInterface $cont */
$cont = $container->get($classeControladora);

$resposta = $cont->handle($serverRequest);


/*
$container = require __DIR__ . '/../config/dependencies.php';
/** @var RequestHandlerInterface $cont */
/*
$cont = $container->get($classeControladora);
$resposta = $cont->handle($serverRequest);
*/
//cabeçalhos
foreach ($resposta->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}

echo $resposta->getBody();

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
