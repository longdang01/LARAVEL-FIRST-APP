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
                Ads
            </div>
            <div class="card-body">
                <form method="post" 
                action='{{ ($ads) ? "/admin/ads/update" : "/admin/ads/create" }}'>
                    @csrf
                        <input type="hidden"
                                id="id" value="{{ ($ads) ? $ads->id : ''}}" 
                                name="id">
                        
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control"
                                    id="title" 
                                    name="title" value="{{($ads) ? $ads->tittle : ''}}">
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control"
                                    id="image" 
                                    name="image" value="{{($ads) ? $ads->image : ''}}">
                        </div>

                        <div class="form-group">
                            <label>Note</label>
                            <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
                            <textarea id="note" name="note">
                                {{($ads) ? $ads->note : ''}}
                                
                            </textarea>
                            <script>
                                    CKEDITOR.replace('note');
                            </script>
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