@extends('_layout')
@section('content')
	
<main>
    <div class="container-fluid px-4">
        <div class="text-end py-3">
            <a href="/admin/bill-import/0/show" class="btn btn-success">Create</a>
        </div>

        <table id="datatablesSimple" class="table-bordered">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>ID</th>
                    <th>Supplier</th>
                    <th>Staff</th>
                    <th>Date order</th>
                    <th>Total price</th>
                    <th>Checkout</th>
                    <th>Note</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @php 
                    $tt=1;
                @endphp
                @foreach($billImports as $item)
                <tr>
                    <td>{{$tt++}}</td>
                    <td>{{$item->id}}</td>
                    <td>{{$item->supplier->ten_ncc}}</td>
                    <td>{{$item->staff->ten_nhanvien}}</td>
                    <td>{{$item->date_order}}</td>
                    <td>{{number_format($item->tong_tien)}}</td>
                    <td>{{$item->thanh_toan}}</td>
                    <td>{{$item->note}}</td>
                    <td><a href="/admin/bill-import/{{$item->id}}/show" class="btn btn-info">Edit</a></td>
                    <td><a onclick="return confirm('ban co muon xoa that khong?');"
                     href="/admin/bill-import/{{$item->id}}/delete" class="btn btn-danger">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>

@stop