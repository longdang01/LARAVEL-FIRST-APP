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
                Slide
            </div>
            <div class="card-body">
                <form method="post" 
                action='{{ ($slide) ? "/admin/slide/update" : "/admin/slide/create" }}'>
                    @csrf
                        <input type="hidden"
                                id="id" value="{{ ($slide) ? $slide->id_slide : ''}}" 
                                name="id">
                        
                        <div class="form-group">
                            <label>Link</label>
                            <input type="text" class="form-control"
                                    id="link" 
                                    name="link" value="{{($slide) ? $slide->link : ''}}">
                        </div>
                        
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control"
                                    id="image" 
                                    name="image">
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