@extends('_layout')
@section('content')
	
<main>
    <div class="container-fluid px-4">
        <div class="text-end py-3">
            <a href="/admin/bill-export-detail/0/show" class="btn btn-success">Create</a>
        </div>

        <table id="datatablesSimple" class="table-bordered">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>ID Bill Export</th>
                    <th>Product</th>
                    <th>Amount</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @php 
                    $tt=1;
                @endphp
                @foreach($billExportDetails as $item)
                <tr>
                    <td>{{$tt++}}</td>
                    <td>{{$item->id_bill_ban}}</td>
                    <td>{{$item->product->name}}</td>
                    <td>{{$item->sl}}</td>
                    <td><a href="/admin/bill-export-detail/{{$item->id}}/show" class="btn btn-info">Edit</a></td>
                    <td><a onclick="return confirm('ban co muon xoa that khong?');"
                     href="/admin/bill-export-detail/{{$item->id}}/delete" class="btn btn-danger">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>

@stop