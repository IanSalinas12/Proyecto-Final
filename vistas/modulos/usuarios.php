<?php
$usuarios = Persona::listarUsuarios();

?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Inicio <small></small></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                        <li class="breadcrumb-item">Listado de Usuarios</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?php $_ENV['BASE_URL'] ?>controladores/reportes/pdf.php" method="post" target="_blank">
                                <button class="btn btn-danger" type="submit" >
                                    <i class="fa fa-file-pdf"></i>
                                    Exportar a pdf
                                </button>
                                <button class="btn btn-danger" type="submit">
                                    <i class="fa fa-file-excel"></i>
                                    Exportar a excel
                                </button>
                            </form>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Paterno</th>
                                        <th>Materno</th>
                                        <th>Correo</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($usuarios as $key => $usuario) : ?>
                                        <tr>
                                            <td><?= ($key + 1) ?></td>
                                            <td><?= $usuario['nombre'] ?></td>
                                            <td><?= $usuario['paterno'] ?></td>
                                            <td><?= $usuario['materno'] ?></td>
                                            <td><?= $usuario['usuario'] ?></td>
                                            <td><?= $usuario['estado'] ?></td>
                                            <td>
                                                <button class="btn btn-sm btn-warning">Editar</button>
                                                <button class="btn btn-sm btn-danger">Eliminar</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>