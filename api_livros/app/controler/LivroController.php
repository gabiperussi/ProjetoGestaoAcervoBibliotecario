<?php

class LivroControler{
    private $modelLivro;
    private $viewLivro;

    public function __construct($db){
        $this-> modelLivro = new LivroModel($db);

        $this-> viewLivro = new LivroView();
    }

    public function getLivros(){
        $livros = $this->modelLivro->buscarLivros();
        $this->viewLivro->sendResponse($livros);
    }
}

?>