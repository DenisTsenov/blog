@extends('main') 

@section('title', '| Edit Post')

@section('stylesheets')
    {!! Html::style('css/select2.min.css')!!}
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'link code'
        });
    </script>
@endsection

@section('content')

<div class="row">
    {!! Form::model($posts, array('route' => array('posts.update', $posts->id), 'method' => 'PUT', 'files' => true)) !!}
    <div class="col-md-8">
        {{ Form::label('title', 'Title')}}
        {{ Form::text('title', null, array('class' => 'form-control input-lg',
                    'required' => '', 'minlength' => '5', 'maxlength' => '255')) }}
        
        {{ Form::label('slug', 'Slug', array('class' => 'form-spacing-top'))}}
        {{ Form::text('slug', null, array('class' => 'form-control ',
                    'required' => '', 'minlength' => '5', 'maxlength' => '255'))}}   
                    
        {{ Form::label('category_id', 'Category', array('class' => 'form-spacing-top'))}}
        {{ Form::select('category_id', $categories,null ,array('class' => 'form-control form-spacing-top')) }}
        
        <!-- da oprawq mulriple  formata  za  tagowete -->
        {{ Form::label('tags', 'Tags', array('class' => 'form-spacing-top')) }}
        {{ Form::select('tags[]', $tags, null, array('class' => 'form-control select2-multi',  'multiple' => 'multiple')) }}
        
        {{ Form::label('feature_image', 'Update  Image', array('class' => 'form-spacing-top')) }}
        {{ Form::file('featured_image') }}
        
        {{ Form::label('body', 'Content', array('class' => 'form-spacing-top'))}}
        {{ Form::textarea('body', null, array('class' => 'form-control',
            'required' => '', 'minlength' => '5'))}}
    </div>
    <div class="col-md-4">
        <div class="well">

            <dl class="dl-horizontal">
                <dt>Created At:</dt>
                <dd>{{ date('M / j, Y H:i', strtotime($posts->created_at)) }}</dd>
            </dl>

            <dl class="dl-horizontal">
                <dt>Last Updated:</dt>
                <dd>{{ date('M / j, Y H:i', strtotime($posts->updated_at)) }}</dd>
            </dl>
            <hr/>
            <div class="row">
                <div class="col-sm-6">

                    {!! Html::linkRoute('posts.show', 'Cancel', array($posts->id),
                    array('class' => 'btn btn-danger btn-block')) !!}

                </div>

                <div class="col-sm-6">

                    {{ Form::submit('Save Changes', array('class' => 'btn btn-success btn-block')) }}

                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>

@endsection

@section('scripts')

    {!! Html::script('js/select2.min.js')!!}
    
    <script type="text/javascript">
        $(.select2-multi).select2();
        $(.select2-multi).select2().val({!! json_encode($posts->tags()->getRelatedIds()) !!}).trigger('change');
    </script>

@endsection