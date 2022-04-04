@extends('_layout')
@section('content')
	
<main>
    <div class="container-fluid px-4">
        <div class="text-end py-3">
            <a href="/admin/slide/0/show" class="btn btn-success">Create</a>
        </div>

        <table id="datatablesSimple" class="table-bordered">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Link</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @php 
                    $tt=1;
                @endphp
                @foreach($slides as $item)
                <tr>
                    <td>{{$tt++}}</td>
                    <td>{{$item->link}}</td>
                    <td><img src="/upload/sanpham/{{$item->image}}" style='width:100px'></td>
                    <td><a href="/admin/slide/{{$item->id_slide}}/show" class="btn btn-info">Edit</a></td>
                    <td><a onclick="return confirm('ban co muon xoa that khong?');"
                     href="/admin/slide/{{$item->id_slide}}/delete" class="btn btn-danger">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>

@stop