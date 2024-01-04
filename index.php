<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Cadastro de alunos</title>
  </head>
  <body>


    <!-- Modal -->
    <div class="modal fade" id="studentAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Adicionar estudante</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="cad.php" method="post" id="saveStudent">
                    <div class="modal-body">

                        <div class="alert alert-warning d-none"></div>

                        <div class="mb-3">
                            <label for="">Nome</label>
                            <input type="text" name="nome" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">E-mail</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Telefone</label>
                            <input type="text" name="telefone" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Curso</label>
                            <input type="text" name="curso" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar estudante</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <h4>Cadastro de alunos
                            <!-- Botão para acionar modal -->
                            <button type="button" class="btn btn-primary float-end" data-toggle="modal" data-target="#studentAddModal">
                            Adicionar estudante
                            </button>
                        </h4>
                            

                        <div class="card-body">
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>E-mail</th>
                                        <th>Telefone</th>
                                        <th>Curso</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        require_once './dbcon.php';

                                        $query = "SELECT * FROM estudantes";
                                        $query_run = mysqli_query($con, $query);

                                        if (mysqli_num_rows($query_run)>0)
                                        {
                                            foreach ($query_run as $estudante)
                                            {
                                                ?>

                                                    <tr>
                                                        <td><?= $estudante['nome'] ?></td>
                                                        <td><?= $estudante['email'] ?></td>
                                                        <td><?= $estudante['telefone'] ?></td>
                                                        <td><?= $estudante['curso'] ?></td>
                                                        <td>
                                                            <a href="" class="btn btn-info">Editar</a>
                                                            <a href="" class="btn btn-success">Editar</a>
                                                            <a href="" class="btn btn-danger">Apagar</a>       
                                                        </td>
                                                    </tr>
                                                <?php
                                            }
                                        }
                                    ?>
                                    
                                </tbody>
                            </table>
                            
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    

    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!-- JavaScript (Opcional) -->
    <script src="./js/script.js"></script>
    
  </body>
</html>