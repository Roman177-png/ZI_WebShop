@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Tags</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Main page</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <a href="{{ route('tag.create') }}" class="btn btn-primary">Add</a>
              </div>
              
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                  </tr>
                  </thead>    
                  <tbody>
                  @foreach ($tag as $tags)
                  {{ dd($tags->title) }}

                  <tr>
                    <td>{{ $tags->id }}</td>
                    <td><a href="{{ route('tag.show', $tags->id) }}"> {{ $tags->title }}</a></td>
                    {{-- <td><div style="width: 16px; height:16px; background: {{ '#' . $tag->title }}"></div></td> --}}
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              
              </div>
              
              </div>
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
@endsection