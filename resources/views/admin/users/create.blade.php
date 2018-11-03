@extends('layouts.backend.app')

@section('title','Create User')
    
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
                        <form role="form" method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input name="name" class="form-control" value="{{ old('name') }}" placeholder="Enter name">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" class="form-control" value="{{ old('email') }}" placeholder="Enter email">
                            </div>

                            <div class="form-group">
                                <label>File Image</label>
                                <input name="photo_id" value="{{ old('photo_id') }}" type="file">
                            </div>
                            
                            <div class="form-group">
                                <label>Roles</label>
                                <select class="form-control" name="role">
                                    <option selected> Select option</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option selected> Select option</option>
                                    <option value="1">Active</option>
                                    <option value="0">Not Active</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input name="password" type="password" class="form-control" placeholder="Enter password">
                            </div>

                            <div class="form-group">
                                <label>Password Confirm</label>
                                <input name="password_confirmation" type="password" class="form-control" placeholder="Enter password confirm">
                            </div>

                            <button type="submit" class="btn btn-default">Create</button>
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