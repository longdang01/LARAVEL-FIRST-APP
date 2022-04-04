@extends('_layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Information</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                News
            </div>
            <div class="card-body">
                <form method="post" 
                action='{{ ($news) ? "/admin/news/update" : "/admin/news/create" }}'>
                    @csrf
                        <input type="hidden"
                                id="id" value="{{ ($news) ? $news->id_new : ''}}" 
                                name="id">
                        
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control"
                                    id="title" 
                                    name="title" value="{{($news) ? $news->title : ''}}">
                        </div>

                        <div class="form-group">
                            <label>Content</label>
                            <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
                            <textarea id="content" name="content">
                                {{($news) ? $news->content : ''}}
                                
                            </textarea>
                            <script>
                                    CKEDITOR.replace('content');
                            </script>
                        </div>
                        

                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control"
                                    id="image" 
                                    name="image" value="{{($news) ? $news->image : ''}}">
                        </div>
                        
                        
                            
                        <button type="submit" value="cmd" name="cmd" class="btn bg-success">
                            Save
                        </button>
                    </form>
            </div>
        </div>
    </div>
</main>
@stop