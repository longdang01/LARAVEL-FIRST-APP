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
                Bill Export
            </div>
            <div class="card-body">
                <form method="post" 
                action='{{ ($billExport) ? "/admin/bill-export/update" : "/admin/bill-export/create" }}'>
                    @csrf
                        <input type="hidden"
                                id="id" value="{{ ($billExport) ? $billExport->id : ''}}" 
                                name="id">

                        <div class="form-group">
                            <label>Customer</label>
                            <select name="customer" id="customer" class="form-select">
                                @foreach($customers as $item)
                                    <option value="{{$item->id}}">
                                        {{$item->ten_kh}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Date order</label>
                            <input type="date" class="form-control"
                                    id="dateOrder" 
                                    name="dateOrder" value="{{($billExport) ? $billExport->date_order : ''}}">
                        </div>
                        <div class="form-group">
                            <label>Total price</label>
                            <input type="text" class="form-control"
                                    id="totalPrice" 
                                    name="totalPrice" value="{{($billExport) ? $billExport->tong_tien : ''}}">
                        </div>

                        <div class="form-group">
                            <label>Payment</label>
                            <input type="text" class="form-control"
                                    id="payment" 
                                    name="payment" value="{{($billExport) ? $billExport->payment : ''}}">
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <input type="text" class="form-control"
                                    id="status" 
                                    name="status" value="{{($billExport) ? $billExport->status : ''}}">
                        </div>
                            
                            
                        <div class="form-group">
                            <label>Note</label>
                            <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
                            <textarea id="note" name="note">
                                {{($billExport) ? $billExport->note : ''}}
                                
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