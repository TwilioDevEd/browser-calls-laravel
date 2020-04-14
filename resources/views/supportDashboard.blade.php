@extends('layouts.master')

@section('title')
    Support Dashboard
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col">
        <h2>Support Tickets</h2>
    
        <p class="lead">
          This is the list of most recent support tickets. Click the "Call customer" button to start a phone call from your browser.
        </p>
      </div>
    </div>


    <div class="row">

      <div class="col-md-5 order-md-2 mb-4">
        <div class="card">
          <h5 class="card-header">
            Make a call
          </h5>
          <div class="card-body">
            <div class="form-group row">
              <label for="call-status" class="col-3 col-form-label">Status</label>
              <div class="col-9">
                <input id="call-status" class="form-control" type="text" placeholder="Connecting to Twilio..." readonly>
              </div>
            </div>
            <button class="btn btn-lg btn-success answer-button" disabled>Answer call</button>
            <button class="btn btn-lg btn-danger hangup-button" disabled onclick="hangUp()">Hang up</button>
          </div>
        </div>
      </div>

      <div class="col-md-7 order-md-1">
        @foreach ($tickets as $ticket)
          <div class="card border-default">
            <h5 class="card-header">
              Ticket #{{ $ticket->id }}
              <small class="float-right">{{ $ticket->created_at}}</small>
            </h5>

            <div class="card-body">
              <div class="row">
                <div class="col">
                  <p><strong>Name:</strong> {{ $ticket->name }}</p>
                  <p><strong>Phone number:</strong> {{ $ticket->phone_number }}</p>
                  <p><strong>Description:</strong></p>
                  {{ $ticket->description }}
                </div>

                <div class="col col-auto">
                  <button onclick="callCustomer('{{ $ticket->phone_number }}')" type="button" class="btn btn-primary btn-lg call-customer-button">
                    Call customer
                  </button>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>

    </div>
  </div>
@endsection('content')
