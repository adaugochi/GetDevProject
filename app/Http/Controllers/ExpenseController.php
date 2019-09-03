<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
use Auth;

class ExpenseController extends Controller
{
    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getExpenses()
    {
        $expenses = Expense::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('home', compact('expenses'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'value_of_expense'=> 'required',
            'date_of_expense' => 'required',
            'reason'          =>  'required',
        ]);
        $expense = new Expense;

        $expense->user_id             = $request->user_id;
        $expense->value_of_expenses   = $request->value_of_expense;
        $expense->date_of_expenses    = $request->date_of_expense;
        $expense->amount_in_euro      = $request->amount_in_euros;
        $expense->amount_in_pounds    = $request->amount_in_pounds;
        $expense->reason_for_expenses = $request->reason;
        $expense->VAT                 = $request->vat;

        if($expense->save()){
            return redirect()->back()->with(['success' => 'Expense successfully created.']);
        }else{
            return redirect()->back()->with(['error`' => 'Failed to add expense']);
        }
    }
}
