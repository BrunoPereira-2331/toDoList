<!doctype html>
<html lang="pt-br">
    <head>
        <title>Lista de Tarefas</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../fontawesome-free-5.12.1-web/css/all.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
        
    </head>
    <body>
        <div id="principal">
            <header>
                <h1>Nova Tarefa</h1>
            </header>
            <main>
                <form id="formulario" action="addtask.php">
                    <div class="div-new-task-label">
                        <label class="label-new-task">Nome: 
                            <input id="inputName" class="input-new-task" type="text" name="nome" maxlength="50" autofocus required>
                        </label>

                    </div>

                    <div class="div-new-task-options">
                        <button class="default-style-buttons new-task-button" input type="submit" value="Criar">Criar</button>

                        <label class="label-new-task-checkbox">
                            <input class="input-new-task-checkbox" type="checkbox" name="checkboxStatus" value="finalizada">Finalizada
                        </label>
                    </div>
                </form>
            </main>
            <script type="text/javascript">
            </script>
            <script src="../js/slim.min.js"></script>
            <script src="../js/popper.min.js" ></script>
            <script src="../js/bootstrap.min.js">  </script>

        </div>
    </body>
</html>