<?php

 require("./funcoes.php");


 $funcionarios = lerArquivo("funcionarios.json");

 if(isset($_GET["filtro"]) && $_GET["filtro"] != "" ){
     $funcionarios = buscarFuncionario($funcionarios, $_GET["filtro"]);
 }


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src="script.js" defer></script>
    <title>Empresa X</title>
</head>
<body>

    <div class="content">
        <h1>Funcionários da Empresa X</h1>
        <p style="text-align: center">
        A empresa conta com <em> <?= count($funcionarios) ?> </em> Funcionários
        </p>

<form method="GET" class="search-form">
<div class="input-group" style="flex: 1">
<label>Pesquisar por nome</label>
        <input type="search" placeholder="Digite o nome" name="filtro" value="<?= isset($_GET["filtro"]) ? $_GET["filtro"] : "" ?>" />
      </div>
    <button>Buscar</button>
</form>
<button id="btnAddFuncionario"> Adicionar Funcionario </button>
<br/> <br/>
<div class="modal-form">
<form id="form-funcionario" action="acoes.php" meth>
    <h1>Adicionar funcionário</h1>
    <input type="text" placeholder="Digite o id" name="id"/>
    <input type="text" placeholder="Digite o primeiro nome" name="first_name"/>
    <input type="text" placeholder="Digite o sobrenome" name="last_name"/>
    <input type="text" placeholder="Digite o email" name="email"/>
    <input type="text" placeholder="Digite o sexo" name="gender"/>
    <input type="text" placeholder="Digite o IP" name="id_address"/>
    <input type="text" placeholder="Digite o país" name="country"/>
    <input type="text" placeholder="Digite o departamento" name="department"/>
    <button>Salvar</button>
</form>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>Email</th>
            <th>Sexo</th>
            <th>Endereço IP</th>
            <th>País</th>
            <th>Departamento</th>
        </tr>
        <?php
        foreach ($funcionarios as $funcionario) :
        ?>
        <tr>
            <td><?= $funcionario -> id ?></td>
            <td><?= $funcionario -> first_name ?></td>
            <td><?= $funcionario -> last_name ?></td>
            <td><?= $funcionario -> email ?></td>
            <td><?= $funcionario -> gender ?></td>
            <td><?= $funcionario -> ip_address ?></td>
            <td><?= $funcionario -> country ?></td>
            <td><?= $funcionario -> department ?></td>
            
        </tr>
        <?php
        endforeach;
        ?>
    </table>
</body>
</html>