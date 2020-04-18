<!doctype html>
<html lang="pt-br">
    <head>
        <title>Lista de Tarefas</title>
        <link rel="stylesheet" type="text/css" href="/css/styles.css">
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
                        <button class="task-button-default new-task-button" input type="submit" value="Criar">Criar</button>

                        <label class="label-new-task-checkbox">
                            <input class="input-new-task-checkbox" type="checkbox" name="checkboxStatus" value="finalizada">Finalizada
                        </label>
                    </div>
                </form>
            </main>
            <script type="text/javascript">
                // var validaForm = function(){
                //     var nomeTarefa = document.getElementById("inputName").value;
                //     if (nomeTarefa == ""){
                //         alert("É necessário informar o nome da Tarefa");
                //         return false;
                //     }
                // }
                // submit do formulário
                //document.getElementById("formulario").onsubmit = validaForm;
            </script>
        </div>
    </body>
</html>