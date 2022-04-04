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
                Migration
            </div>
            <div class="card-body">
                <form method="post" 
                action='{{ ($migration) ? "/admin/migration/update" : "/admin/migration/create" }}'>
                    @csrf
                        <input type="hidden"
                                id="id" value="{{ ($migration) ? $migration->id : ''}}" 
                                name="id">
                        
                        <div class="form-group">
                            <label>Migration</label>
                            <input type="text" class="form-control"
                                    id="migration" 
                                    name="migration" value="{{($migration) ? $migration->migration : ''}}">
                        </div>
                        
                        <div class="form-group">
                            <label>Batch</label>
                            <input type="number" class="form-control"
                                    id="batch" 
                                    name="batch" value="{{($migration) ? $migration->batch : ''}}">
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