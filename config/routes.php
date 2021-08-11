<?php

use Alura\Cursos\Controller\{CursosEmJson,
    CursosEmXml,
    Exclusao,
    FormularioEdicao,
    FormularioInsercao,
    FormularioLogin,
    ListarCursos,
    Logout,
    Persistencia,
    RealizarLogin};

return [
    '/listar-cursos' => ListarCursos::class,
    '/novo-curso' => FormularioInsercao::class,
    '/salvar-curso' => Persistencia::class,
    '/excluir-curso' => Exclusao::class,
    '/alterar-curso' => FormularioEdicao::class,
    '/login' => FormularioLogin::class,
    '/realiza-login' => RealizarLogin::class,
    '/logout' => Logout::class,
    '/buscarCursosEmJson'=> CursosEmJson::class,
    '/buscarCursosEmXml'=> CursosEmXml::class
];



/*
$rotas = [
    '/listar-cursos' => ListarCursos::class,
    'novo-curso' => FormularioInsercao::class,
    'salvar-curso' => Persistencia::class
];

return $rotas;

*/