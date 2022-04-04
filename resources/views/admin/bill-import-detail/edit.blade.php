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
                Bill Import Detail
            </div>
            <div class="card-body">
                <form method="post" 
                action='{{ ($billImportDetail) ? "/admin/bill-import-detail/update" : "/admin/bill-import-detail/create" }}'>
                    @csrf
                        <input type="hidden"
                                id="id" value="{{ ($billImportDetail) ? $billImportDetail->id : ''}}" 
                                name="id">

                        <div class="form-group">
                            <label>ID Bill Import</label>
                            <select name="billImport" id="billImport" class="form-select">
                                @foreach($billImports as $item)
                                    <option value="{{$item->id}}">
                                        {{$item->id}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Product</label>
                            <select name="product" id="product" class="form-select">
                                @foreach($products as $item)
                                    <option value="{{$item->id}}">
                                        {{$item->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Amount</label>
                            <input type="text" class="form-control"
                                    id="amount" 
                                    name="amount" value="{{($billImportDetail) ? $billImportDetail->sl : ''}}">
                        </div>

                        <div class="form-group">
                            <label>Unit</label>
                            <input type="text" class="form-control"
                                    id="unit" 
                                    name="unit" value="{{($billImportDetail) ? $billImportDetail->don_vi : ''}}">
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