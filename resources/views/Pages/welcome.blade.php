@extends('main')

@section('Title' , '|Home')

@section('content')

    <div class="container">
        <div class = "row">
            <div class ="col-md-12">
                <div class="jumbotron">
                    <h1 class="display-4">My Blog</h1>
                    <p class="lead">Thank you so much for visiting. This is my First blog.Please read my latest posts</p>
                    <hr class="my-4">
                    <p>Get my lastest Post By Clicking the Button Below</p>
                    <a class="btn btn-primary btn-lg" href="#" role="button">Popular Posts</a>
</div>
            </div>
        </div>
        <div class ="col-md-8"></div>

          <div class="row">
                <div class="col-md-8">
                    
                </div>
                <div class="col-md-3 col-md-offset-1"></div>
                <h2>Sidebar</h2>
            </div>

            @foreach($posts as $post)

         <div class = "post">
         <h3>{{  $post -> title}}</h3>

             </div>
               <div class="col-md-3 col-md-offset-1"></div>
                  <p>{{ substr($post -> body,0,60)}} {{strlen($post->body) >60 ?"..." : ""}}</p>
                   <a  href="{{url('blog/'.$post->slug)}}" class = "btn btn-primary btn-lg" >Read More</a>
                     <hr class="my-4">

          @endforeach

        

    </div>
@endsection