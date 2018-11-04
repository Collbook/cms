@extends('layouts.backend.app')

@section('title','Edit Post')
    
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
                        <form role="form" method="POST" action="{{ route('admin.posts.update',['id'=>$post->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
                            <div class="form-group">
                                <label>Title</label>
                                <input name="title" class="form-control" value="{{ $post->title }}"  placeholder="Enter name">
                            </div>

                            <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" name="category_id">
                                        @foreach ($categories as $categorie)
                                            <option value="{{ $categorie->id }}"
                                            @if ($post->categories->id == $categorie->id)
                                                {{ "selected" }}
                                            @endif    
                                            >{{ $categorie->title }}</option>
                                        @endforeach
                                    </select>
                            </div>


                            <div class="form-group">
                                <label>Photo Image</label>
                                <input name="photo_id"  type="file">
                            </div>
                            

                            <div class="form-group">
                                <label>Body</label>
                                <textarea name="body" rows="8" class="form-control" placeholder="Enter body">{{ $post->body }} </textarea>
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