<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\RenderizadorDeHtmlTrait;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

//classe para controlar aq requisições
class ListarCursos implements RequestHandlerInterface
{
    use RenderizadorDeHtmlTrait;

    private $repositorioDeCursos;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioDeCursos = $entityManager
            ->getRepository(Curso::class);
    }

//busca os cursos
//com o require nessa função, todas as variaveis vão receber o
// caminho do arquivo html e esta variavelvai existir tbm no arquivo html
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->renderizaHtml('cursos/listar-cursos.php', [
            'cursos' => $this->repositorioDeCursos->findAll(),
            'titulo' => 'Lista de cursos',
        ]);

        return new Response(200, [], $html);
    }

        /*
        $cursos = $this -> repositorioDeCursos->findAll();
        $titulo = 'Lista de Cursos';
        require __DIR__. '/../../view/cursos/listar-cursos.php';
*/


}

