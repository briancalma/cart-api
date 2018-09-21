<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Order;
use App\Product;
use PDF;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::where('status',false)->get();

        // return $transactions;
        return view('transaction.index')->with(compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $orders = $request->input('orders');
        $user_id = $request->input('user_id');
        
        # Inserting a new transaction
        $new_transaction = new Transaction;
        $new_transaction->user_id = $user_id;
        $new_transaction->transaction_id = "transact__";
        $new_transaction->save();

        # Retrieving the newly save transaction id 
        $id = $new_transaction->id; 
        $new_transaction->transaction_id = "transact_".$id;
        $new_transaction->save();
        
        // # Loop to each order
        foreach( $orders as $order ) 
        {
            // Inserting a new order
            $new_order = new Order;
            $new_order->transaction_id = $id;
            $new_order->product_id = $order['product_id'];
            $new_order->qty = $order['qty'];
            $new_order->save();
        }

        $temp = $this->generateOrderData($orders);
        

        $data = [
                    "transaction_id" => $id,
                    "user_id" => $user_id,
                    "orders" => $temp->order_data,
                    "bill_date" => $new_transaction->created_at->format('D, d F Y'),
                    "total_payment" => $temp->total_price
                ];

        $response = ["status" => "success", "message" => "Transaction was successfully saved.", "data" => $data];        
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $transaction = Transaction::findOrFail($id);
        // $transaction = Transaction::where('transaction_id',$id)->get();

        // return $transaction->user;
        // $transaction = $transaction->user->username;
        return view('transaction.view')->with(compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changeTransactionStatus($id) 
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->status = true;
        // $this->generatePDF($transaction);
        if( $transaction->save() ) {
            $this->generatePDF($transaction);
        }
    }

    public function generatePDF($transaction) 
    {   
        $pdf = PDF::loadView('transaction.reciept', compact('transaction'));
        $pdf->download('invoice.pdf');
        return redirect('transactions/');
    }

    public function generateOrderData( $orders ) 
    {   
        $order_data = [];

        $total_price = 0;

        foreach($orders as $order) 
        {   
            # Retrieving Order and Product Data
            $product = Product::find($order['product_id']);
            $name = $product->name;
            $price = $product->retail_price;
            $qty = $order['qty'];
            $total = $price * $qty;

            $total_price += $total;
            // Creating an object
            $data = new \stdClass();
            $data->name = $name;
            $data->price = $price;
            $data->qty = $qty;
            $data->total = $total;
            # Add The object to the order_data
            array_push($order_data,$data);
        }

        return (object) ['order_data' => $order_data, 'total_price' => $total_price];
    }



}
