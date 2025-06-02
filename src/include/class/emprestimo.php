<?php

class Emprestimo{
    private $id;
    private $livro_id;
    private $cliente_id;
    private $data_vencimento;
    private $data_inclusao;
    private $data_alteracao;
    private $data_renovacao;
    private $data_devolucao;
    private $inclusao_funcionario_id;
    private $alteracao_funcionario_id;
    private $renovacao_funcionario_id;
    private $devolucao_funcionario_id;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getLivroId(){
        return $this->livro_id;
    }

    public function setLivroId($livro_id){
        $this->livro_id = $livro_id;
    }

    public function getClienteId(){
        return $this->cliente_id;
    }

    public function setClienteId($cliente_id){
        $this->cliente_id = $cliente_id; 
    }

    public function getDataVencimento(){
        return $this->data_vencimento;
    }

    public function setDataVencimento($data_vencimento){ 
        $this->data_vencimento = $data_vencimento;
    }
    public function showDataVencimento($format = 'Y-m-d'){
        $datetime = DateTime::createFromFormat('Y-m-d', $this->data_vencimento);
        return $datetime->format($format);
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

    public function getDataRenovacao(){
        return $this->data_renovacao;
    }

    public function setDataRenovacao($data_renovacao){
        $this->data_renovacao = $data_renovacao; 
    }
    public function showDataDevolucao($format = 'Y-m-d H:i:s'){
        $datetime = DateTime::createFromFormat('Y-m-d H:i:s', $this->data_devolucao);
        if($datetime){
            return $datetime->format($format);
        }
        return null;
    }
    public function getDataDevolucao(){
        return $this->data_devolucao;
    }

    public function setDataDevolucao($data_devolucao){
        $this->data_devolucao = $data_devolucao;
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

    public function getRenovacaoFuncionarioId(){
        return $this->renovacao_funcionario_id;
    }

    public function setRenovacaoFuncionarioId($renovacao_funcionario_id){
        $this->renovacao_funcionario_id = $renovacao_funcionario_id;
    }

    public function getDevolucaoFuncionarioId(){
        return $this->devolucao_funcionario_id;
    }

    public function setDevolucaoFuncionarioId($devolucao_funcionario_id){
        $this->devolucao_funcionario_id = $devolucao_funcionario_id;
    }
    

}


?>