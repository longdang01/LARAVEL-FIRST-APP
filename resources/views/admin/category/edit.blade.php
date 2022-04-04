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
                Category
            </div>
            <div class="card-body">
                <form method="post" 
                action='{{ ($category) ? "/admin/category/update" : "/admin/category/create" }}'>
                    @csrf
                        <input type="hidden"
                                id="id" value="{{ ($category) ? $category->id : ''}}" 
                                name="id">
                        
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control"
                                    id="name" 
                                    name="name" value="{{($category) ? $category->tenloai : ''}}">
                        </div>
                        
                        <div class="form-group">
                            <label>Delet</label>
                            <input type="number" class="form-control"
                                    id="delet" 
                                    name="delet" value="{{($category) ? $category->Delet : ''}}">
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