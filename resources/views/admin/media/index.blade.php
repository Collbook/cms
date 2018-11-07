@extends('layouts.backend.app')

@section('title','Media Manager')

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
                    <a  class="btn btn-success btn-xs pull-right" href="{{ route('admin.media.create') }}">Add Photo</a>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    @include('admin.common.errors')
                    <form action="{{ route('admin.media.deleteall') }}" method="POST" class="form-inline">
                        @csrf
                        
                    
                        <table width="100%" class="table table-striped table-hover" id="dataTables-user">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" id="options" class="form-control">
                                    </th>
                                    <th>ID</th>
                                    <th>Media</th>
                                    <th>Created_at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($medias)
                                    @foreach ($medias as $key => $media)
                                        <tr class="odd gradeX">
                                            <td> &nbsp;&nbsp; <input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{ $media->id }}" class="form-control"></td>
                                            <td>{{ $media->id }}</td>
                                            <td>
                                                <img height="20" src=" {{ $media->file }}" alt="">
                                            </td>

                                            <td class="center">{{ $media->created_at->diffForHumans() }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                                
                            </tbody>
                            
                        </table>
                        
                        <div class="form-group form-group-sm">
                            <select class="form-control">
                                <option value="delete">Delete</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-sm">
                        </div>
                    </form>    
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

    <script>
        $(document).ready(function(){
            $("#options").click(function(){
               if(this.checked)
               {
                   $(".checkBoxes").each(function(){
                        this.checked = true;
                   });
               }
               else
               {
                   $(".checkBoxes").each(function(){
                        this.checked = false;
                   });
               }
            });
        })
    </script>
@endpush