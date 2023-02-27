<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TicketUpdateRequest;
use App\Models\Ticket;
use App\Models\TicketStatus;
use App\Models\User;
use App\Repositories\TicketRepository;


class TicketController extends Controller
{
    protected $ticketRepository;

    public function __construct(TicketRepository $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
    }

    /**
     * Display the home page with ticket statistics and ticket lists.
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $userName = auth()->user()->name;
        $tickets = Ticket::latest()->get();
        $myTickets = Ticket::where('assigned_to', $userName)->latest()->get();

        $countNew = $this->ticketRepository->countAssignedTicketsByStatus($userName, 'New');
        $countInProgress = $this->ticketRepository->countAssignedTicketsByStatus($userName, 'In Progress');
        $countBlocked = $this->ticketRepository->countAssignedTicketsByStatus($userName, 'Blocked');
        $countResolved = $this->ticketRepository->countAssignedTicketsByStatus($userName, 'Resolved');
        $countClosed = $this->ticketRepository->countAssignedTicketsByStatus($userName, 'Closed');

        $countUserTickets = $this->ticketRepository->countAssignedTicketsByAllStatuses($userName);

        return view('home', compact('tickets', 'myTickets', 'countNew', 'countInProgress', 'countResolved', 'countBlocked', 'countClosed', 'countUserTickets'));
    }

    /**
     * Store a newly created ticket in storage.
     * 
     * @param  \App\Http\Requests\TicketUpdateRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        $statuses = TicketStatus::all();
        $users = User::all();
        return view('tickets.create', with(compact('statuses', 'users')));
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \App\Http\Requests\TicketUpdateRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TicketUpdateRequest $request)
    {
        Ticket::create([
            'summary' => $request->input('summary'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
            'assigned_to' => $request->input('assigned_to')
        ]);

        return redirect()->route('tickets')->with('success', 'Ticket created successfully.');
    }

    /**
     * Display the specified resource.
     * 
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        $statuses = TicketStatus::all();
        $users = User::all();
        return view('tickets.show', with(compact('ticket', 'statuses', 'users')));
    }

    /**
     * Show the form for editing the specified ticket.
     * 
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);

        return view('tickets.edit', ['ticket' => $ticket]);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param  \App\Http\Requests\TicketUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TicketUpdateRequest $request, $id)
    {
        $ticket = Ticket::findOrFail($id);

        $ticket->summary = $request->input('summary');
        $ticket->description = $request->input('description');
        $ticket->status = $request->input('status');
        $ticket->assigned_to = $request->input('assigned_to');

        $ticket->save();

        return redirect()->route('home')->with('success', 'Ticket updated successfully.');
    }

    /**
     * Show the form for deleting the specified resource.
     * 
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\View\View
     */
    public function delete(Ticket $ticket)
    {
        return view('tickets.delete', compact('ticket'));
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);

        $ticket->delete();

        return redirect()->route('home')->with('success', 'Ticket deleted successfully.');
    }
}
