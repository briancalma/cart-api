@extends('layouts.master')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    
    <h1>Edit Product Info</h1>
    
    <form action="{{ url("products/$product->id") }}" method="POST" enctype="multipart/form-data">
        @csrf

        @method('PUT')
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Product Basic Information</h4>
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputName1" value="{{ $product->name }}" placeholder="* Enter Name">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleTextarea1">Description</label>
                            <textarea name="description" class="form-control" id="exampleTextarea1" rows="23" placeholder="* Enter Description"  required>{{ $product->description }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 d-flex align-items-stretch grid-margin">
                <div class="row flex-grow">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Image</h4>
                                <div class="form-group">
                                    <label>Upload Image</label>
                                    <input type="file" name="img" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                        <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Pricing</h4>
                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Retail Price</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Enter Retail Price" name="retail-price" placeholder="* Enter Price" value="{{ $product->retail_price }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Sale Price</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Enter Sale Price"  name="sale-price" value="{{ $product->sale_price }}">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Update</button>
                                <button class="btn btn-warning">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
  

@endsection
