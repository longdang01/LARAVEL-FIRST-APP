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
                Customer
            </div>
            <div class="card-body">
                <form method="post" 
                action='{{ ($customer) ? "/admin/customer/update" : "/admin/customer/create" }}'>
                    @csrf
                        <input type="hidden"
                                id="id" value="{{ ($customer) ? $customer->id : ''}}" 
                                name="id">
                        
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control"
                                    id="name" 
                                    name="name" value="{{($customer) ? $customer->ten_kh : ''}}">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control"
                                    id="email" 
                                    name="email" value="{{($customer) ? $customer->email : ''}}">
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control"
                                    id="address" 
                                    name="address" value="{{($customer) ? $customer->dia_chi : ''}}">
                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control"
                                    id="phone" 
                                    name="phone" value="{{($customer) ? $customer->sdt : ''}}">
                        </div>

                        <div class="form-group">
                            <label>Note</label>
                            <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
                            <textarea id="note" name="note">
                                {{($customer) ? $customer->note : ''}}
                                
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