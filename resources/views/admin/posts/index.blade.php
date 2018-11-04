@extends('layouts.backend.app')

@section('title','Post Manager')

@push('css')
    <!-- DataTables CSS -->
    <link href="{{ asset('assets/backend/vendor/datatables-plugins/dataTables.bootstrap.css') }}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{ asset('assets/backend/vendor/datatables-responsive/dataTables.responsive.css') }}" rel="stylesheet">
@endpush


@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    DataTables Advanced Tables
                    <a  class="btn btn-success btn-xs pull-right" href="{{ route('admin.posts.create') }}">Add Post</a>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    @include('admin.common.errors')
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-user">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Owner</th>
                                <th>Category</th>
                                <th>Created_at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($posts)
                                @foreach ($posts as $key => $post)
                                    <tr class="odd gradeX">
                                        <td>{{ ++$key }}</td>
                                        <td><img height="23" width="50" src="{{ $post->photo ? $post->photo->file : 'https://via.placeholder.com/100x50' }}" alt=""></td>
                                        {{-- using image atribiutes --}}
                                        <td>{{ str_limit($post->title , 10) }}</td>
                                        <td>{{ str_limit( $post->body, 10) }}</td>
                                        <td>{{ $post->user->name }}</td>
                                        <td>{{ $post->categories->title }}</td>
                                        <td class="center">{{ $post->created_at->diffForHumans() }}</td>
                                        <td class="center">
                                            <a class="btn btn-primary btn-xs pull-left" href="{{ route('admin.posts.edit',['id'=>$post->id]) }}"> <span class="fa fa-edit"></span> Edit </a>
                                                
                                            <form action="{{ route('admin.posts.destroy',$post->id) }}" method="POST" >
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-xs pull-right">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
@endsection

@push('js')
    <!-- DataTables JavaScript -->
    <script src="{{ asset('assets/backend/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/datatables-plugins/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/datatables-responsive/dataTables.responsive.js') }}"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
        $(document).ready(function() {
            $('#dataTables-user').DataTable({
                responsive: true
            });
        });
    </script>
@endpush