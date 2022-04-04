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
                Bill export detail
            </div>
            <div class="card-body">
                <form method="post" 
                action='{{ ($billExportDetail) ? "/admin/bill-export-detail/update" : "/admin/bill-export-detail/create" }}'>
                    @csrf
                        <input type="hidden"
                                id="id" value="{{ ($billExportDetail) ? $billExportDetail->id : ''}}" 
                                name="id">

                        <div class="form-group">
                            <label>ID Bill Export</label>
                            <select name="billExport" id="billExport" class="form-select">
                                @foreach($billExports as $item)
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
                                    name="amount" value="{{($billExportDetail) ? $billExportDetail->sl : ''}}">
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