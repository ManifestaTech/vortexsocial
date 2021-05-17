<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TwilioRepository;
use Illuminate\Support\Facades\Auth;
use Guru;

class TwilioController extends Controller
{
    public function search(Request $request)
    {
        $repo = new TwilioRepository();

        $availableNumbers = $repo->findNumber($request->contains);

        return view('signup.search')
            ->with('availableNumbers', $availableNumbers);
    }


    public function provision(Request $request)
    {
        $repo = new TwilioRepository();

        $number = $request->number;

        // $provision = $repo->selectNumber($number);

        $user = Auth::user();
        $guru = new Guru;
        $guru->name = $user->name;
        $guru->phone = $number;
        $user->guru()->save($guru);

        return;

    }
}
