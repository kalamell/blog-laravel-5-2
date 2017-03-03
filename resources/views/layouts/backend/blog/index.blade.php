@extends('layouts.backend')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blog
        <small>Display All Blog Post</small>
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
              <div class="box-header">
                <div class="pull-left">
                  <a href="{{ route('backend.blog.create') }}" class="btn btn-success">Add</a>
                </div>
              </div>

              <div class="box-body ">

                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Action</th>
                      <th>Title</th>
                      <th>Author</th>
                      <th>Category</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($posts as $post)
                    <tr>
                      <td>
                        <a href="{{ route('backend.blog.edit', $post->id ) }}" class="btn btn-xs btn-default">
                          <i class='fa fa-edit'></i>
                        </a>
                        <a href="{{ route('backend.blog.destroy', $post->id ) }}" class="btn btn-xs btn-danger">
                          <i class='fa fa-times'></i>
                        </a>
                      </td>
                      <td>{{ $post->title }}</td>
                      <td>{{ $post->author->name }}</td>
                      <td>{{ $post->category->title }}</td>
                      <td>
                          <abbr title="{{ $post->dateFormatted(true) }}"> {{ $post->dateFormatted() }}</abbr>
                          {!! $post->publictionLabel() !!}
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.box-body -->
              <div class='box-footer'>
                {{ $posts->links() }}
              </div>
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
