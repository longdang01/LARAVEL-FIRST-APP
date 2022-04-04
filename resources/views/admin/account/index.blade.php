@extends('_layout')
@section('content')
	
<main>
    <div class="container-fluid px-4">
        <div class="text-end py-3">
            <a href="/admin/account/0/show" class="btn btn-success">Create</a>
        </div>

        <table id="datatablesSimple" class="table-bordered">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Image</th>
                    <th>Delet</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @php 
                    $tt=1;
                @endphp
                @foreach($accounts as $item)
                <tr>
                    <td>{{$tt++}}</td>
                    <td>{{$item->full_name}}</td>
                    <td>{{$item->users_name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->password}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->address}}</td>
                    <td><img src="/upload/sanpham/{{$item->image}}" style='width:100px'></td>
                    <td>{{$item->Delet}}</td>
                    <td><a href="/admin/account/{{$item->id}}/show" class="btn btn-info">Edit</a></td>
                    <td><a onclick="return confirm('ban co muon xoa that khong?');"
                     href="/admin/account/{{$item->id}}/delete" class="btn btn-danger">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>

@stop