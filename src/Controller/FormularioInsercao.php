<?php


namespace Alura\Cursos\Controller;


class FormularioInsercao extends ControllerComHtml implements InterfaceControladorRequisicao
{
    public function processaRequisicao():void
    {
        echo $this->renderizaHtml('cursos/formulario.php', [
            'titulo'=> 'Novo curso '
        ]);
/*
        $titulo = 'Novo Curso';

        require __DIR__.'/../../view/cursos/formulario.php';
*/
    }

}