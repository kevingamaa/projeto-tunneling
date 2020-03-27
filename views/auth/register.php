<?php


$this->layout('layout/auth', ['title' => 'Tunneling - Entrar']) ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg mx-3 text-center mt-5 pt-5 shadow auth ">
            <h1 class="main-title">Registro</h1>
            <div class="row">
                <div class="col-lg-4 mx-auto  ">
                    <form action="<?= route('register') ?>" method="POST">
                        <div class="card">


                            <div class="card-body">
                                <div class="form-row">
                                    <?php if (isset($_GET['error'])) : ?>
                                        <div class="col-lg-12">
                                            <div class="alert alert-warning">
                                                <?= $_GET['error'] ?>
                                            </div>
                                        </div>
                                    <?php endif ?>
                                    <div class="col-lg-12">
                                        <input type="text" class="form-control" placeholder="Name" name="name" autocomplete="name">
                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <input type="email" class="form-control" placeholder="E-mail" name="email" autocomplete="email">
                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <input type="password" class="form-control" minlength="6" placeholder="Senha" name="password" data-confirm="true" autocomplete="new-password">
                                        <div class="error alert alert-warning">
                                            As senhas não conferem
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <input type="password" class="form-control" minlength="6" placeholder="Confirme senha" name="confirm_password" data-confirm="true" autocomplete="new-password">
                                        <div class="error alert alert-warning">
                                            As senhas não conferem
                                        </div>
                                    </div>

                                    <div class="col-lg-6 ml-auto mt-1">
                                        Já tem conta? <a href="<?= route('login') ?>">entrar</a>
                                    </div>
                                    <div class="col-lg-7 mx-auto mt-2">
                                        <button class="btn btn-primary btn-block">
                                            Registrar-se
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>