@extends('layouts.master')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
              <div class="card-body">
                  <a href="{{ url('products/create') }}">
                      <div class="clearfix">
                          <div class="float-left">
                          <i class="fa fa-plus text-primary icon-lg"></i>
                          </div>
                      <div class="float-right">
                          {{-- <p class="mb-0 text-right">Total Revenue</p> --}}
                          <div class="fluid-container">
                              <h3 class="font-weight-medium text-right mb-0">Add Product</h3>
                          </div>
                      </div>
                  </a>
              </div>
              <p class="text-muted mt-3 mb-0">
                <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Add New Product
              </p>
            </div>
          </div>
        </div>
        {{-- 
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
          <div class="card card-statistics">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left">
                  <i class="mdi mdi-receipt text-warning icon-lg"></i>
                </div>
                <div class="float-right">
                  <p class="mb-0 text-right">Orders</p>
                  <div class="fluid-container">
                    <h3 class="font-weight-medium text-right mb-0">3455</h3>
                  </div>
                </div>
              </div>
              <p class="text-muted mt-3 mb-0">
                <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Product-wise sales
              </p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
          <div class="card card-statistics">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left">
                  <i class="mdi mdi-poll-box text-success icon-lg"></i>
                </div>
                <div class="float-right">
                  <p class="mb-0 text-right">Sales</p>
                  <div class="fluid-container">
                    <h3 class="font-weight-medium text-right mb-0">5693</h3>
                  </div>
                </div>
              </div>
              <p class="text-muted mt-3 mb-0">
                <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Weekly Sales
              </p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
          <div class="card card-statistics">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left">
                  <i class="mdi mdi-account-location text-info icon-lg"></i>
                </div>
                <div class="float-right">
                  <p class="mb-0 text-right">Employees</p>
                  <div class="fluid-container">
                    <h3 class="font-weight-medium text-right mb-0">246</h3>
                  </div>
                </div>
              </div>
              <p class="text-muted mt-3 mb-0">
                <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> Product-wise sales
              </p>
            </div>
          </div>
        </div> 
        --}}
      </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h3 class="card-title">Products Overview</h3>
                {{-- 
                    <p class="card-description">
                        Add class
                        <code>.table-striped</code>
                    </p> 
                --}}
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Actions</th>
                                <th>Name</th>
                                <th>Retail Price</th>
                                {{-- <th>SKU</th> --}}
                                <th>Created</th>
                                {{-- <th>Sales Price</th> --}}
                                <th>Available</th>
                                <th>Visible</th>                                
                            </tr>
                        </thead>
                        <tbody>
                          {{--                           
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-info btn-fw btn-sm">View</button>
                                    <button type="button" class="btn btn-warning btn-fw btn-sm">Edit</button>
                                    <button type="button" class="btn btn-danger btn-fw btn-sm">Drop</button>
                                </td>
                            </tr>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Labore ipsam repellat quo illum placeat soluta possimus unde dolore necessitatibus? Minima.
                          --}}
                          @foreach ($products as $item)                                                     
                            <tr>
                              <td>
                              <a href="{{ url("products/$item->id/edit") }}" type="button" class="btn btn-info btn-fw btn-sm">Edit</a>
                                  <form action="{{ url("products/$item->id") }}" method="POST" onsubmit="return confirm('Are you sure with this action?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-fw btn-sm">Drop</button>
                                  </form>
                                 
                              </td>
                              <td class="font-weight-bold">{{ ucfirst($item->name) }}</td>
                              <td class="text-danger font-weight-bold">{{ "₱".number_format( $item->retail_price, 2, ".", ",") }}</td>
                              <td>{{ $item->created_at->format('D, d F Y') }}</td>
                              <td>
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input" checked=""> Available
                                    <i class="input-helper"></i></label>
                                  </div>
                              </td>
                              <td>
                                  <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" checked=""> Visible
                                      <i class="input-helper"></i></label>
                                    </div>
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
