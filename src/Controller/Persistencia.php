<?php


namespace Alura\Cursos\Controller;


use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;


class Persistencia implements InterfaceControladorRequisicao
{
    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */

    private $entityManager;


    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())
            ->getEntityManager();
    }


    public function processaRequisicao(): void
    {
        //FILTRO P/ POST DA URL DO FORM
        $descricao = filter_input(
            INPUT_POST,
            'descricao',
            FILTER_SANITIZE_STRING
        );

        //pegar dados do form;
        //montar modelo Curso;
        //Inserir no banco;

        //pegar na url post
        //$descricao = $_POST['descricao']
        $curso = new Curso();
        $curso->setDescricao($descricao);
        $this->entityManager->persist($curso);
        $this->entityManager->flush();

        header('Location: /listar-cursos', true, 302);
    }
}