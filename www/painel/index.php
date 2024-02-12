<?php
require_once "config/config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div  class="container ">
        <h1>Administração Posts</h1>
        <div class="row">
            <div class="col-md-12">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Novo</button>
            </div>
        </div>
        <div class="row">
            <table class="table table-bordered table-hover">

                <thead>
                    <tr class="table-dark">
                        <th scope="col">ID</th>
                        <th scope="col">titulo</th>
                        <th scope="col">Conteudo</th>
                        <th scope="col">Data</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    try {
                        $stmt = $pdo->query("SELECT * FROM posts");
                        while ($row = $stmt->fetch()) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['titulo'] . "</td>";
                            echo "<td>" . $row['conteudo'] . "</td>";
                            echo "<td>" . $row['criadoEm'] . "</td>";
                            echo "<td>
                    <a href='/painel/editar.php'>Editar</a> | 
                    <a href='/painel/deletar.php'>Excluir</a>
                </td>";
                            echo "</tr>";
                        }
                    } catch (PDOException $e) {
                        echo "Erro ao executar consulta: " . $e->getMessage();
                    }
                    ?>

                </tbody>

            </table>
        </div>
    </div>
    <!-- 

[
    {
        "id": 1,
        "titulo": "teste"
        "conteudo":"lore ip2longest "
    },
    {
        "id": 2,
        "titulo": "teste"
        "conteudo":"lore ip2longest "
    },
    {
        "id": 3,
        "titulo": "teste"
        "conteudo":"lore ip2longest "
    }
] -->
<!-- Button trigger modal -->

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/painel/cadastrar.php" method="post" onsubmit="return validarFormulario()">
            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo</label>
                <input type="text" class="form-control" id="titulo" aria-describedby="tituloErro" name="titulo">
                <span id="tituloErro" class="text-danger"></span>
            </div>
            <div class="mb-3">
                <label for="conteudo" class="form-label">Conteudo</label>
                <textarea class="form-control" id="conteudo" aria-describedby="conteudoErro" name="conteudo"></textarea>
                <span id="conteudoErro" class="text-danger"></span>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
function validarFormulario() {
    var titulo = document.getElementById('titulo').value;
    var conteudo = document.getElementById('conteudo').value;
    var tituloErro = document.getElementById('tituloErro');
    var conteudoErro = document.getElementById('conteudoErro');

    // Resetar mensagens de erro
    tituloErro.innerHTML = '';
    conteudoErro.innerHTML = '';

    // Verificar se os campos titulo e conteudo estão preenchidos
    if (titulo === '') {
        tituloErro.innerHTML = 'Por favor, preencha o campo título.';
        return false; // Impede o envio do formulário se o campo título não estiver preenchido
    }
    if (conteudo === '') {
        conteudoErro.innerHTML = 'Por favor, preencha o campo conteúdo.';
        return false; // Impede o envio do formulário se o campo conteúdo não estiver preenchido
    }
    return true; // Permite o envio do formulário se os campos estiverem preenchidos
}
</script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>