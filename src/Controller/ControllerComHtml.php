<?php


namespace Alura\Cursos\Controller;


abstract class ControllerComHtml
{
    public function renderizaHtml(string  $caminhoTemplate,array $dados): string
    {

        extract($dados);

        /*Pega o conteúdo que está sendo exibido e joga no buffer de saída*/
        ob_start();
        require __DIR__ .'/../../view/' . $caminhoTemplate;
        $html = ob_get_clean(); /*retorna e limpa o buffer*/
        return  $html;
    }

}