@extends('layouts.app')

@section('content')
<div class="container">
@include('layouts.partials.alerts')

    <div class="row">
        <div class="mb-3 float-left">
            <a href="/tickets/create" class="btn btn-primary"><i class="bi bi-plus" data-toggle="tooltip" data-placement="top" title="Update the selected ticket"></i> Create Ticket</a>
        </div>
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">{{ __('Your assignments: :countUserTickets tickets in total', ['countUserTickets' => $countUserTickets]) }}</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="card-text rounded bg-primary text-white mx-n1" style="padding: 20px 10px;">
                                    <div>{{$countNew}}</div>
                                    <div>New Tickets</div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card-text rounded bg-success text-white mx-n1" style="padding: 20px 10px;">
                                    <div>{{$countInProgress}}</div>
                                    <div>In progress Tickets</div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card-text rounded bg-danger text-white mx-n1" style="padding: 20px 10px;">
                                    <div>{{$countBlocked}}</div>
                                    <div>Blocked Tickets</div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card-text rounded bg-info text-dark mx-n1" style="padding: 20px 10px;">
                                    <div>{{$countResolved}}</div>
                                    <div>Resolved Tickets</div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card-text rounded bg-dark text-white mx-n1" style="padding: 20px 10px;">
                                    <div>{{$countClosed}}</div>
                                    <div>Closed Tickets</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (count($myTickets) > 0 && isset($myTickets))
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-header">{{ __('Your tickets') }}</div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Assigned to</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($myTickets as $myTicket)
                                    <tr>
                                        <td>{{ $myTicket->id }}</td>
                                        <td>{{ $myTicket->summary }}</td>
                                        <td>{{ $myTicket->status }}</td>
                                        <td>{{ $myTicket->assigned_to }}</td>
                                        <td class="text-start">
                                            <a href="/tickets/{{$myTicket->id}}" class="btn btn-primary"><i class="bi bi-pencil" data-toggle="tooltip" data-placement="top" title="Update the selected ticket"></i></a>
                                            <a href="/tickets/delete/{{$myTicket->id}}" class="btn btn-danger"><i class="bi bi-trash" data-toggle="tooltip" data-placement="top" title="Delete the selected ticket"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    
                </div>
            </div>
        @else
            <p>You have no assigned tickets</p>
        @endif
        @if (count($tickets) > 0 && isset($tickets))

        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">{{ __('All tickets') }}</div>
                    <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Assigned to</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)
                            <tr>
                                <td>{{ $ticket->id }}</td>
                                <td>{{ $ticket->summary }}</td>
                                <td>{{ $ticket->status }}</td>
                                <td>{{ $ticket->assigned_to }}</td>
                                <td class="text-start">
                                <a href="/tickets/{{$ticket->id}}" class="btn btn-primary"><i class="bi bi-pencil" data-toggle="tooltip" data-placement="top" title="Update the selected ticket"></i></a>
                                <a href="/tickets/delete/{{$ticket->id}}" class="btn btn-danger"><i class="bi bi-trash" data-toggle="tooltip" data-placement="top" title="Delete the selected ticket"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
        @else
            <p>There are no current tickets available. Create a new one!</p>
        @endif
    </div>
</div>
@endsection
