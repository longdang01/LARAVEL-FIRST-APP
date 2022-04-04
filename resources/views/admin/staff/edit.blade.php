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
                Staff
            </div>
            <div class="card-body">
                <form method="post" 
                action='{{ ($staff) ? "/admin/staff/update" : "/admin/staff/create" }}'>
                    @csrf
                        <input type="hidden"
                                id="id" value="{{ ($staff) ? $staff->id : ''}}" 
                                name="id">
                        
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control"
                                    id="name" 
                                    name="name" value="{{($staff) ? $staff->ten_nhanvien : ''}}">
                        </div>

                        <div class="form-group">
                            <label>Gender</label>
                            <input type="text" class="form-control"
                                    id="gender" 
                                    name="gender" value="{{($staff) ? $staff->gioitinh : ''}}">
                        </div>

                        <div class="form-group">
                            <label>BirthDay</label>
                            <input type="date" class="form-control"
                                    id="dateOfBirth" 
                                    name="dateOfBirth" value="{{($staff) ? $staff->ngaysinh : ''}}">
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control"
                                    id="address" 
                                    name="address" value="{{($staff) ? $staff->quequan : ''}}">
                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control"
                                    id="phone" 
                                    name="phone" value="{{($staff) ? $staff->sdt : ''}}">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control"
                                    id="email" 
                                    name="email" value="{{($staff) ? $staff->email : ''}}">
                        </div>

                        <div class="form-group">
                            <label>Level</label>
                            <input type="text" class="form-control"
                                    id="level" 
                                    name="level" value="{{($staff) ? $staff->capbac : ''}}">
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