<?php
include_once 'atv01.php';

$user = isset($_POST['user']) ? $_POST['user'] : "";
$group = isset($_POST['group']) ? $_POST['group'] : "";
$newgroup = isset($_POST['newgroup']) ? $_POST['newgroup'] : "";
$opcao = isset($_POST['opcao']) ? $_POST['opcao'] : "";
$dar_permissao = isset($_POST['dar_permissao']) ? $_POST['dar_permissao'] : "";
$col01 = isset($_POST['col01']) ? $_POST['col01'] : "";
$col02 = isset($_POST['col02']) ? $_POST['col02'] : "";
$col03 = isset($_POST['col03']) ? $_POST['col03'] : "";


?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="atv01.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de comandos</title>

</head>
<body>
    <div class="container">
    <h3>Gerador de comandos</h3>
        <form method="post">
            <fieldset>
                <legend>Adicionar usuário</legend> 
                <label for="user">Nome do usuário:</label>
                <input type="text" id="user" name="user" placeholder="Nome do Usuário"><br>
                <label for="user">Nome do grupo:</label>
                <input type="text" id="group" name="group" placeholder="Grupo"><br><br>
                
            </fieldset>
            <br>
            <fieldset>
                <legend>Adicionar grupo</legend> 
                <label for="newgroup">Nome do grupo:</label>
                <input type="text" id="newgroup" name="newgroup" placeholder="Novo Grupo"><br><br>
            </fieldset>
            <br>
            <fieldset>
                <legend>Gerenciar permissões</legend> 
                <label for="">Selecione um:</label>
                <br><br>
                <input type="radio" id="arquivo" name="opcao" value="1">
                <label for="arquivo">Arquivo</label><br>
                <input type="radio" id="diretorio" name="opcao" value="2">
                <label for="diretorio">Diretório</label><br><br>
                <label for="dar_permissao">Nome do arquivo/diretorio</label>
                <input type="text" id="dar_permissao" name="dar_permissao" placeholder="Nome do arquivo/diretório">
                <table>
                    <thead>
                        <tr>
                            <th>Dono</th>
                            <th>Grupo</th>
                            <th>Outro</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="integer" id="col01" name="col01" placeholder="D"></td>
                            <td><input type="integer" id="col02" name="col02" placeholder="G"></td>
                            <td><input type="integer" id="col03" name="col03" placeholder="O"></td>
                        </tr>
                    </tbody>
                </table>
            </fieldset>
            <br>
            <input type="submit" id="envia" value="Confirmar">
        </form>
        <div class="output" style="text-align: center;">
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if ($group == "" && $user != "") {
                    echo('sudo adduser ' . htmlspecialchars($user));
                } elseif ($group != "" && $user != "") {
                    echo('sudo adduser ' . htmlspecialchars($user) . ' ' . htmlspecialchars($group));
                }
                if ($newgroup != "" && $user == "") {
                    echo('<br>' . 'sudo addgroup ' . htmlspecialchars($newgroup));
                }

                if ($opcao == 1) {
                    echo("<br>sudo chmod " . htmlspecialchars($col01 . $col02 . $col03) . " " . htmlspecialchars($dar_permissao));
                } elseif ($opcao == 2) {
                    echo("<br>sudo chmod -R " . htmlspecialchars($col01 . $col02 . $col03) . " " . htmlspecialchars($dar_permissao));
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
