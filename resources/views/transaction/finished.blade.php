@extends('layouts.master')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Transaction Info</h4>
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="transactionTable">
                        <thead>
                            <tr>
                                <th>
                                    Transaction ID
                                </th>
                                <th>
                                    User
                                </th>
                                <th>
                                    Date
                                </th>
                                <th>
                                    Total
                                </th>
                                {{-- <th>
                                    Action
                                </th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td> 
                                        {{-- <a href="{{ url("transactions/$transaction->id") }}"> {{ $transaction->transaction_id }} </a> --}}
                                        {{ $transaction->transaction_id }} 
                                    </td>
                                    <td> {{ $transaction->user->firstname ." ".  $transaction->user->lastname }} </td>
                                    <td> {{ $transaction->created_at->format('D, d F Y') }} </td>
                                    <td  class="text-danger font-weight-bold"> 
                                        <?php $totalPrice = 0;?>
                                        @foreach ($transaction->orders as $order)
                                            {{-- {{ $order->product->name }} - {{ $order->product->retail_price *  $order->qty }} --}}
                                            <?php 
                                                $total = $order->product->retail_price * $order->qty;
                                                $totalPrice = $totalPrice + $total;
                                            ?>    
                                        @endforeach
                                        {{ "₱".number_format( $totalPrice, 2, ".", ",") }}
                                    </td>
                                    {{-- <td class="text-danger font-weight-bold"> 
                                         <a class="btn btn-info" href="{{ url("transactions/$transaction->id") }}">View</a> 
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function viewTransaction() 
        {
            let transactionID = document.getElementById('transactionIDTxt').value;

            window.location.href = 'transactions/' + transactionID;
        }
    </script>

@endsection
