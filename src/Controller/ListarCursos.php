<?php


namespace Alura\Cursos\Controller;


use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;

//classe para controlar aq requisições
class ListarCursos extends ControllerComHtml implements InterfaceControladorRequisicao
{
    private $repositorioDeCursos;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())
            ->getEntityManager();
        $this->repositorioDeCursos = $entityManager
            ->getRepository(Curso::class);


    }
//busca os cursos
//com o require nessa função, todas as variaveis vão receber o
// caminho do arquivo html e esta variavelvai existir tbm no arquivo html
    public function processaRequisicao(): void
    {
        echo $this->renderizaHtml('cursos/listar-cursos.php', [
            'cursos'=> $this -> repositorioDeCursos->findAll(),
            'titulo'=> 'Lista de Cursos'
        ]);
        /*
        $cursos = $this -> repositorioDeCursos->findAll();
        $titulo = 'Lista de Cursos';
        require __DIR__. '/../../view/cursos/listar-cursos.php';
*/

        
    }


}

