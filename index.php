<!doctype html>
<html lang="pt-br">
    <head>
        <title>Lista de tarefas</title>
        <meta charset="utf-8">
        <meta name="author" content="Bruno">
        <meta name="description" content="descrição">
        <meta name="keywords" content="html5, php, css, tecnologia, to do list">
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="Expires" content="0">
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/fontawesome-free-5.12.1-web/fontawesome-free-5.12.1-web/css/all.css" rel="stylesheet">

        <link href="normalize.css" rel=stylesheet>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>

    <body>
        <div id="principal">
            <header>
                <h1 class="header-h1">Lista de Tarefas</h1>
                <p class="paragrafo-header">Cadastre aqui suas tarefas</p>
                <a href="php/newtask.php" class="task-button-default new-task-button">Cadastrar Tarefa</a>
            </header>
            <?php
            require_once('php/db.php');
            $db = new dbconnection();
            $conn = $db->f_obtem_conexao();
            // Executa a query da variável $sql

            $resultado = $conn->query($sql = $db->obtem_query());
            // Verifica se a query retornou registros
            if ($resultado->num_rows > 0) {
            ?>
            <br/>
            <main>
                <section class="container-table-task">
                    <table class="table-task">
                        <thead>
                            <tr>
                                <th class="table-task-head">Nome</th>
                                <th class="table-task-head ">Data e Hora</th>
                                <th class="table-task-head">Status</th>
                                <th colspan="3" class="table-task-head-buttons"></th>
                            </tr>
                        </thead>
                        <tbody class="table-task-body">
                            <?php
                while($registro = $resultado->fetch_assoc()) {
                    if ($registro["status"] == 'finalizada') {
                        echo '<tr class="table-task-row table-task-green">';
                    } else {
                        echo '<tr class="table-task-row table-task-red">';
                    }
                            ?>
                            <td class="table-task-data table-task-name"><?php echo $registro["name"]; ?></td>
                            <td class="table-task-data table-task-datetime"><?php echo $registro["date"]; ?></td>
                            <td class="table-task-data table-task-status"><?php echo $registro["status"]; ?></td>

                            <td class="table-task-td-buttons">
                                <a href="php/oktask.php?id=<?php echo $registro["id"]; ?>" class="table-task-button-default table-task-ok-button"><i class="far fa-check-circle"></i></a></td>

                            <td class="table-task-td-buttons">
                                <a href="php/changeStatus.php?id=<?php echo $registro["id"]; ?>&changeStatus=<?php echo $registro["status"]; ?>" class="table-task-button-default table-task-button-status"><i class="fas fa-sync"></i>
                                </a>
                            </td>

                            <td class="table-task-td-buttons">
                                <a href="php/deletetask.php?id=<?php echo $registro["id"]; ?>" class="table-task-button-default table-task-delete-button"><i class="fas fa-trash-alt"></i></a>
                            </td>
                            <?php }?>
                            <?php
                            echo '</tr>';
                            ?>
                        </tbody>
                    </table>
                </section>
                <?php
            }else {
                echo '<p>Você não possui Tarefas cadastradas!</p>';
                $conn->close();}
                ?>
            </main>
        </div>
        <script src="js/slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="js/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>