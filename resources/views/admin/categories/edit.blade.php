@extends('layouts.backend.app')

@section('title','Create Category')
    
@push('css')
    
@endpush

@section('content')
<br>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Basic Form Elements
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-8">
                        @include('admin.common.errors')
                        <form role="form" method="POST" action="{{ route('admin.category.update',$category->id) }}" >
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Name</label>
                                <input name="name" class="form-control" value="{{ $category->title }}" placeholder="Enter Category">
                            </div>
                            <button type="submit" class="btn btn-default">Updated</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form>
                    </div>
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
@endsection

@push('js')
    
@endpush