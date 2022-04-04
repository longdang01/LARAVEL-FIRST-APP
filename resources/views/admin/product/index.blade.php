@extends('_layout')
@section('content')
	
<main>
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center py-3">
            <div>
                <select name="category" id="category" class="form-select">
                    @foreach($categories as $item)
                        <option value="{{$item->id}}">
                            {{$item->tenloai}}
                        </option>
                    @endforeach
                </select>
                
            </div>
            <a href="/admin/product/0/show" class="btn btn-success">Create</a>
        </div>

        <table id="datatablesSimple" class="table-bordered">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Picture</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @php 
                    $tt=1;
                @endphp
                @foreach($products as $item)
                <tr>
                    <td>{{$tt++}}</td>
                    <td><img src="/upload/sanpham/{{$item->image}}" style='width:100px'></td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->category->tenloai}}</td>
                    <td align="right">{{number_format($item->unit_price)}}</td>
                    <td><a href="/admin/product/{{$item->id}}/show" class="btn btn-info">Edit</a></td>
                    <td><a onclick="return confirm('ban co muon xoa that khong?');"
                     href="/admin/product/{{$item->id}}/delete" class="btn btn-danger">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>

@stop