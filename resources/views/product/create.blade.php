@extends('layouts.master')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    
    <h1>Add New Product</h1>
    
    <form action="{{ url('products') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Product Basic Information</h4>
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="* Enter Name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleTextarea1">Description</label>
                            <textarea name="description" class="form-control" id="exampleTextarea1" rows="23" placeholder="* Enter Description" required></textarea>
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
                                    <label>Upload Image</label><br>
                                    <input type="file" name="img">
                                    {{-- <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                        <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                                        </span>
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veniam commodi amet provident, repudiandae veritatis quaerat pariatur temporibus at iste ipsam.
                                    </div> --}}
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
                                    <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Enter Retail Price" name="retail-price" placeholder="* Enter Price" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Sale Price</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Enter Sale Price"  name="sale-price">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success mr-2">Submit</button>
                                <button class="btn btn-warning">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
  
   
@endsection
