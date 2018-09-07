@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            Meals 
                        </div>
                        <div class="col">
                            <a name="#" id="#" class="btn btn-primary pull-right" href="/meal/create" role="button">
                               Add New Meal
                            </a>           
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <table class="table table-bordered table-hover">
                        <thead class="thead-inverse">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($meals as $meal)
                                <tr>
                                    <td>{{ $meal->id }}</td>
                                    <td>{{ $meal->name }}</td>
                                    <td>P {{ $meal->price }}</td>
                                    <td>{{ $meal->status }}</td>
                                    <td>{{ $meal->menu_type }}</td>
                                    <td>
                                        <a href="meal/{{ $meal->id }}/edit" class="btn btn-info">Edit</a>
                                        <form action="meal/{{ $meal->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach  
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
