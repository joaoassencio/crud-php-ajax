<?php

require_once './dbcon.php';

if (isset($_POST['save_student']))
{
    $nome = mysqli_real_escape_string($con, $_POST['nome']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $telefone = mysqli_real_escape_string($con, $_POST['telefone']);
    $curso = mysqli_real_escape_string($con, $_POST['curso']);

    if (empty($nome) || empty($email) || empty($telefone) || empty($curso))
    {
        $res = [
            'status' => 422, // Trata sobre erros de input
            'message' => 'Todos os campos são obrigatórios!'
        ];
        echo json_encode($res);
        return false;
    }

    $query = "INSERT INTO `estudantes` (nome, email, telefone, curso) VALUES ('$nome', '$email', '$telefone', '$curso')";
    $query_run = mysqli_query($con, $query);

    if ($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Estudante criado com sucesso!'
        ];
        echo json_encode($res);
        return false;
    }
    else
    {
        $res = [
            'status' => 500, // Trata sobre erros internos
            'message' => 'Erro ao criar o estudante!'
        ];
        echo json_encode($res);
        return false;
    }
}