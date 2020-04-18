<?php
                // Looping pelos registros retornados
                while($registro = $resultado->fetch_assoc()) {
                     
                    <tr class="habitTableRow">
                        <td class="habitTableData"><?php echo $registro["name"]; ?></td>
                        <td class="habitTableData"><a href="winHabit.php?id=<?php
                    echo $registro["id"]; ?>">Vencer</a></td>
                        <td class="habitTableData"><a href="giveupHabit.php?id=<?php
                    echo $registro["id"]; ?>">Desistir</a></td>
                    </tr>
                    <?php
                } // fim do looping
                    ?>

body {
background-color: #8daff0
}

th {
border: 1px solid black;
}

.signhabitbtn {
    padding: 15px;
    color: #fff;
    font-size: 20px;
    cursor: pointer;
    outline: none;
    background-color: #6b9dfc;
    border-radius: 10px;
    border: none;
    box-shadow: 0 6px #999;
}
.signhabitbtn:hover {
    background-color: #3851d8;
    border: 0px solid #6b9dfc;
    box-shadow: 0 6px #999;
        
}
.signhabitbtn:active {
  background-color: #3851d8;
  box-shadow: 0 4px #666;
  transform: translateY(4px);
}

.habitTable {
    border-collapse: collapse;
    border-width: 4px;
    border-style: solid;
    border-color: #5384e0;
}

.habitTableRow {
    border-collapse: collapse;
}

.habitTableData {
    border: 1px solid black;
}

.newHabitInput {
    background-color: #fff;
    border-style: solid;
    border-width: 1px;
    border-color: #6b9dfc;
}

.newHabitBtn {
    padding: 8px;
    color: #fff;
    font-size: 20px;
    cursor: pointer;
    outline: none;
    background-color: #6b9dfc;
    border-radius: 10px;
    border: none;
    box-shadow: 0 4px #999;
}

.newHabitBtn:hover {
    background-color: #3851d8;
    border: 0px solid #6b9dfc;
    box-shadow: 0 3px #999;
        
}
.newHabitBtn:active {
  background-color: #3851d8;
  box-shadow: 0 2px #666;
  transform: translateY(4px);
}

echo $registro["id"]; ?>"><button class="table-task-ok-btn">ok</button></a></td>
                        <td class="table-task-data table-task-delete"><a href="deletetask.php?id=<?php
                    echo $registro["id"]; ?>"><button class="table-task-delete-btn">excluir</button></a></td>
                    </tr>

<a href="oktask.php?id=<?php 
                        echo $registro["id"]; ?>"><button class="table-task-ok-btn">ok</button></a>
                        <a href="deletetask.php?id=<?php
                    echo $registro["id"]; ?>"><button class="table-task-delete-btn">excluir</button></a>




<!doctype html>
<html lang="pt-br">
    <head>
        <title>Lista de tarefas</title>
        <meta charset="utf-8">
        <meta name="author" content="Bruno">
        <meta name="description" content="descrição">
        <meta name="keywords" content="html5, tecnologia, to do list">
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="Expires" content="0">
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>

    <body>
        <div id="principal">
            <header>
                <h1>Lista de Tarefas</h1>
                <p>Cadastre aqui suas tarefas</p>
            </header>
            <?php
            require_once('db.php');
            $db = new dbconnection();
            $conexao = $db->f_obtem_conexao();
            // Executa a query da variável $sql
            $sql = "SELECT id "." , name  "." , date "." , status FROM list";
            $resultado = $conexao->query($sql);
            // Verifica se a query retornou registros
            if ($resultado->num_rows > 0) {
            ?>
            <br/>
            <main>
                <div class="container-table-task">
                    <table class="table-task">
                        <tbody class="table-task-body">
                            <?php
                while($registro = $resultado->fetch_assoc()) {
                            ?>
                            <tr class="table-task-row">
                                <td class="table-task-data table-task-name"><?php echo $registro["name"]; ?></td>
                                <td class="table-task-data table-task-date"><?php echo $registro["date"]; ?></td>
                                <?php
                    if ($registro["status"] == 'finalizada') {
                                ?>
                                <td class="table-task-data table-task-green"><?php echo $registro["status"] ?></td>
                                <?php
                    }
                    else { ?>
                        <td class="table-task-data table-task-red"> <?php $registro["status"] ?></td>
                                }
                                <div class="container-td-buttons">
                                    <td class="table-task-ok">
                                        <a href="oktask.php?id=<?php echo $registro["id"]; ?>"><button onclick="changeCssColor()" class="table-task-ok-btn">ok</button></a></td>
                                    <td class="table-task-delete">
                                        <a href="deletetask.php?id=<?php echo $registro["id"]; ?>"><button class="table-task-delete-btn">excluir</button></a></td>
                                </div>
                            </tr>
                            <?php
                    }
                            ?>
                        </tbody>
                    </table>
                </div>
                <?php
                } else {
                ?>
                <p>Você não possui Tarefas cadastradas!</p>
                <?php
                } // fim do if
                // Fecha a conexão com o MySQL
                $conexao->close();
                ?>
                <a href="newtask.php"><button class="new-task-btn" >Cadastrar Tarefa</button></a>
            </main>
        </div>
        <script>
        </script>
    </body>
</html>

<button class="table-task-ok-btn">ok</button>
<button class="table-task-delete-btn">excluir</button>