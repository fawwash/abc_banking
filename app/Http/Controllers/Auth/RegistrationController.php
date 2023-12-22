<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class RegistrationController extends Controller
{
    public function checkEmail(Request $request)
    {
        try {
            $emailID = $request->input('email');
            $email = User::where('email', $emailID)->first();
            if ($email) {
                echo 'false';
            }else{
                echo 'true';
            }
            exit;
        } 
        catch (\Illuminate\Database\QueryException $e) {
           
         }
        catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while checking the email.'], 500);
        }
    }
    public function storeRegistrationForm(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'email' => 'required|email',
                'password' => 'required|string',
                'confirm_password' => 'required|string|same:password',
            ]);
            $hashedPassword = Hash::make($validatedData['password']);
            $user = new User();
            $user->email = trim($validatedData['email']);
            $emailName = explode('@', $user->email);
            $user->password = $hashedPassword;
            $user->name = ucfirst($emailName[0]);
            $user->record_status = 1;
            $user->created_ip = $request->ip();
            $user->created_by = ucfirst($emailName[0]);
            $user->created_at = Carbon::now();
            $user->save();        
        } catch (\Exception $e) {
        }
    }
}