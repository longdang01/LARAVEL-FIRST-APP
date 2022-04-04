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
                Feedback
            </div>
            <div class="card-body">
                <form method="post" 
                action='{{ ($feedback) ? "/admin/feedback/update" : "/admin/feedback/create" }}'>
                    @csrf
                        <input type="hidden"
                                id="id" value="{{ ($feedback) ? $feedback->id_phan_hoi : ''}}" 
                                name="id">

                        <div class="form-group">
                            <label>Account</label>
                            <select name="account" id="account" class="form-select">
                                @foreach($accounts as $item)
                                    <option value="{{$item->id}}">
                                        {{$item->users_name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        
                        <div class="form-group">
                            <label>Product</label>
                            <select name="product" id="product" class="form-select">
                                @foreach($products as $item)
                                    <option value="{{$item->id}}">
                                        {{$item->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Level</label>
                            <input type="text" class="form-control"
                                    id="level" 
                                    name="level" value="{{($feedback) ? $feedback->level : ''}}">
                        </div>
                        
                        <div class="form-group">
                            <label>Note</label>
                            <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
                            <textarea id="note" name="note">
                                {{($feedback) ? $feedback->note : ''}}
                                
                            </textarea>
                            <script>
                                    CKEDITOR.replace('note');
                            </script>
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