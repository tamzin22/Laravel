@extends('main')

@section('title' , '|Edit Blog Post')

@section('stylesheets')

{!! Html::style('css/select2.min.css')!!}

@endsection

@section('content')

<div class="row">

	{!! Form::model($post ,['route' => ['posts.update' , $post -> id] , 'method' => 'PUT']) !!}

      <div class="col-md-8">
      	

             {{  Form::label('title',"Title:",['class'=>'form-spacing-top']) }}
             {{  Form::text('title',null,['class'=>'form-control input-lg']) }}

             {{  Form::label('category_id',"Category:",['class'=>'form-spacing-top']) }}
             {{  Form::select('category_id',$categories,null,['class' => 'form-control']) }}

             {{  Form::label('tags',"Tags:",['class'=>'form-spacing-top'])   }}
             {{  Form::select('tags[]',$tags,null,['class'=>'select2-multi','multiple' => 'multiple']) }}

             {{  Form::label('slug',"Slug:",['class'=>'form-spacing-top']) }}
             {{  Form::text('slug',null,['class'=>'form-control'])}}

             {{  Form::label('body',"Post Body",['class'=>'form-spacing-top']) }}
             {{  Form::textarea('body',null,['class'=>'form-control']) }}

          

      </div>
         <div class="col-md-4">

          <div class="well">

           	 <dl class="dl-horizontal">
           	 	<dt>Creates On:</dt>
           	 	<dd>{{date('M j,Y H:i',strtotime($post -> created_at))}}</dd>
           	 </dl>

           	 <dl class="dl-horizontal">

           	 	<dt>Updated On:</dt>
           	 	<dd>{{date('M j,Y H:i',strtotime($post-> updated_at))}}</dd>
           	 </dl>
           	 <hr>

           	  <div class="row">
                 <div class="col-md-6">
                 	{!! Html::linkRoute('posts.show', 'Cancel' , array($post->id) , array('class' => "btn btn-danger btn-block")) !!}
                 	
                 </div>
                 <div class="col-md-6">
                    {{ Form::submit('Save' , ['class' =>'btn btn-success btn-block'])}}
                 </div>
              </div> 

           </div>
          </div> 
    {!! Form::close() !!}    
   </div> 

@stop

@section('scripts')

 <script type="text/javascript">

    $('.select2-multi').select2();

  </script>

  {!! Html::scripts('js/select2.min.js) !!}

@endsection