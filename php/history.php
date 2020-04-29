<!doctype html>
<html lang="pt-br">
    <head>
        <title>Historico</title>
        <link href="../css/bootstrap.min.css">
        <link href="../fontawesome-free-5.12.1-web/css/all.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
    </head>

    <body>
        <div id="principal">
            <header>
                <div class="header-div-index">
                    <h1 class="header-h1">Historico de tarefas</h1>
                    <a href="../index.php" class="default-style-buttons new-task-button"><i class="fas fa-home"></i></a>
                    <a href="deletetask.php?type=<?php echo "deleteHistory" ?>" class="default-style-buttons history-clear-button" onclick="return confirm('Voce tem certeza que deseja deletar todos as tarefas do historico?');">Limpar historico</a>
                </div>
            </header>
            <?php
            require_once('db.php');
            $db = new DbConnection();
            $resultado = $db->selectAllHistory();
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
                                <th colspan="1" class="table-task-head-buttons"></th>
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
                                <a href="deletetask.php?id=<?php echo $registro["id"]; ?>&type=<?php echo "history" ?>" class="table-task-button-default table-task-delete-button" onclick="return confirm('Voce tem certeza que deseja deletar essa tarefa?');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                            <?php } echo '</tr>';?>
                        </tbody>
                    </table>

                </section>
                <?php
            }else {
                echo '<p class="paragrafo-header">Tudo limpo por aqui <i class="far fa-smile"></i></p>';
                $conn = null;}
                ?>
            </main>
        </div>
        <script src="../js/slim.min.js"></script>
        <script src="../js/popper.min.js" ></script>
        <script src="../js/bootstrap.min.js" ></script>
        
    </body>
</html>