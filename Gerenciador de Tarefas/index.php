<!DOCTYPE html>
<html>
<head>
    <title>Gerenciador de Tarefas</title>
</head>
<body>
    <h2>Gerenciador de Tarefas</h2>

    <form method="post">
        <label for="tarefa">Nova Tarefa:</label><br>
        <input type="text" id="tarefa" name="tarefa" required><br><br>
        <button type="submit" name="adicionar">Adicionar</button>
    </form>

    <?php
    // Função para adicionar uma nova tarefa
    function adicionarTarefa($tarefa) {
        // Abre ou cria o arquivo de tarefas
        $arquivo = fopen('tarefas.txt', 'a');
        // Adiciona a nova tarefa ao arquivo
        fwrite($arquivo, "$tarefa\n");
        // Fecha o arquivo
        fclose($arquivo);
    }

    // Função para exibir as tarefas
    function exibirTarefas() {
        // Verifica se o arquivo de tarefas existe
        if (file_exists('tarefas.txt')) {
            // Lê as tarefas do arquivo e exibe na página
            $tarefas = file('tarefas.txt', FILE_IGNORE_NEW_LINES);
            echo "<h3>Tarefas:</h3>";
            echo "<ul>";
            foreach ($tarefas as $tarefa) {
                echo "<li>$tarefa <input type='checkbox' name='concluida'></li>";
            }
            echo "</ul>";
        } else {
            echo "<p>Nenhuma tarefa encontrada.</p>";
        }
    }

    // Verifica se o formulário de adicionar foi submetido
    if (isset($_POST['adicionar'])) {
        $novaTarefa = $_POST['tarefa'];
        adicionarTarefa($novaTarefa);
    }

    // Exibe as tarefas existentes
    exibirTarefas();
    ?>
</body>
</html>
