<?php
class Autor
{   private $id;
    private $nome;
    private $data_inclusao;
    private $data_alteracao;
    private $inclusao_funcionario_id;
    private $alteracao_funcionario_id;


    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getDataInclusao()
    {
        return $this->data_inclusao;
    }
    public function setDataInclusao($data_inclusao)
    {
        $this->data_inclusao = $data_inclusao;
    }
    public function getDataAlteracao()
    {
        return $this->data_alteracao;
    }
    public function setDataAlteracao($data_alteracao)
    {
        $this->data_alteracao = $data_alteracao;
    }


    public function getInclusaoFuncionarioId()
    {
        return $this->inclusao_funcionario_id;
    }
    public function setinclusaoFuncionarioId($inclusao_funcionario_id)
    {
        $this->inclusao_funcionario_id = $inclusao_funcionario_id;
    }
    public function getAlteracaoFuncionarioId()
    {
        return $this->alteracao_funcionario_id;
    }
    public function setAlteracaoFuncionarioId($alteracao_funcionario_id)
    {
        $this->alteracao_funcionario_id = $alteracao_funcionario_id;
    }
}
