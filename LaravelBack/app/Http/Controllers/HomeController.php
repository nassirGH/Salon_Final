<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\DB;
use App\Service;
use App\ServiceType;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        $users = User::all();
        $users = User::orderBy('name')->paginate(6);
        return view('admin.dashboard', compact('users'));
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back();
    }

    public function update(Request $request,$id)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');


        DB::update('update admin set name = ? , email = ? , password = ?, where id = ?',[$name,$email,$password]);
        echo "User updated successfully.<br/>";
        return back();    
    }

    public function pending()
    {
     
        $bookings = Booking::where('approval','false')->with('serviceTypes')->with('user')->get();
      
        return view('admin.pending',  compact('bookings'));
     
    }

    public function deleteBook($id)
    {
        $booking = Booking::findOrFail($id);
        dd($booking);
        $booking->delete();
        return back();
    }

    
}