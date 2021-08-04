<?php


namespace Alura\Cursos\Controller;


use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\Persistence\ObjectManager;


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

        $curso = new Curso();
        $curso->setDescricao($descricao);
        $id = filter_input(
            INPUT_GET,
            'id',
            FILTER_VALIDATE_INT
        );


        if (!is_null($id) && $id !== false){
            $curso->setId($id);
            $this->entityManager->merge($curso);
        } else{
            $this->entityManager->persist($curso);
        }
        $this->entityManager->flush();

        //pegar dados do form;
        //montar modelo Curso;
        //Inserir no banco;

        //pegar na url post
        //$descricao = $_POST['descricao']



        header('Location: /listar-cursos', true, 302);
    }
}