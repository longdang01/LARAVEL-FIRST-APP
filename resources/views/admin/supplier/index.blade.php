@extends('_layout')
@section('content')
	
<main>
    <div class="container-fluid px-4">
        <div class="text-end py-3">
            <a href="/admin/supplier/0/show" class="btn btn-success">Create</a>
        </div>

        <table id="datatablesSimple" class="table-bordered">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Delet</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @php 
                    $tt=1;
                @endphp
                @foreach($suppliers as $item)
                <tr>
                    <td>{{$tt++}}</td>
                    <td>{{$item->ten_ncc}}</td>
                    <td>{{$item->diachi_ncc}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->sdt}}</td>
                    <td>{{$item->Delet}}</td>
                    <td><a href="/admin/supplier/{{$item->id}}/show" class="btn btn-info">Edit</a></td>
                    <td><a onclick="return confirm('ban co muon xoa that khong?');"
                     href="/admin/supplier/{{$item->id}}/delete" class="btn btn-danger">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>

@stop