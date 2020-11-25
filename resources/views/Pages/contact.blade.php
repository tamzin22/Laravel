@extends('main')

@section('Title' , '|Contact')


@section('content')

        <div class = "row">
            <div class ="col-md-12">
                <h1>Contact Us</h1>
                <p>Please Remember Me Lord </p>
                <hr>
                  <form>
                      
                      <div class="form-group">
                          <label name ="email">Email:</label>
                          <input id="email" name="email" class="form-control">
                      </div>

                      <div class="form-group">
                          <label name ="subject">Subject:</label>
                          <input id="subject" name="subject" class="form-control">
                      </div>

                      <div class="form-group">
                          <label name ="message">Message:</label>
                          <textarea id="message" name="message" class="form-control"> Type you Message here...</textarea>
                      </div>

                      <input type="Submit" value="Send Message" class="btn btn-success">

                  </form>
            </div>
        </div>
    </div>            

  @endsection
  @section('sidebar')

  @endsection