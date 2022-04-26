@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @guest
            <div></div>
            @else
            <div class="card">
                <div class="card-header">{{ __('Todo list') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ (isset($item->id)) ? route('todos.update', ['todo' => $item->id]) : route('todos.store')}}">
                        @csrf
                        <input type="hidden" name="_method" value="{{(isset($item->id)) ? 'PUT': 'POST'}}">

                        <div class="form-group row">
                            <label for="task" class="col-md-4 col-form-label text-md-right">{{ __('Task') }}</label>

                            <div class="col-md-6">
                                <input id="task" type="text" class="form-control @error('task') is-invalid @enderror" name="task" value="{{ old('task', $item->task) }}" required autocomplete="task" autofocus>

                                @error('task')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="done" id="done" {{ old('done', $item->done) ? 'checked' : '' }}>

                                    <label class="form-check-label" for="done">
                                        {{ __('Done') }}
                                    </label>
                                </div>
                                @error('done')
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