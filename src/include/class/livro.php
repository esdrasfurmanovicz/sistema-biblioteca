<?php
    class Livro{
        private $id;
        private $titulo;
        private $ano;
        private $genero;
        private $isbn;
        private $autor_id;
        private $data_inclusao;
        private $data_alteracao;
        private $inclusao_funcionario_id;
        private $alteracao_funcionario_id;
    
    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function getAno(){
        return $this->ano;
    }

    public function setAno($ano){
        $this->ano = $ano;
    }

    public function getGenero(){
        return $this->genero;
    }

    public function setGenero($genero){
        $this->genero = $genero;
    }

    public function getIsbn(){
        return $this->isbn;
    }

    public function setIsbn($isbn){
        $this->isbn = $isbn;
    }

    public function getAutorId(){
        return $this->autor_id;
    }

    public function setAutorId($autor_id){
        $this->autor_id = $autor_id;
    }

    public function getDataInclusao(){
        return $this->data_inclusao;
    }

    public function setDataInclusao($data_inclusao){
        $this->data_inclusao = $data_inclusao;
    }

    public function getDataAlteracao(){
        return $this->data_alteracao;
    }

    public function setDataAlteracao($data_alteracao){
        $this->data_alteracao = $data_alteracao;
    }

    public function getInclusaoFuncionarioId(){
        return $this->inclusao_funcionario_id;
    }

    public function setInclusaoFuncionarioId($inclusao_funcionario_id){
        $this->inclusao_funcionario_id = $inclusao_funcionario_id;
    }

    public function getAlteracaoFuncionarioId(){
        return $this->alteracao_funcionario_id;
    }

    public function setAlteracaoFuncionarioId($alteracao_funcionario_id){
        $this->alteracao_funcionario_id = $alteracao_funcionario_id;
    }
}