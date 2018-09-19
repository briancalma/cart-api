
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="lead">Transaction ID : {{ $transaction->transaction_id }}</h4>
                    <h4 class="lead">FullName : {{ $transaction->user->firstname." ".$transaction->user->lastname }}</h4>
                    <h4 class="lead">Total Payment : 
                        <?php $totalPrice = 0;?>
                        @foreach ($transaction->orders as $order)
                            {{-- {{ $order->product->name }} - {{ $order->product->retail_price *  $order->qty }} --}}
                            <?php 
                                $total = $order->product->retail_price * $order->qty;
                                $totalPrice = $totalPrice + $total;
                            ?>    
                        @endforeach
                        {{ "₱".number_format( $totalPrice, 2, ".", ",") }}
                    </h4>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="lead">ORDER SUMMARY</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>
                                        Product ID
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        QTY
                                    </th>
                                    <th>
                                        Price
                                    </th>
                                    <th>
                                        Total
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaction->orders as $order)
                                    <tr>
                                        <td> {{ $order->product_id }} </td>
                                        <td> {{ $order->product->name }} </td>
                                        <td> {{ $order->qty }} </td>
                                        <td> {{ $order->product->retail_price }} </td>
                                        <td> {{ "₱".number_format( $order->product->retail_price * $order->qty, 2, ".", ",") }} </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <br>

                    <h4 class="display-3">TOTAL PRICE: 
                        <?php $totalPrice = 0;?>
                        @foreach ($transaction->orders as $order)
                            {{-- {{ $order->product->name }} - {{ $order->product->retail_price *  $order->qty }} --}}
                            <?php 
                                $total = $order->product->retail_price * $order->qty;
                                $totalPrice = $totalPrice + $total;
                            ?>    
                        @endforeach
                        <span class="text-danger">{{ "₱".number_format( $totalPrice, 2, ".", ",") }}</span>
                    </h4>
                </div>
            </div>
        </div>
    </div>

