@extends('layouts.backend.app')

@section('title','Comments Manager')

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
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    @include('admin.common.errors')
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-user">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Ower Post</th>
                                <th>Body</th>
                                <th>Created_at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($comments)
                                @foreach ($comments as $key => $comment)
                                    <tr class="odd gradeX">
                                        <td>{{ ++$key }}</td>
                                        <td>X</td>
                                        <td>
                                            {{ $comment->content }}
                                        </td>

                                        <td class="center">{{ $comment->created_at->diffForHumans() }}</td>

                                        <td class="center pull-left">
                                            <form action="{{ route('admin.comments.destroy',$comment->id) }}" method="POST" >
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