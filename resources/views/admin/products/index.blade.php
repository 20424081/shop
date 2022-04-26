@extends('layouts.admin')
@section('page')
<h1>Products</h1>
@endsection
@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Product</a></li>
    <li class="breadcrumb-item active">List Products</li>
</ol>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Title</h3>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" class="col-md-1">#</th>
                    <th scope="col" class="col-md-3">Product Name</th>
                    <th scope="col" class="col-md-1">Company</th>
                    <th scope="col" class="col-md-1">Category</th>
                    <th scope="col" class="col-md-1">Type</th>
                    <th scope="col" class="col-md-1">Price</th>
                    <th scope="col" class="col-md-1">Quantity</th>

                    <th scope="col" class="col-md-3">Handle</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
@endsection