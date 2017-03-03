@extends('layouts.backend')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blog
        <small>Create new blog</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}">Home</a></li>
        <li class="active"><i class="fa fa-dashboard"></i> Blog</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <!-- /.box-header -->


              <div class="box-body ">
                {!! Form::model($post, [
                    'method' => 'POST',
                    'route' => 'backend.blog.store'
                ]) !!}

                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                  {!! Form::label('title') !!}
                  {!! Form::text('title', null, ['class' => 'form-control']) !!}

                  @if($errors->has('title'))
                    <span class="help-block">{{ $errors->first('title') }}</span>
                  @endif
                </div>

                <div class="form-group  {{ $errors->has('slub') ? 'has-error' : '' }}">
                  {!! Form::label('slub') !!}
                  {!! Form::text('slub', null, ['class' => 'form-control']) !!}

                  @if($errors->has('slug'))
                    <span class="help-block">{{ $errors->first('slug') }}</span>
                  @endif

                </div>

                <div class="form-group  {{ $errors->has('except') ? 'has-error' : '' }}">
                  {!! Form::label('except') !!}
                  {!! Form::textarea('except', null, ['class' => 'form-control']) !!}

                  @if($errors->has('except'))
                    <span class="help-block">{{ $errors->first('except') }}</span>
                  @endif
                </div>

                <div class="form-group  {{ $errors->has('body') ? 'has-error' : '' }}">
                  {!! Form::label('body') !!}
                  {!! Form::textarea('body', null, ['class' => 'form-control']) !!}


                  @if($errors->has('body'))
                    <span class="help-block">{{ $errors->first('body') }}</span>
                  @endif
                </div>

                <div class="form-group  {{ $errors->has('published_at') ? 'has-error' : '' }}">
                  {!! Form::label('published_at', 'published Date') !!}
                  {!! Form::text('published_at', null, ['class' => 'form-control']) !!}

                  @if($errors->has('published_at'))
                    <span class="help-block">{{ $errors->first('published_at') }}</span>
                  @endif
                </div>

                <div class="form-group  {{ $errors->has('category_id') ? 'has-error' : '' }}">
                  {!! Form::label('category_id', 'Category') !!}
                  {!! Form::select('category_id', App\Category::pluck('title', 'id'), null, ['class' => 'form-control', 'placeholder' => 'Choose Category']) !!}

                  @if($errors->has('category_id'))
                    <span class="help-block">{{ $errors->first('category_id') }}</span>
                  @endif
                </div>
                <hr>
                {!! Form::submit('Create new blog', ['class' => 'btn btn-info']) !!}

                {!! Form::close() !!}


              </div>
              <!-- /.box-body -->

            </div>
            <!-- /.box -->
          </div>
        </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
