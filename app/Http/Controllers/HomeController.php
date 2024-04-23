<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\flight;
use App\Models\transaction;
use App\Models\airline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::id()){
            $role=Auth()->user()->role;

            if($role=='user'){
                return view('user.dashboard');
            }

            else if($role=='admin'){
                $users = User::all();
                return view('admin.adminhome', compact('users'));
            }

            else if($role=='maskapai'){
                return view('maskapai.home');
            }
            else{
                return redirect()->back();
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        // if ($request->keyword) {
        //     $transactions = Transaction::where('no_booking', 'like', '%' . $request->keyword . '%')
        //         ->orWhere('customer_name', 'like', '%' . $request->keyword . '%')
        //         ->orWhere('passanger_name', 'like', '%' . $request->keyword . '%')
        //             ->orWhereHas('flight', function ($query) use ($request) {
        //             $query->where('no_flight', 'like', '%' . $request->keyword . '%')
        //                 ->orWhere('departure_city', 'like', '%' . $request->keyword . '%')
        //                 ->orWhere('departure_date', 'like', '%' . $request->keyword . '%')
        //                 ->orWhere('arrival_date', 'like', '%' . $request->keyword . '%')
        //                 ->orWhere('arrival_city', 'like', '%' . $request->keyword . '%');
        //         })
        //         ->get();
        // } else {
            $transactions = transaction::all();
        // }
        return view('admin.laporan.laporan', compact('transactions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $airlines = Airline::all();
        $users = User::find($id);
        return view('admin.edit', compact(['users','airlines']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'role' => ['required', 'in:admin,user,maskapai'],
            'airline_id' => 'nullable',
        ]);

        $users = User::find($id);
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->role = $request->input('role');
        $users->update($request->all());
        alert()->success('Hore!', 'Operasi yang anda lakukan berhasil');

        return redirect()->route('admin.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $users = User::find($id);
        $users->delete();

        return redirect()->route('admin.dashboard')->with('success', 'deleted successfully');
    }
    
    // public function laporan()
    // {
    //     $user = auth()->user();

    //     if ($user) {
    //         // Mengambil semua transaksi yang terkait dengan airline_id yang memiliki nama sesuai dengan pengguna yang login
    //         $transactions = Transactions::whereHas('flight.airline', function ($query) use ($user) {
    //             $query->where('name', $user->name);
    //         })->get();
    //     } else {
    //         // Jika pengguna tidak login, atasi dengan memberikan nilai koleksi kosong
    //         $transactions = collect();
    //     }

    //     return view('admin.laporan.pending', compact('transactions', 'user'));
    // }

    // public function laporanBerhasil(){
    //     $user = auth()->user();

    //     if ($user) {
    //         // Mengambil semua transaksi yang terkait dengan airline_id yang memiliki nama sesuai dengan pengguna yang login
    //         $transactions = Transaction::whereHas('flight.airline', function ($query) use ($user) {
    //             $query->where('name', $user->name);
    //         })->get();
    //     } else {
    //         // Jika pengguna tidak login, atasi dengan memberikan nilai koleksi kosong
    //         $transactions = collect();
    //     }

    //     return view('admin.laporan', compact('transactions', 'user'));
    // }

    // public function confirmPayment($id)
    // {
    //     $transaction = Transaction::find($id);

    //     if ($transaction) {
    //         // Update status pembayaran menjadi 'Berhasil'
    //         $transaction->payment_status = 'Berhasil';
    //         $transaction->save();

    //         // Kurangi seat_availability pada penerbangan
    //         $flight = $transaction->flight;
    //         $flight->seat_availability -= $transaction->total_seat;
    //         $flight->save();
    //     }

    //     // Redirect atau tampilkan pesan berhasil konfirmasi
    //     return redirect()->route('admin.laporan')->with('success', 'Pembayaran berhasil dikonfirmasi.');
    // }

    public function confirmPayment(Request $request, $id)
    {
        // Mengambil data transaksi
        $transaction = Transaction::find($id);

        // Memeriksa apakah ada kursi tersedia
        $flight = $transaction->flight;
        if ($flight->seat_availability <= 0) {
            // Jika tidak ada kursi tersedia, memberikan pesan kesalahan
            alert()->error('Maaf!', 'Tiket sudah habis.');
            return redirect()->back();
        }

        // Mengupdate status pembayaran
        $transaction->payment_status = 'Success';
        $transaction->save();

        // Mengurangi jumlah kursi yang tersedia dalam tabel penerbangan
        $flight->seat_availability -= 1; // Mengurangi satu kursi
        $flight->save();

        // Memberi pemberitahuan bahwa pembayaran berhasil dikonfirmasi
        alert()->success('Hore!', 'Tiket berhasil dikonfirmasi');

        return redirect()->route('admin.laporan');
    }

    public function canceledPayment($id)
    {
        $transaction = Transaction::find($id);

        $transaction->payment_status = 'Canceled';
        $transaction->save();

        alert()->success('Tiket berhasil di cancel');

        return redirect()->back();
    }

    public function deletePayment(string $id)
    {
        $transaction = Transaction::find($id);

        $transaction->delete();
        alert()->success('Hore!', 'Operasi yang anda lakukan berhasil');
        return redirect()->back();
    }
}
