@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Ticket: {{$ticket->id}}</div>
                    <div class="card-body">
                      <form action="" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                          <label for="summary">Summary</label>
                          <input type="text" id="summary" name ="summary" class="form-control {{ $errors->has('summary') ? 'is-invalid' : ''}} " value="{{ old('summary', $ticket->summary) }}" />
                          @if($errors->has('summary'))
                              <small class="form-text text-muted">
                                {{$errors->first('summary')}}
                              </small>
                          @endif
                        </div>
                        <div class="form-group">
                          <label for="description">Description</label>
                          <input type="text" id="description" name ="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : ''}}" value="{{ old('summary', $ticket->description) }}" />
                          @if($errors->has('description'))
                            <small class="form-text text-muted">
                                {{$errors->first('description')}}
                            </small>
                          @endif
                        </div>
                        <div class="form-group">
                          <label for="status">Status</label>
                          <select class="form-select" id="status" name ="status" value="{{ $ticket->status }}">
                            @foreach($statuses as $status)
                              <option value="{{ $status->name }}" {{ $ticket->status == $status->name ? "selected" : "" }}>{{ $status->name }}</option>
                            @endforeach
                          </select> 
                        </div>
                        <div class="form-group">
                          <label for="status">Assigned to</label>
                          <select class="form-select" id="assigned_to" name ="assigned_to" value="{{ $ticket->assigned_to }}">
                          <option value=""></option>
                            @foreach($users as $user)
                              <option value="{{ $user->name }}" {{ $ticket->assigned_to == $user->name ? "selected" : "" }}>{{ $user->name }}</option>
                            @endforeach
                          </select> 
                        </div>
                        </br>
                        <button class="btn btn-primary" type="submit">Update</button>
                        <a href="{{ route('tickets') }}" class="btn btn-secondary">Back</a>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection