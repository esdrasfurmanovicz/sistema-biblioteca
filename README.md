# 📚 Gnodex — Sistema de Biblioteca em PHP

O Gnodex é um sistema web simples para gerenciamento de uma biblioteca fictícia, desenvolvido em **PHP puro** com **MySQL** e **Docker**. Ele marca a consolidação dos conhecimentos adquiridos em PHP, integrando funcionalidades como controle de clientes, funcionários, livros e empréstimos.


## 🚀 Como rodar o projeto

Pré-requisitos: Certifique-se de ter o Docker instalado em sua máquina.
     
Clonar o repositório:
````
git clone <URL_DO_REPOSITORIO>
cd SISTEMA-BIBLIOTECA
````

Iniciar os containers:
````
docker compose up -d
````
Esse comando irá subir automaticamente:
* O servidor Apache com PHP 8.2
* O banco de dados MySQL
* O phpMyAdmin para visualização do banco

Na **primeira execução**, o banco de dados será criado automaticamente, assim como as tabelas e um funcionário de teste.


## 🌐 Acessos
| Serviço        | URL                                            |
| -------------- | ---------------------------------------------- |
| Sistema Gnodex | [http://localhost:8076](http://localhost:8076) |
| phpMyAdmin     | [http://localhost:8081](http://localhost:8081) |

## 🔐 Login de teste
Um funcionário fictício é inserido automaticamente no banco ao subir o sistema:

* CPF: 123.456.789-10
* Senha: teste123

📌 **Nota:** O CPF (Cadastro de Pessoa Física) é um número único utilizado no Brasil como identificação pessoal. Neste sistema, ele é usado como login.

## 🧩 Estrutura de arquivos

````
SISTEMA-BIBLIOTECA
├── mysql-init/
│   └── init.sql              # Script de criação e inserção no banco
├── src/
│   ├── img/                  # Imagens usadas no sistema
│   ├── include/              # Arquivos PHP auxiliares
│   ├── js/                   # Scripts JavaScript
│   ├── style/                # Arquivos CSS
│   └── index.php             # Ponto de entrada principal
├── docker-compose.yml        # Configuração do Docker
└── README.md                 # Este arquivo
````

## ⚙️ Personalização
Você pode modificar configurações como porta, credenciais e nome do banco diretamente no arquivo docker-compose.yml.
