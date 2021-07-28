<?php

require __DIR__ . '/../vendor/autoload.php';

use Alura\Cursos\Controller\FormularioInsercao;
use Alura\Cursos\Controller\ListarCursos;

switch ($_SERVER['PATH_INFO']) {
    case '/listar-cursos':
        $cont = new ListarCursos();
        $cont->processaRequisicao();
        break;
    case '/novo-curso':
        $cont = new FormularioInsercao();
        $cont->processaRequisicao();
        break;
    default:
        echo "Erro 404";
        break;
}