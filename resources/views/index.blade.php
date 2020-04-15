@extends('layouts.master')

@section('title')
    Home
@endsection

@section('content')
  <!-- Main jumbotron -->
    <div class="jumbotron bicycle-polo-background">
        <div class="container bicycle-polo-text">
            <h1 class="text-center display-4">Birchwood Bicycle Polo Co.</h1>
            <p class="lead">
                We sell only the finest bicycle polo supplies for those seeking fame and glory in this <a href="https://www.youtube.com/watch?v=DaK9Zj3QHDY" target="_blank">sport of kings</a>.
            </p>
            <hr class="my-4">
            <h3><strong>Having trouble with one of our products?</strong></h3>
            <p>
                Talk to one of our support agents now — or fill out the support form below and someone will call you later.
            </p>
            <a class="btn btn-primary btn-lg btn-block" href="#support" role="button">Get help</a>
        </div>
    </div>

    <div class="container">

        @include('_messages')

        <h2 id="support">Contact support</h2>

        <p class="lead">
            Talk with one of our support agents right now by clicking the "Call Support" button on the right. If you can't talk now, fill out a support ticket and an agent will call you later.
        </p>

        <div class="row">

            <div class="col-md-6 order-md-2 mb-4">
                <div class="card">
                    <h5 class="card-header">
                      Talk to support now
                    </h5>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="call-status" class="col-2 col-form-label">Status</label>
                            <div class="col-10">
                                <input id="call-status" class="form-control" type="text" placeholder="Connecting to Twilio..." readonly>
                            </div>
                        </div>
                        <button class="btn btn-lg btn-primary call-support-button" onclick="callSupport()">
                          Call support
                        </button>
                        <button class="btn btn-lg btn-danger hangup-button" disabled onclick="hangUp()">Hang up</button>
                    </div>
                </div>
            </div>

            <div class="col-md-6 order-md-1">
                <form action="ticket" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" name="name" type="text" id="name">
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone number</label>
                        <input class="form-control" name="phone_number" type="text" id="phone_number">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" cols="50" rows="10" id="description"></textarea>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-lg btn-block">Submit ticket</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <small class="p-2">
        Header photo courtesy <a href="https://www.flickr.com/photos/tink20seven/4654348885/">David Sachs via Flickr</a>
    </small>
@endsection
