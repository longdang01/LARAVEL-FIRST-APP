@extends('_layout')
@section('content')
	
<main>
    <div class="container-fluid px-4">
        <div class="text-end py-3">
            <a href="/admin/feedback/0/show" class="btn btn-success">Create</a>
        </div>

        <table id="datatablesSimple" class="table-bordered">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Account</th>
                    <th>Product</th>
                    <th>Level</th>
                    <th>Note</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @php 
                    $tt=1;
                @endphp
                @foreach($feedbacks as $item)
                <tr>
                    <td>{{$tt++}}</td>
                    <td>{{$item->account->users_name}}</td>
                    <td>{{$item->product->name}}</td>
                    <td>{{$item->level}}</td>
                    <td>{{$item->note}}</td>
                    <td><a href="/admin/feedback/{{$item->id_phan_hoi}}/show" class="btn btn-info">Edit</a></td>
                    <td><a onclick="return confirm('ban co muon xoa that khong?');"
                     href="/admin/feedback/{{$item->id_phan_hoi}}/delete" class="btn btn-danger">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>

@stop