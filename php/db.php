<?php class dbconnection{
public function f_obtem_conexao(){
    // Parâmetros
    $servidor = "localhost";
    $usuario = "root";
    $senha = "brunopereira123";
    $bancodedados = "tasklist";
    // Cria uma conexão com o banco de dados
    $conexao = new mysqli( $servidor, $usuario, $senha, $bancodedados);
    // Verifica a conexão
    if ($conexao->connect_error) {
        die("Falha na conexão: " .
            $conexao->connect_error);
    }
    return $conexao;
}

public function obtem_query() {
    return "SELECT id, name, date, status FROM list";
}
}
?>