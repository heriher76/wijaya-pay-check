@extends('layouts.app')

@section('content')
<div class="content my-5">
    <div class="container-fluid">
        <div class="card card-primary card-outline text-center">
            <div class="card-header">
                <h5 class="m-0"> Edit Data Berita </h5>
                <!-- SEARCH FORM -->
                <form style="text-align: left" action="{{ url('/news/'.$news->id) }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <div class="form-group{{$errors->has('title') ? 'has-error' : ''}} ">
                        <label for="title">Judul</label>
                        <input class="form-control @if ($errors->has('title')) is-invalid @endif" type="text" id="title" name="title" placeholder="Judul Lengkap" aria-describedby="emailHelp" value="{{$news->title}}">
                        @if($errors->has('title'))
                        <span class="help-block">{{$errors->first('title')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Deskripsi</label>
                        <textarea name="description" class="form-control">{{$news->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Thumbnail</label>
                        <br>
                        <input type="file" name="thumbnail">
                        <br>
                        @if(!empty($news->thumbnail))
                        <img src="{{ url('/img/news/'.$news->thumbnail) }}" style="width: 200px;">
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>
@endsection
