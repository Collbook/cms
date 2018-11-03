@extends('layouts.backend.app')

@section('title','Update User')
    
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
                        <form role="form" method="POST" action="{{ route('admin.users.update',['id'=>$user->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Name</label>
                                <input name="name" class="form-control" value="{{ $user->name }}" placeholder="Enter name">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" class="form-control" value="{{ $user->email }}" placeholder="Enter email">
                            </div>

                            <div class="form-group">
                                <label>File Image</label>
                                <input name="photo_id" value="" type="file"><br>
                                <img height="150" src="{{ $user->photo ? $user->photo->file : 'https://via.placeholder.com/150.png/09f/fff' }}" alt="">
                            </div>
                            
                            <div class="form-group">
                                <label>Roles</label>
                                <select class="form-control" name="role">
                                    <option selected> Select option</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}"
                                            @if ($role->id == $user->role->id)
                                                {{ 'selected' }}
                                            @endif    
                                        >{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option selected> Select option</option>
                                    <option value="1"
                                        @if ($user->is_active == 1)
                                        {{ 'selected' }}
                                        @endif
                                    >Active</option>
                                    <option value="0"
                                        @if ($user->is_active == 0)
                                        {{ 'selected' }}
                                        @endif
                                    >Not Active</option>
                                </select>
                            </div>

                            <div class="form-group">
                                    <label>Old Password</label>
                                    <input name="old_password" type="password" class="form-control" placeholder="Enter old password">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input name="password" type="password" class="form-control" placeholder="Enter New password">
                            </div>

                            <div class="form-group">
                                <label>Password Confirm</label>
                                <input name="password_confirmation" type="password" class="form-control" placeholder="Enter New password confirm">
                            </div>

                            <button type="submit" class="btn btn-default">Update</button>
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