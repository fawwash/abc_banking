<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Statement;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;
        // Here we can get the id from cookie itself by using cookie facade.
        // $user_id = Cookie::get('id');
        $balance = Account::where('user_id', $user_id)->value('balance');
        return view('home', ['balance' => $balance]);
    }
    public function deposit()
    {
        $user_id = auth()->user()->id;
        $balance = Account::where('user_id', $user_id)->value('balance');
        return view('deposit', ['balance' => $balance]);
    }
    public function transfer()
    {
        $user_id = auth()->user()->id;
        $balance = Account::where('user_id', $user_id)->value('balance');
        return view('transfer', ['balance' => $balance]);
    }
    public function withdraw()
    {
        $user_id = auth()->user()->id;
        $balance = Account::where('user_id', $user_id)->value('balance');
        return view('withdraw', ['balance' => $balance]);
    }
    public function availBalance()
    {
        $user_id = auth()->user()->id;
        $balance = Account::where('user_id', $user_id)->value('balance');
        return response()->json([
            'balance' => $balance
        ]);
    }
    public function amountDeposit(Request $request)
    {
        try {
            $user_id = auth()->user()->id;
            $depositAmount = $request->input('amount');
            $account = Account::where('user_id', $user_id)->first();
            if ($account) {
                $account->balance += $depositAmount;
                $account->save();
            } else {
                Account::create([
                    'user_id' => $user_id,
                    'balance' => $depositAmount,
                ]);
            }
            $newBalance = Account::where('user_id', $user_id)->value('balance');
            Statement::create([
                'user_id' => $user_id,
                'datetime' => Carbon::now(),
                'amount' => $depositAmount,
                'type' => 'Credit',
                'details' => 'Deposit',
                'balance' => $newBalance,
            ]);
            $json = array('status' => 1, 'Type' => 'insert', 'message' => 'Amount Deposited successfully', 'type' => 'success', 'title' => 'Done');
            return response()->json($json);
        } catch (\Exception $e) {
            return response()->json(['status' => 0, 'message' => 'Some error occured', 'type' => 'error', 'title' => 'Error!']);
        }
    }
    public function amountWithdraw(Request $request)
    {
        try {
            $user_id = auth()->user()->id;
            $withdrawAmount = $request->input('amount');
            $account = Account::where('user_id', $user_id)->first();
            if (!$account) {
                Account::create([
                    'user_id' => $user_id,
                    'balance' => 0,
                ]);
                $account = Account::where('user_id', $user_id)->first();
            }
            if ($withdrawAmount > $account->balance) {
                return response()->json([
                    'status' => 0, 'message' => 'Insufficient balance for the withdrawal', 'type' => 'warning', 'title' => 'Warning',
                ]);
            }
            $account->balance -= $withdrawAmount;
            $account->save();
            $newBalance = $account->balance;
            Statement::create([
                'user_id' => $user_id, 'datetime' => now(), 'amount' => $withdrawAmount, 'type' => 'Debit', 'details' => 'Withdraw', 'balance' => $newBalance,
            ]);
            $json = [
                'status' => 1, 'Type' => 'insert', 'message' => 'Amount withdrawal successful', 'type' => 'success', 'title' => 'Done',
            ];
            return response()->json($json);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 0, 'message' => 'Some error occurred', 'type' => 'error', 'title' => 'Error!',
            ]);
        }
    }

    public function amountTransfer(Request $request)
    {
        try {
            $user_id = auth()->user()->id;
            $transferAmount = $request->input('amount');
            $recipientEmail = $request->input('email');
            $account = Account::where('user_id', $user_id)->first();
            if (!$account) {
                Account::create([
                    'user_id' => $user_id,
                    'balance' => 0,
                ]);
                $account = Account::where('user_id', $user_id)->first();
            }
            if ($transferAmount > $account->balance) {
                return response()->json([
                    'status' => 0, 'message' => 'Insufficient balance for the transfer', 'type' => 'warning', 'title' => 'Warning',
                ]);
            }
            $account->balance -= $transferAmount;
            $account->save();
            $newBalance = $account->balance;
            Transaction::create([
                'user_id' => $user_id, 'type' => 'Transfer', 'amount' => $transferAmount, 'recipient' => $recipientEmail,
            ]);
            Statement::create([
                'user_id' => $user_id, 'datetime' => now(), 'amount' => $transferAmount, 'type' => 'Debit', 'details' => 'Transfer to ' . $recipientEmail, 'balance' => $newBalance,
            ]);

            $json = [
                'status' => 1, 'Type' => 'insert', 'message' => 'Amount transferred successfully', 'type' => 'success', 'title' => 'Done',
            ];
            return response()->json($json);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 0, 'message' => 'Some error occurred', 'type' => 'error', 'title' => 'Error!',
            ]);
        }
    }
    public function getTransactionData(Request $request)
    {
        try {
            $user_id = auth()->user()->id;
            $columns = array('datetime','amount','type','details','balance');
            $totalData = $totalFiltered = Statement::where('user_id', $user_id)->count();
            $res = Statement::where('user_id', $user_id)
                ->select('datetime','amount','type','details','balance')
                ->orderBy('id', 'desc') 
                ->offset($request['start'])
                ->limit($request['length'])
                ->get();
            $data = array();
            foreach ($res as $k => $v) {
                $n_data = array();
                $n_data[] = $k + 1;
                $n_data[] = $v->datetime;
                $n_data[] = $v->amount;
                $typeClass = '';
                if ($v->type == 'Credit') {
                    $typeClass = 'badge bg-success-subtle text-success fs-11';
                } elseif ($v->type == 'Debit') {
                    $typeClass = 'badge bg-danger-subtle text-danger fs-11';
                } 
                $n_data[] = '<span class="' . $typeClass . '">' . $v->type . '</span>';
                $n_data[] = $v->details;
                $n_data[] = $v->balance;
                $data[] = $n_data;
            }
            $json_data = array(
                "draw" => intval($request['draw']),
                "recordsTotal" => intval($totalData),
                "recordsFiltered" => intval($totalFiltered),
                "data" => $data
            );
            return response()->json($json_data);
        } catch (\Exception $e) {
            dd($e->getMessage());
            return response()->json([
                'status' => 0, 'message' => 'Some error occurred', 'type' => 'error', 'title' => 'Error!',
            ]);
        }
    }
}
