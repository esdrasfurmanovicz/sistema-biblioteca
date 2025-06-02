<?php

class FuncionarioRepository implements Repository{
    public static function listAll(){
        $db = DB::getInstance();
        $sql = "SELECT * FROM funcionario";
        $query = $db->prepare($sql);
        $query->execute();

        $list = array();
        foreach($query->fetchAll(PDO::FETCH_OBJ) as  $row){
            $funcionario = new Funcionario;
            $funcionario->setId($row->id);
            $funcionario->setNome($row->nome);
            $funcionario->setTelefone($row->telefone);
            $funcionario->setEmail($row->email);
            $funcionario->setSenha($row->senha);
            $funcionario->setCpf($row->cpf);
            $funcionario->setDataInclusao($row->data_inclusao);
            $funcionario->setDataAlteracao($row->data_alteracao);
            $funcionario->setInclusaoFuncionarioId($row->inclusao_funcionario_id);
            $funcionario->setAlteracaoFuncionarioId($row->alteracao_funcionario_id);
            $list[] = $funcionario;
        }
        return $list;
    }
    public static function get($id){
        $db = DB::getInstance();
        $sql = "SELECT * FROM funcionario WHERE id = :id";
        $query = $db->prepare($sql);
        $query->bindParam(":id",$id);
        $query->execute();
    
        if($query->rowCount() > 0){
            $row = $query->fetch(PDO::FETCH_OBJ);
            $funcionario = new Funcionario;
            $funcionario->setId($row->id);
            $funcionario->setNome($row->nome);
            $funcionario->setTelefone($row->telefone);
            $funcionario->setEmail($row->email);
            $funcionario->setSenha($row->senha);
            $funcionario->setCpf($row->cpf);
            $funcionario->setDataInclusao($row->data_inclusao);
            $funcionario->setDataAlteracao($row->data_alteracao);
            $funcionario->setInclusaoFuncionarioId($row->inclusao_funcionario_id);
            $funcionario->setAlteracaoFuncionarioId($row->alteracao_funcionario_id);
            return $funcionario;
        };
        return null;
    }
    public static function getByCPF($cpf){
        $db = DB::getInstance();
        $sql = "SELECT * FROM funcionario WHERE cpf = :cpf";
        $query = $db->prepare($sql);
        $query->bindParam(":cpf",$cpf);
        $query->execute();
    
        if($query->rowCount() > 0){
            $row = $query->fetch(PDO::FETCH_OBJ);
            $funcionario = new Funcionario;
            $funcionario->setId($row->id);
            $funcionario->setNome($row->nome);
            $funcionario->setTelefone($row->telefone);
            $funcionario->setEmail($row->email);
            $funcionario->setSenha($row->senha,true);
            $funcionario->setCpf($row->cpf);
            $funcionario->setDataInclusao($row->data_inclusao);
            $funcionario->setDataAlteracao($row->data_alteracao);
            $funcionario->setInclusaoFuncionarioId($row->inclusao_funcionario_id);
            $funcionario->setAlteracaoFuncionarioId($row->alteracao_funcionario_id);
            return $funcionario;
        };
        return null;
    }
    public static function insert($obj){
        $db = DB::getInstance() ;//cria uma instancia da classe db (conexão com o bd).]
        $sql = "INSERT INTO funcionario (nome, cpf, telefone, senha, email, data_inclusao, inclusao_funcionario_id) VALUES(:nome, :cpf, :telefone, :senha, :email, :data_inclusao, :inclusao_funcionario_id)";

        $query = $db->prepare($sql);//prepara a query para ser executada.
        $query->bindValue(":nome", $obj->getNome());
        $query->bindValue(":cpf", $obj->getCpf());
        $query->bindValue(":telefone", $obj->getTelefone());
        $query->bindValue(":senha",$obj->getSenha());
        $query->bindValue(":email", $obj->getEmail());
        $query->bindValue(":data_inclusao", $obj->getDataInclusao());
        $query->bindValue(":inclusao_funcionario_id", $obj->getInclusaoFuncionarioId());
        $query->execute();
        $id = $db->lastInsertId();//recupera o último Id inserido no BD.
        return $id;
    }
    public static function update($obj){
        $db = DB::getInstance();
        $sql = "UPDATE funcionario SET nome = :nome, cpf = :cpf, telefone = :telefone, senha = :senha, email = :email, data_alteracao = :data_alteracao, alteracao_funcionario_id = :alteracao_funcionario_id WHERE id = :id";
        $query = $db->prepare($sql);
        $query->bindValue(":nome",$obj->getNome()); 
        $query->bindValue(":cpf",$obj->getCpf());
        $query->bindValue(":telefone",$obj->getTelefone());
        $query->bindValue(":senha",$obj->getSenha());
        $query->bindValue(":email",$obj->getEmail());
        $query->bindValue(":data_alteracao",$obj->getDataAlteracao());
        $query->bindValue(":alteracao_funcionario_id",$obj->getAlteracaoFuncionarioId());
        $query->bindValue(":id",$obj->getId());
        $query->execute();
    }
    public static function delete($id){
        $db = DB::getInstance();
        $sql = "DELETE FROM funcionario WHERE id=:id";
        $query=$db->prepare($sql);
        $query->bindValue(":id",$id);
        $query->execute();
    }
    public static function verefyCpf($cpf){ 
        $db = DB::getInstance();

        $sql = 'SELECT count(*) FROM funcionario WHERE cpf = :cpf';

        $query = $db->prepare($sql);
        $query->bindValue(":cpf",$cpf);
        $query->execute();

        $row = $query->fetch(PDO::FETCH_ASSOC);
        return $row["count(*)"];
    }
}