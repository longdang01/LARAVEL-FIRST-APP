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
                Account
            </div>
            <div class="card-body">
                <form method="post" 
                action='{{ ($account) ? "/admin/account/update" : "/admin/account/create" }}'>
                    @csrf
                        <input type="hidden"
                                id="id" value="{{ ($account) ? $account->id : ''}}" 
                                name="id">
                        
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control"
                                    id="fullName" 
                                    name="fullName" value="{{($account) ? $account->full_name : ''}}">
                        </div>

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control"
                                    id="userName" 
                                    name="userName" value="{{($account) ? $account->users_name : ''}}">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control"
                                    id="email" 
                                    name="email" value="{{($account) ? $account->email : ''}}">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" class="form-control"
                                    id="password" 
                                    name="password" value="{{($account) ? $account->password : ''}}">
                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control"
                                    id="phone" 
                                    name="phone" value="{{($account) ? $account->phone : ''}}">
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control"
                                    id="address" 
                                    name="address" value="{{($account) ? $account->address : ''}}">
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control"
                                    id="image" 
                                    name="image" value="{{($account) ? $account->image : ''}}">
                        </div>

                        <div class="form-group">
                            <label>Delet</label>
                            <input type="number" class="form-control"
                                    id="delet" 
                                    name="delet" value="{{($account) ? $account->Delet : ''}}">
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