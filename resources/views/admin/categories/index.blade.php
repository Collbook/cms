@extends('layouts.backend.app')

@section('title','User Manager')

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
                    <a  class="btn btn-success btn-xs pull-right" href="{{ route('admin.category.create') }}">Add Category</a>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    @include('admin.common.errors')

                 

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-user">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Created_at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($categories)
                                @foreach ($categories as $key => $categorie)
                                    <tr class="odd gradeX">
                                        <td>{{ ++$key }}</td>
                                        <td>
                                            {{ $categorie->title }}
                                        </td>

                                        <td class="center">{{ $categorie->created_at->diffForHumans() }}</td>

                                        <td class="center pull-left">
                                            <a class="btn btn-primary btn-xs pull-right" href="{{ route('admin.category.edit',['id'=>$categorie->id]) }}"> <span class="fa fa-edit"></span> Edit </a>
                                            <form action="{{ route('admin.category.destroy',$categorie->id) }}" method="POST" >
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