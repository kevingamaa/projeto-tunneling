<?php $this->layout('layout/app', ['title' => 'Tunneling - Novo Ticket']) ?>


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 text-center mt-5 pt-3 ">
            <h1 class="main-title">Novo ticket</h1>
        </div>
        <div class="col-lg-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form action="<?= route('tickets') ?>" method="POST">
                        <div class="form-row">
                            <div class="col-lg-12">
                                <input type="text" class="form-control" name="title" placeholder="Título" required>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <textarea name="description" placeholder="Descrição" class="form-control"  rows="5" required></textarea>
                            </div>
                            <div class="col-lg-6 mx-auto mt-2">
                                <button class="btn btn-success btn-block">
                                    salvar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>