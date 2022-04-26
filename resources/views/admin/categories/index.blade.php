@extends('layouts.admin')
@section('page')
<h1>Categories</h1>
@endsection
@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Categories</a></li>
    <li class="breadcrumb-item active">List Categories</li>
</ol>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Title</h3>
    </div>
    <div class="card-body">
        <table id="table" data-toggle="table" data-height="460" data-ajax="ajaxRequest" data-search="true" data-side-pagination="server" data-pagination="true">
            <thead>
                <tr>
                    <th data-field="id">ID</th>
                    <th data-field="category_name">Item Name</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // your custom ajax request here
    function ajaxRequest(params) {
        var url = "{{route('api.categories.index')}}"
        $.get(url + '?' + $.param(params.data)).then(function(res) {
            params.success(res)
        })
    }
</script>
@endsection