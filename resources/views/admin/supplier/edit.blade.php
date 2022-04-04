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
                Supplier
            </div>
            <div class="card-body">
                <form method="post" 
                action='{{ ($supplier) ? "/admin/supplier/update" : "/admin/supplier/create" }}'>
                    @csrf
                        <input type="hidden"
                                id="id" value="{{ ($supplier) ? $supplier->id : ''}}" 
                                name="id">
                        
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control"
                                    id="name" 
                                    name="name" value="{{($supplier) ? $supplier->ten_ncc : ''}}">
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control"
                                    id="address" 
                                    name="address" value="{{($supplier) ? $supplier->diachi_ncc : ''}}">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control"
                                    id="email" 
                                    name="email" value="{{($supplier) ? $supplier->email : ''}}">
                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control"
                                    id="phone" 
                                    name="phone" value="{{($supplier) ? $supplier->sdt : ''}}">
                        </div>
                        
                        <div class="form-group">
                            <label>Delet</label>
                            <input type="number" class="form-control"
                                    id="delet" 
                                    name="delet" value="{{($supplier) ? $supplier->Delet : ''}}">
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