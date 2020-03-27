<?php

namespace App\Controllers;

use App\Ticket;
use Core\Classes\Controller;
use Core\Classes\Request;

class TicketController extends Controller
{
    public function index( Ticket $ticket)
    {
        $tickets = $ticket->get();
        return  $this->view('ticket.index',  ['tickets' => $tickets ]);
    }

    public function create()
    {
        return  $this->view('ticket.create');
    }

    public function store(Request $request, Ticket $ticket)
    {
        $ticket->create($request->all());
        return redirect('tickets');
    }


    public function edit(Ticket $ticket, $id)
    {
        $ticket = $ticket->find($id);
        if(!is_null($ticket))
        {
            return $this->view('ticket.edit', ['ticket' => $ticket]);  
        }
    }

    public function update(Request $request, Ticket $ticket, $id) {
        $ticket = $ticket->find($id);
        if(!is_null($ticket))
        {
            $ticket->update($request->all());
            return redirect('tickets');
        }
    }

    public function destroy( Ticket $ticket, $id)
    {
        $ticket = $ticket->find($id);
        if(!is_null($ticket))
        {
            $ticket->delete();
        }
        return redirect('tickets');
    }
}
