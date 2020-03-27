<?php $this->layout('layout/app', ['title' => 'Tunneling - Editar Ticket']) ?>


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 text-center mt-5 pt-3 ">
            <h1 class="main-title">Editar ticket #<?=$ticket->id?></h1>
        </div>
        <div class="col-lg-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form action="<?= route('tickets/'. $ticket->id) ?>" method="POST">
                        <?php _method('PUT') ?>
                        <div class="form-row">
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="title" value="<?=$ticket->title?>" placeholder="Título" required>
                            </div>
                            <div class="col-lg-4">
                                <select name="status" class="custom-select" data-value="<?=$ticket->status?>">
                                    <option value="pendente"  >Pendente</option>
                                    <option value="expirado">Expirado</option>
                                    <option value="bloqueado">Bloqueado</option>
                                </select>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <textarea name="description" placeholder="Descrição" class="form-control"  rows="5" required><?php echo $ticket->description?></textarea>
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