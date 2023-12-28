<?php

$pregunta = Pregunta::listarPreguntas('pregunta', 'id_pregunta', (explode('/', $_GET['ruta']))[1]);
$respuestas = Respuesta::listarRespuestas('respuesta', 'id_pregunta', (explode('/', $_GET['ruta']))[1]);

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
                        <li class="breadcrumb-item">Respuesta</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity ">

                                    <div class="post">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm" src="<?= $_ENV['BASE_URL'] ?>vistas/dist/images/user.png" width="128px" alt="user image ">
                                            <span class="username">
                                                <p><?= $pregunta['titulo'] ?></p>
                                                <p><?= $pregunta['usuario'] ?></p>
                                            </span>
                                            <span class="description">Compartido públicamente - <?= $pregunta['creado_el'] ?> </span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                            <?= $pregunta['descripcion'] ?>
                                        </p>
                                        <img class="img-fluid pad" src="<?= $_ENV['BASE_URL'] . $pregunta['foto'] ?>" alt="Photo">

                                    </div>

                                    <?php if (count($respuestas) > 0) : ?>
                                        <h4> <?= count($respuestas) ?> Respuestas</h4>
                                        <hr>

                                        <?php foreach ($respuestas as $key => $respuesta) : ?>
                                            <div class="post clearfix">
                                                <p><strong>Respuesta: <?= ($key + 1) ?></strong></p>
                                                <p>
                                                    <?= $respuesta['descripcion'] ?>
                                                </p>

                                                <?php if ($respuesta['foto'] != "") : ?>
                                                    <div class="border float-right ml-5 p-1  mb-2">
                                                        <img class="img-fluid pad" src="<? $_ENV['BASE_URL'] . $respuesta['foto']?>" alt="respuesta">
                                                    </div>
                                                <?php endif; ?>
                                                <div class="row d-flex justify-content-end">
                                                    <div class="col-md-6">
                                                        <!-- <p class="float-left ml-2">
                                                            <a href="# " class="link-black text-primary">
                                                                <i class="fa fa-thumbs-up mr-1"></i> </a>
                                                            10 Like
                                                        </p> -->
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="user-block">
                                                            <img class="img-circle img-bordered-sm" src="<?= $_ENV['BASE_URL'] ?>vistas/dist/images/user.png" alt="User Image" />
                                                            <span class="username">
                                                                <small class="text-sm text-muted">Respondido el <?= $respuesta['creado_el'] ?> por:</small>
                                                                <p><?= $respuesta['usuario'] ?></p>
                                                            </span>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <h3>No hay respuesta</h3>
                                    <?php endif; ?>

                                    <div class="card card-primary card-outline">
                                        <div class="card-header">
                                            <h3 class="card-title">Tu respuesta</h3>
                                        </div>
                                        <form method="POST" enctype="multipart/form-data">
                                            <div class="card-body">
                                                <h5>Escribe tu respuesta:</h5>
                                                <div class="form-group">
                                                    <input type="hidden" name="id_pregunta" value="<?= (explode('/', $_GET['ruta']))[1] ?>">
                                                    <textarea name="descripcion" id="descripcion" class="form-control" rows="5" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <div class="btn btn-default btn-file">
                                                        <i class="fas fa-paperclip"></i> Subir una captura de la respuesta
                                                        <input type="file" name="foto" id="foto" accept="image/png, image/jpg, image/jpeg" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="float-right">
                                                    <button type="submit" class="btn btn-primary"> Publicar tu respuesta</button>
                                                </div>
                                            </div>
                                            <?php
                                            $respuesta = new Respuesta();
                                            $respuesta->guardarRespuesta();
                                            ?>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Otras Preguntas</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <ul class="nav nav-pills flex-column">

                                <li class="nav-item active">
                                    <a href="#" class="nav-link">
                                        Preguntas de prueba
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>