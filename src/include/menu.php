<header>
    <nav>
        <div class="headTitle" onclick="link('index.php')">
            <img src="img/book.png" alt="">
            <h1>Gnodex</h1>
        </div>
        <div class="ul">
            <div class="dropdown">
                <a class="btn dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Produtos
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="livroList.php">Livros</a></li>
                    <li><a class="dropdown-item" href="autorList.php">Autor</a></li>
                </ul>
            </div>
            <div class="dropdown">
                <a class="btn dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Usuarios
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="clienteList.php">Clientes</a></li>
                    <li><a class="dropdown-item" href="funcioList.php">Funcionarios</a></li>
                </ul>
            </div>
                <a href="empresListAll.php">
                Empréstimo
                </a>

        </div>
    </nav>
    <a href="logout.php" class="sair">Sair</a>
</header>