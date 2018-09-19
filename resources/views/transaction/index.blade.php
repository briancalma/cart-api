@extends('layouts.master')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend bg-info">
                            <span class="input-group-text bg-transparent">
                                <i class="mdi mdi-magnify text-white icon-lg"></i>
                            </span>
                            </div>
                            <input id="transactionIDTxt" type="text" onkeyup="getTransactionID()" class="form-control" placeholder="* Enter Transasction ID" aria-label="Username" aria-describedby="colored-addon1" style="padding:20px;font-size:30px;font-weight: bolder;">
                        </div>
                    </div>
                    <p class="text-info lead">Transaction ID is a  unique id that such customer will have in every order. Just simply type the transaction id above and see which orders match below.</p>
                    <button class="btn btn-primary btn-block btn-lg" onclick="viewTransaction()">View Transaction</button>
                </div>
            </div>
        </div>
    </div>

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
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td> 
                                        <a target="_blank" href="{{ url("transactions/$transaction->id") }}"> {{ $transaction->transaction_id }} </a>
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
                                    <td class="text-danger font-weight-bold"> 
                                         <a target="_blank" class="btn btn-info" href="{{ url("transactions/$transaction->id") }}">View</a> 
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

    <script>
        function viewTransaction() 
        {
            let transactionID = document.getElementById('transactionIDTxt').value;

            window.location.href = 'transactions/' + transactionID;
        }
    </script>

@endsection
