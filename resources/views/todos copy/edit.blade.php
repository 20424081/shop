@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @guest
            <div></div>
            @else
            <div class="card">
                <div class="card-header">{{ __('Create Category') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ (isset($category->id)) ? route('categories.update', ['category' => $category->id]) : route('categories.store')}}">
                        @csrf
                        <input type="hidden" name="_method" value="{{(isset($category->id)) ? 'PUT': 'POST'}}">

                        <div class="form-group row">
                            <label for="category_name" class="col-md-4 col-form-label text-md-right">{{ __('Category Name') }}</label>

                            <div class="col-md-6">
                                <input id="category_name" type="text" class="form-control @error('category_name') is-invalid @enderror" name="category_name" value="{{ old('category_name', $category->category_name) }}" required autocomplete="category_name" autofocus>

                                @error('category_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{(isset($item->id)) ? __('Update') : __('Add') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endguest
        </div>
    </div>
</div>
@endsection