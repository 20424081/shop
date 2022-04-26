@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @guest
            <div></div>
            @else
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="p-2">
                            <h3>{{ __('Todo list') }}</h3>
                        </div>
                        <div class="p-2">
                            <a class="btn btn-primary btn-sm" href="{{route('todos.create')}}" role="button">Create</a>
                        </div>
                    </div>

                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col" class="col-md-1">#</th>
                                <th scope="col" class="col-md-6">Task</th>
                                <th scope="col" class="col-md-2">Status</th>
                                <th scope="col" class="col-md-3">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($todos as $todo)
                            <tr>
                                <th scope="row">{{ $todo->id }}</th>
                                <td>{{ $todo->task }}</td>
                                <td>
                                    @if($todo->done)
                                    <i class="fa-solid fa-check text-success"></i>
                                    @else
                                    <i class="fa-solid fa-x text-danger"></i>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex flex-row bd-highlight mb-3">
                                        <div class="p-2">
                                            <form action="{{ route('todos.edit', $todo->id) }}" type="submit" method='get' class="form-inline">
                                                <button type="submit" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></button>
                                            </form>
                                        </div>
                                        <div class="p-2">
                                            <form action="{{ route('todos.destroy', $todo->id) }}" type="submit" method='post' class="form-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endguest
        </div>
    </div>
</div>
@endsection