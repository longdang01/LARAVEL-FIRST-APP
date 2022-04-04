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
                Bill Import
            </div>
            <div class="card-body">
                <form method="post" 
                action='{{ ($billImport) ? "/admin/bill-import/update" : "/admin/bill-import/create" }}'>
                    @csrf
                        <input type="hidden"
                                id="id" value="{{ ($billImport) ? $billImport->id : ''}}" 
                                name="id">

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
                            <label>Staff</label>
                            <select name="staff" id="staff" class="form-select">
                                @foreach($staffs as $item)
                                    <option value="{{$item->id}}">
                                        {{$item->ten_nhanvien}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Date order</label>
                            <input type="date" class="form-control"
                                    id="dateOrder" 
                                    name="dateOrder" value="{{($billImport) ? $billImport->date_order : ''}}">
                        </div>
                        <div class="form-group">
                            <label>Total price</label>
                            <input type="text" class="form-control"
                                    id="totalPrice" 
                                    name="totalPrice" value="{{($billImport) ? $billImport->tong_tien : ''}}">
                        </div>

                        <div class="form-group">
                            <label>Checkout</label>
                            <input type="text" class="form-control"
                                    id="checkout" 
                                    name="checkout" value="{{($billImport) ? $billImport->thanh_toan : ''}}">
                        </div>

                            
                        <div class="form-group">
                            <label>Note</label>
                            <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
                            <textarea id="note" name="note">
                                {{($billImport) ? $billImport->note : ''}}
                                
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