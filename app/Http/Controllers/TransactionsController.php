<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
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
        //
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

        // $data = [ "pogi ako", 'hello!' ];
        $pdf = PDF::loadView('transaction.reciept', compact('transaction'));
        $pdf->download('invoice.pdf');
        return redirect('transactions/');


        // $pdf = PDF::loadView('transaction.reciept-pdf');
        // return $pdf->download('invoice.pdf');

        // $pdf = PDF::loadView('transaction.reciept-pdf');

        // # PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);


        // return $pdf->download('hdtuto.pdf');
    }

}
