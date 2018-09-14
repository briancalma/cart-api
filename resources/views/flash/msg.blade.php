@if ($message = Session::get('success'))
    <div class="row purchace-popup">
        <div class="col-12">
            <span class="d-block d-md-flex align-items-center" style="background-color: #3498db;">
                
                {{-- <i class="mdi mdi-close popup-dismiss d-none d-md-block pull-right"></i> --}}
               <p style="color: #ffffff"><strong>SUCCESS:</strong> &nbsp;&nbsp; {{ $message }}</p>
            </span>
        </div>  
    </div>  
@endif

@if ($message = Session::get('error'))
    <div class="row purchace-popup">
        <div class="col-12">
            <span class="d-block d-md-flex align-items-center" style="background-color: #e74c3c;">
                <p style="color: #ffffff"></p>
                {{-- <i class="mdi mdi-close popup-dismiss d-none d-md-block pull-right"></i> --}}
                <p style="color: #ffffff"><strong>SUCCESS:</strong> &nbsp;&nbsp; {{ $message }}</p>
            </span>
        </div>  
    </div>  
@endif