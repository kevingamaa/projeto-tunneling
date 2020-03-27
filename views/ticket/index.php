<?php $this->layout('layout/app', ['title' => 'Tunneling - Tickets']) ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 text-center mt-5 pt-3 ">
            <a href="<?=route('tickets/new') ?>" class="btn btn-primary float-right">
                + <span>adicionar </span>
            </a>
            <h1 class="main-title">Lista de tickets</h1>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-dark table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Título</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Status</th>
                                <th scope="col">Data de criação</th>
                                <th scope="col">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($tickets as $ticket): ?>
                            <tr>
                                <th scope="row"><?=$ticket->id?></th>
                                <td><?=$ticket->title?></td>
                                <td><?php echo $ticket->description ?></td>
                                <td><?=$ticket->status ?></td>
                                <td><?=date('d/m/Y H:i', strtotime($ticket->created_at)) ?></td>
                                <td>
                                    <a href="<?=route('tickets/edit/'.$ticket->id) ?>" class="btn btn-primary">
                                        Editar
                                    </a>
                                    <form action="<?=route('tickets/'.$ticket->id) ?>" method="POST" class="d-inline">
                                        <?php _method('DELETE') ?>
                                        <button class="btn btn-danger">
                                            &times;
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>