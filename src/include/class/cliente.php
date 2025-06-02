<?php
    class Cliente{
        private $id;
        private $nome;
        private $telefone;
        private $email;
        private $cpf;
        private $rg;
        private $data_nascimento;
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
    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getTelefone(){
        return $this->telefone;
    }
    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function getCpf(){
        return $this->cpf;
    }
    public function setCpf($cpf){
        $this->cpf = $cpf;
    }
    public function getRg(){
        return $this->rg;
    }
    public function setRg($rg){
        $this->rg = $rg; 
    }
    public function getDataNascimento(){
        return $this->data_nascimento;
    }
    public function showDataNascimento($format = 'Y-m-d'){
        $datetime = DateTime::createFromFormat('Y-m-d', $this->data_nascimento);
        return $datetime->format($format);
    }
    public function setDataNascimento($data_nascimento){
        $this->data_nascimento = $data_nascimento;
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