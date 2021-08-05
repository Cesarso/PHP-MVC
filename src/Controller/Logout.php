<?php


namespace Alura\Cursos\Controller;


class Logout implements InterfaceControladorRequisicao
{

    public function processaRequisicao(): void
    {
        //faz com que a sessão não seja mais válida. Voltando para Login:
        session_destroy();
        header('Location: /login');
    }
}