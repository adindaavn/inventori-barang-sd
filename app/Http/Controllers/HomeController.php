<?php

namespace App\Http\Controllers;

use App\Models\BarangInventaris;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $brg = BarangInventaris::all()->count();
        $pinjam = Peminjaman::all()->count();

        // Query for transaction counts for each day of the week
        $hari = Peminjaman::selectRaw('DAYOFWEEK(pb_tgl) as day_of_week, COUNT(*) as count')
            ->whereBetween('pb_tgl', [now()->subWeek(), now()])  // Filter for the past 7 days
            ->groupBy('day_of_week')
            ->orderBy('day_of_week')
            ->get();

        // Define all days of the week (Sunday to Saturday)
        $days = ['SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT'];

        // Initialize an array to hold the results
        $transaksi = [];

        foreach ($days as $index => $day) {
            // Look for the count for this day
            $dayCount = $hari->firstWhere('day_of_week', $index + 1); // Day of week in DB is 1 = Sunday, 2 = Monday, ...

            // If there's no count for this day, set it to 0
            $transaksi[] = [
                'day' => $day,
                'count' => $dayCount ? $dayCount->count : 0,
            ];
        }


        return view('home', compact('brg', 'pinjam', 'transaksi'));
    }

}
