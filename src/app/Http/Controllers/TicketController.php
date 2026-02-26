<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Services\TicketService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\SearchTicketRequest;
use App\Http\Requests\UpdateDataTicketRequest;

use App\Models\Type;

class TicketController extends Controller
{
    protected $ticketService;

    public function __construct(TicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }

    public function search(SearchTicketRequest $request)
    {
        $query = $request->input('query');

        $tickets = Ticket::where('title', 'like', '%' . $query . '%')->paginate(10);

        return view('user.tickets.index', compact('tickets'));
    }


    public function showAll()
    {
        $this->authorize('index', Ticket::class);

        $types = Type::all();

        return view('user.tickets.index', compact('types'));
    }


    public function showCreateForm()
    {
        $types = Type::all();
        return view('user.tickets.create', compact('types'));
    }

    public function create(StoreTicketRequest $request)
    {
        $this->authorize('create', Ticket::class);

        $ticket = $this->ticketService->createTicket($request->validated());

        return redirect()->route('user.tickets.index', ['locale' => app()->getLocale()])->with('success', 'Ticket creado con éxito.');
    }

    public function destroy(string $locale, Ticket $ticket)
    {
        // Verifica si el usuario tiene permiso para eliminarlo (opcional)
        if ($ticket->user_id !== auth()->id()) {
            abort(403, 'No autorizado.');
        }

        $ticket->delete();

        return redirect()->route('user.tickets.index', ['locale' => $locale])
                        ->with('success', __('frontoffice.tickets.deleted_successfully'));
    }


    public function show(String $locale,Ticket $ticket)
    {
        $this->authorize('view', $ticket);

        $ticket->load('comments');

        return view('user.tickets.show', compact('ticket'));
    }


    public function validateResolution(Request $request, string $locale, Ticket $ticket)
    {
        $this->authorize('update', $ticket);

        $inputStatus = $request->input('status');
        $status = in_array($inputStatus, ['resolved', 'closed']) ? 'closed' : 'pending';

        $user = Auth::guard('user')->user();
    
        $this->ticketService->updateStatus(
            $ticket,
            $status,
            $user,
            'Ticket con id ' . $ticket->id . ' y título "' . $ticket->title . '" actualizado a "' . $status . '"',
        );

        $message = $status === 'closed' 
            ? 'La solución ha sido validada y el ticket cerrado correctamente.' 
            : 'El ticket ha sido marcado como pendiente.';

        return redirect()->route('user.tickets.index', ['locale' => app()->getLocale()])->with('success', $message);
    }


    public function edit($locale, Ticket $ticket)
    {
        app()->setLocale($locale);
        return view('user.tickets.edit', compact('ticket'));
    }


    public function update(UpdateDataTicketRequest $request, String $locale, Ticket $ticket)
    {
        $ticket->update($request->validated());

        return redirect()->route('user.tickets.index', ['locale' => app()->getLocale()])->with('success', __('frontoffice.tickets.updated_success'));
    }


    
    public function closeTicket(String $locale,Ticket $ticket)
    {
        $this->authorize('update', $ticket);

        $admin = Auth::guard('admin')->user();


        if($ticket->status !== 'closed')
        {
            $this->ticketService->updateStatus(
                $ticket,
                'closed',
                $admin,
                'Ticket con id ' . $ticket->id . ' con el título ' . $ticket->title . ' cerrado',
            );
        }

        return redirect()->route('admin.manage.tickets', ['locale' => $locale])->with('success', 'Ticket cerrado.');
    }



    public function reopenTicket(String $locale,Ticket $ticket)
    {
        $this->authorize('update', $ticket);

        $admin = Auth::guard('admin')->user();

        $this->ticketService->updateStatus(
            $ticket,
            'pending',
            $admin,
            'Ticket con id ' . $ticket->id . ' con el título ' . $ticket->title . ' abierto',
        );

        return redirect()->route('admin.manage.tickets', ['locale' => $locale])->with('success', 'Ticket reabierto.');
    }


}





