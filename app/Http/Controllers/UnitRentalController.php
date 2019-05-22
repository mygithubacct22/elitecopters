<?php

namespace App\Http\Controllers;

use App\Models\UnitRental;
use JWTAuth;

class UnitRentalController extends Controller
{
    public function index()
    {
        $currentUser = auth()->user();

        return view('page-rentals-index', [
            'rentals' => UnitRental::all()
        ]);
    }

    public function show($id)
    {
        $unitRental  = UnitRental::findOrFail($id);
        $currentUser = auth()->user();
        $jWToken     = JWTAuth::fromUser($currentUser);

        return view('page-rentals-show', [
            'jWToken' => $jWToken,
            'rental'  => $unitRental,
        ]);
    }

    public function book($id)
    {
        $unitRental  = UnitRental::findOrFail($id);
        $currentUser = auth()->user();
        $jWToken     = JWTAuth::fromUser($currentUser);

        return view('page-rentals-book', [
            'jWToken' => $jWToken,
            'rental'  => $unitRental,
        ]);
    }
}
