CREATE DATABASE IF NOT EXISTS blio;
USE blio;

CREATE TABLE IF NOT EXISTS funcionario (
  id INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(100) NOT NULL,
  cpf VARCHAR(14) NOT NULL UNIQUE,
  telefone VARCHAR(20) NOT NULL,
  senha VARCHAR(70) NOT NULL,
  email VARCHAR(100) NOT NULL,
  data_inclusao DATETIME NOT NULL,
  data_alteracao DATETIME DEFAULT NULL,
  inclusao_funcionario_id INT DEFAULT NULL,
  alteracao_funcionario_id INT DEFAULT NULL,
  PRIMARY KEY (id)
);

INSERT INTO funcionario (id, nome, cpf, telefone, senha, email, data_inclusao)
VALUES (1, 'teste', '123.456.789-10', '99999999999',
  '289160db0d9f39f9ae1754c4ec9c16f90b50e32e09c5fb5481ae642b3d3d1a36', 
  'teste123@gmail.com', '2024-09-14 00:08:31')
ON DUPLICATE KEY UPDATE id=id; /* Login: CPF: 123.456.789-10, password: teste123  */

CREATE TABLE IF NOT EXISTS autor (
  id INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(100) NOT NULL,
  data_inclusao DATETIME NOT NULL,
  data_alteracao DATETIME DEFAULT NULL,
  inclusao_funcionario_id INT NOT NULL,
  alteracao_funcionario_id INT DEFAULT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (inclusao_funcionario_id) REFERENCES funcionario(id),
  FOREIGN KEY (alteracao_funcionario_id) REFERENCES funcionario(id)
);

CREATE TABLE IF NOT EXISTS cliente (
  id INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(100) NOT NULL,
  telefone VARCHAR(20) NOT NULL,
  email VARCHAR(200) NOT NULL,
  cpf VARCHAR(14) UNIQUE,
  rg VARCHAR(20),
  data_nascimento DATE NOT NULL,
  data_inclusao DATETIME NOT NULL,
  data_alteracao DATETIME DEFAULT NULL,
  inclusao_funcionario_id INT NOT NULL,
  alteracao_funcionario_id INT DEFAULT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (inclusao_funcionario_id) REFERENCES funcionario(id),
  FOREIGN KEY (alteracao_funcionario_id) REFERENCES funcionario(id)
);

CREATE TABLE IF NOT EXISTS livro (
  id INT NOT NULL AUTO_INCREMENT,
  titulo VARCHAR(200) NOT NULL,
  ano INT,
  genero VARCHAR(100) NOT NULL,
  isbn VARCHAR(10) NOT NULL,
  autor_id INT NOT NULL,
  data_inclusao DATETIME NOT NULL,
  data_alteracao DATETIME DEFAULT NULL,
  inclusao_funcionario_id INT NOT NULL,
  alteracao_funcionario_id INT DEFAULT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (autor_id) REFERENCES autor(id),
  FOREIGN KEY (inclusao_funcionario_id) REFERENCES funcionario(id),
  FOREIGN KEY (alteracao_funcionario_id) REFERENCES funcionario(id)
);

CREATE TABLE IF NOT EXISTS emprestimo (
  id INT NOT NULL AUTO_INCREMENT,
  livro_id INT NOT NULL,
  cliente_id INT NOT NULL,
  data_vencimento DATE NOT NULL,
  data_inclusao DATETIME NOT NULL,
  data_alteracao DATETIME DEFAULT NULL,
  data_renovacao DATETIME DEFAULT NULL,
  data_devolucao DATETIME DEFAULT NULL,
  inclusao_funcionario_id INT NOT NULL,
  alteracao_funcionario_id INT DEFAULT NULL,
  renovacao_funcionario_id INT DEFAULT NULL,
  devolucao_funcionario_id INT DEFAULT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (livro_id) REFERENCES livro(id),
  FOREIGN KEY (cliente_id) REFERENCES cliente(id),
  FOREIGN KEY (inclusao_funcionario_id) REFERENCES funcionario(id),
  FOREIGN KEY (alteracao_funcionario_id) REFERENCES funcionario(id),
  FOREIGN KEY (renovacao_funcionario_id) REFERENCES funcionario(id),
  FOREIGN KEY (devolucao_funcionario_id) REFERENCES funcionario(id)
);
