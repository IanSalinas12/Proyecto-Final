<div class="content-wrapper">
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Perfil<small></small></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="perfil">Inicio</a></li>
                        <li class="breadcrumb-item">Perfil</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="<?= $_ENV['BASE_URL'] ?>vistas/dist/images/user.png" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center"> Inicie Sesion</h3>

                        <p class="text-muted text-center">Inicie Sesion</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Preguntas</b> <a class="float-right">10</a>
                            </li>
                            <li class="list-group-item">
                                <b>Respuestas</b> <a class="float-right">5</a>
                            </li>

                        </ul>

                        <a href="#" class="btn btn-primary btn-block"><b>Editar</b></a>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class=" p-2 d-flex justify-content-between">

                        <h2>Preguntas Posteadas</h2>
                        <a href="pregunta.html" class="btn btn-primary ">Formular Pregunta</a>
                    </div>
                    <hr>
                    <div class="card-body">


                        <div class="post">
                            <div class="user-block">
                                <img class="img-circle img-bordered-sm" src="<?= $_ENV['BASE_URL'] ?>vistas/dist/images/user.png" alt="user image">
                                <span class="username">
                                    <a href="respuesta/"></a>
                                </span>
                                <span class="description">Shared publicly - 7:30 PM today</span>
                            </div>
                            <p>

                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corporis obcaecati amet cum atque voluptatum quaerat, laudantium quis consequuntur temporibus vitae qui dolores ipsam vero, assumenda beatae ipsum et voluptas voluptatem?
                            </p>

                            <p>
                                <a href="#" class="link-black text-sm">
                                    <i class="far fa-comments mr-1"></i> Respuestas (4)
                                </a>

                            </p>

                        </div>

                        <!-- mensaje sinpreguntas -->
                        <div class="post">

                            <p>Sin Preguntas Posteadas</p>

                        </div>
                        <!-- mensaje sinpreguntas -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>