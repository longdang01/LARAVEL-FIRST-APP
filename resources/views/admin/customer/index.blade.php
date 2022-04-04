@extends('_layout')
@section('content')
	
<main>
    <div class="container-fluid px-4">
        <div class="text-end py-3">
            <a href="/admin/customer/0/show" class="btn btn-success">Create</a>
        </div>

        <table id="datatablesSimple" class="table-bordered">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Note</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @php 
                    $tt=1;
                @endphp
                @foreach($customers as $item)
                <tr>
                    <td>{{$tt++}}</td>
                    <td>{{$item->ten_kh}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->dia_chi}}</td>
                    <td>{{$item->sdt}}</td>
                    <td>{{$item->note}}</td>
                    <td><a href="/admin/customer/{{$item->id}}/show" class="btn btn-info">Edit</a></td>
                    <td><a onclick="return confirm('ban co muon xoa that khong?');"
                     href="/admin/customer/{{$item->id}}/delete" class="btn btn-danger">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>

@stop