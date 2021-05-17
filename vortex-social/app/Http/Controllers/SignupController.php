<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Plan;
use Guru;
use Group;
use Profile;
use Illuminate\Support\Facades\Auth;
use App\Repositories\TwilioRepository;


class SignupController extends Controller
{
    
    public function plan(Request $request)
    {
        $plans = Plan::all();
        
        return view('signup.select-plan')
            ->with('plans', $plans);
    }
    
    public function billingAccount(Request $request, Plan $plan)
    {
        $user = Auth::user();
        $user->billingAccount()->create(['plan_id' => $plan->id]);

        return view('signup.billing')
            ->with('plan', $plan);

    }


    public function saveNewAccount(Request $request)
   {
       // TODO run Stripe on front end first
       
       $user = Auth::user();

       $request->validate([
        'first_name' => 'max:255',
        'last_name' => 'max:255',
        'zip' => 'max:255',
            ]);
        $billingAccount = $user->billingAccount->first();
        $billingAccount->first_name = $request->first_name;
        $billingAccount->last_name = $request->last_name;
        $billingAccount->zip = $request->zip;
        $billingAccount->save();

        return redirect(route('search.numbers'));

   } 

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
        // TODO CATCH NO NUMBER

        // $provision = $repo->selectNumber($number);

        $user = Auth::user();
        $guru = new Guru;
        $guru->name = $user->name;
        $guru->phone = $number;
        $user->guru()->save($guru);

        return redirect(route('signup.group'));

    }

   public function group()
   {
        return view('signup.group');
   }

    public function saveGroup(Request $request)
    {

    $request->validate([
        'name' => 'max:255|required',
        'welcome' => 'max:1200|required',
    ]);

    $guru = Auth::user()->guru;

    $group = new Group;
    $group->name = $request->name;
    $group->welcome = $request->welcome;
    $guru->groups()->save($group);

    return redirect(route('signup.profile'));


    }

   public function profile()
   {

        return view('signup.profile');
   }

   public function saveProfile(Request $request)
   {

        $request->validate([
            'title' => 'max:255',
            'description' => 'max:1000',
        ]);

        $user = Auth::user();
        $profile = new Profile;
        $profile->title = $request->title;
        $profile->description = $request->description;
        $user->profile()->save($profile);

dd('profile saved');

        return view('signup.profile');
   }


}
