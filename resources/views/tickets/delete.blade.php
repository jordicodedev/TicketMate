@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Delete Ticket: {{$ticket->id}}</div>
                    <div class="card-body">
                      <form action="" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                          <label for="summary">Summary</label>
                          <input type="text" id="summary" name ="summary" class="form-control" value="{{ $ticket->summary }}" disabled/>
                        </div>
                        <div class="form-group">
                          <label for="description">Description</label>
                          <input type="text" id="description" name ="description" class="form-control" value="{{ $ticket->description }}" disabled/>
                        </div>
                        <div class="form-group">
                          <label for="status">Status</label>
                          <input type="text" id="status" name ="status" class="form-control" value="{{ $ticket->status }}" disabled/>
                        </div>
                        <div class="form-group">
                          <label for="status">Assigned to</label>
                          <input type="text" id="assigned_to" name ="assigned_to" class="form-control" value="{{ $ticket->assigned_to }}" disabled/>
                        </div>
                        </br>
                        <button class="btn btn-danger" type="submit">Delete</button>
                        <a href="{{ route('tickets') }}" class="btn btn-secondary">Back</a>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

