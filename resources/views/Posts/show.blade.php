@extends('main')

@section('Title','|View Post')

@section('content')

  <div class="row">
      <div class="col-md-8">
              

          <h1> {{ $post -> title}} </h1>

          <p class ="lead"> {{ $post -> body }}</p>

          <hr>
          <div class="tags">

           @foreach($post->tags as $tag)

          <span class="label label-default">{{ $tag->name }}</span>

        @endforeach
      </div>

      </div> 
    </div>
         <div class="col-md-4">

          <div class="well">

              <dl class="dl-horizontal">
              <label>url:</label>
              <a href="{{ url('blog/'.$post-> slug)}}">{{url('blog/'.$post-> slug)}}</a>
             </dl>

             <dl class="dl-horizontal">
              <label>Category:</label>
              <p>{{ $post -> category -> name }}</p>
             </dl>

           	 <dl class="dl-horizontal">
           	 	<label>Creates On:</label>
           	 	<dd>{{date('M j,Y H:i',strtotime($post -> created_at))}}</dd>
           	 </dl>

           	 <dl class="dl-horizontal">
           	 	<label>Updated On:</label>
           	 	<dd>{{date('M j,Y H:i',strtotime($post-> updated_at))}}</dd>
           	 </dl>
           	 <hr>

           	  <div class="row">
                 <div class="col-md-6">
                 	{!! Html::linkRoute('posts.edit','Edit',array($post->id),array('class' => "btn btn-primary btn-block"))!!}
                 	
                 </div>
                 <div class="col-md-6">

                  {!! Form::open(['route'=>['posts.destroy',$post-> id],'method'=>'DELETE']) !!}
                  {!! Form::submit('Delete',['class' => 'tn btn-danger btn-block'])!!}
                  {!! Form::close()!!}
                 </div>
              </div> 
              <div class="row">
                <div class="col-md-12">
                  {{ Html::linkRoute('posts.index','<< See all Posts',[],['class'=>'btn btn-default btn-block btn-h1-spacing']) }}
                </div>
              </div>

           </div>
          </div> 

   </div> 


@endsection