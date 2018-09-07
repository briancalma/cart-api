@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Meal
                    {{-- 
                        <div class="row">
                        <div class="col">
                            Add A Meal
                        </div>
                        <div class="col">
                            <a name="#" id="#" class="btn btn-danger pull-right" href="/meal/create" role="button">
                              Cancel
                            </a>           
                        </div>
                        </div> 
                    --}}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form action="{{ url('meal') }}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="name">Meal Name</label>
                          <input type="text" name="name" id="name" class="form-control" placeholder="* Enter meal name" aria-describedby="helpId">
                          <small id="helpId" class="text-muted">Meal name is the name of the meal.</small>
                        </div>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" name="price" id="price" class="form-control" placeholder="* Enter meal price" aria-describedby="helpId">
                            <small id="helpId" class="text-muted">How much was this meal?</small>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" placeholder="* Enter meal description" aria-describedby="helpId" rows="3"></textarea>
                            <small id="helpId" class="text-muted">How do you describe this meal?</small>
                        </div>

                        <div class="form-group">
                          <label for="meal_type">Meal Type</label>
                          <select class="form-control" name="meal_type" id="meal_type">
                            <option>Breakfast</option>
                            <option>Launch</option>
                            <option>Dinner</option>
                          </select>
                          <small id="helpId" class="text-muted">What type of meal was this?</small>
                        </div>

                        <button type="submit" class="btn btn-primary">Save Meal</button>
                        <a type="button" class="btn btn-danger" href="#">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
