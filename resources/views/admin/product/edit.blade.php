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
                Product
            </div>
            <div class="card-body">
                <form method="post" 
                action='{{ ($product) ? "/admin/product/update" : "/admin/product/create" }}'>
                    @csrf
                        <input type="hidden"
                                id="id" value="{{ ($product) ? $product->id : ''}}" 
                                name="id">
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category" id="category" class="form-select">
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control"
                                    id="name" 
                                    name="name" value="{{($product) ? $product->name : ''}}">
                        </div>
                        <div class="form-group">
                            <label>Supplier</label>
                            <select name="supplier" id="supplier" class="form-select">
                                @foreach($suppliers as $item)
                                    <option value="{{$item->id}}">
                                        {{$item->ten_ncc}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="text" class="form-control"
                                    id="amount" 
                                    name="amount" value="{{($product) ? $product->so_luong : ''}}">
                        </div>
                            
                        <div class="form-group">
                            <label>Mo ta</label>
                            <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
                            <textarea id="description" name="description">
                                {{($product) ? $product->mota_sp : ''}}
                                
                            </textarea>
                            <script>
                                    CKEDITOR.replace('description');
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