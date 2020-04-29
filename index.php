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
        <link href="css/bootstrap.min.css">
        <link href="fontawesome-free-5.12.1-web/css/all.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>

    <body>
        <div id="principal">
            <header>
                <div class="header-div-index">
                    <h1 class="header-h1">Lista de Tarefas</h1>
                    <p class="paragrafo-header">Cadastre aqui suas tarefas</p>
                    <a href="php/newtask.php" class="default-style-buttons new-task-button">Cadastrar Tarefa</a>
                    <a href="php/history.php" class="default-style-buttons new-task-button">Historico</a>
                </div>
            </header>
            <?php
            require_once('php/db.php');
            $db = new DbConnection();
            $resultado = $db->selectAll();
            if ($resultado->rowCount() > 0) {
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
                while($registro = $resultado->fetch()) {
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
                                <a href="php/deletetask.php?id=<?php echo $registro["id"]; ?>" class="table-task-button-default table-task-delete-button" onclick="return confirm('Voce tem certeza que deseja deletar essa tarefa?');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                            <?php } echo '</tr>';?>
                        </tbody>
                    </table>
                    
                </section>
                <?php
            }else {
                echo '<p>Você não possui Tarefas cadastradas!</p>';
                $conn = null;}
                ?>
            </main>
        </div>
        <script src="js/slim.min.js"></script>
        <script src="js/popper.min.js" ></script>
        <script src="js/bootstrap.min.js" ></script>
    </body>
</html>