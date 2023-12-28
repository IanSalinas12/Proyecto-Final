<?php
$preguntas = Pregunta::listarPreguntas('pregunta', null, null);

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
                        <li class="breadcrumb-item">Preguntas</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity ">
                                    <?php foreach ($preguntas as $pregunta) : ?>
                                        <div class="post clearfix">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm" src="<?= $_ENV['BASE_URL'] ?>vistas/dist/images/user.png" alt="Imagen de usuario">
                                                <span class="username">
                                                    <a href="<?= $_ENV['BASE_URL'] ?>respuestas/<?= $pregunta['id_pregunta'] ?>"><?= $pregunta['titulo'] ?></a>
                                                    <p><?= $pregunta['usuario'] ?></p>
                                                </span>
                                                <span class="description">Compartido públicamente - <?= $pregunta['creado_el'] ?></span>
                                            </div>
                                            <p>
                                                <?= $pregunta['descripcion'] ?>
                                            </p>

                                        </div>
                                    <?php endforeach; ?>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-primary btn-block" href="<?= $_ENV['BASE_URL'] ?>pregunta">
                                Preguntar
                            </a>


                            <a class="btn btn-primary btn-block" href="<?= $_ENV['BASE_URL'] ?>login">
                                Regístrese o inicie sesión para preguntar
                            </a>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>