<?php

namespace App\Repositories;


use Stan;
use Guru;
use Twilio\Rest\Client;
use Illuminate\Support\Str;



class TwilioRepository
{

    public function findNumber($contains)
    {

        $sid = getenv("TWILIO_ACCOUNT_SID");
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio = new Client($sid, $token);

        $local = $twilio->availablePhoneNumbers("US")
                ->local
                ->read(["smsEnabled" => true, "contains" => $contains], 20);

        $collectedNumbers = collect($local);

        $formatted = $collectedNumbers->pluck('friendlyName', 'phoneNumber');

        // $vanitized = $this->vanitize($contains, $formatted);

       return $formatted;

    }

    public function selectNumber($phoneNumber)
    {
        // TODO:: catch exceptions.
        \Log::debug('Provisioning Number' . $phoneNumber);
        // $sid = getenv("TWILIO_ACCOUNT_SID");
        // $token = getenv("TWILIO_AUTH_TOKEN");
        // $twilio = new Client($sid, $token);

        // $incoming_phone_number = $twilio->incomingPhoneNumbers
        //                                 ->create(["phoneNumber" => "+15017122661"]);

        // print($incoming_phone_number->sid);
        
        // create sub acct
         $subAcct = $this->createSubAccount();
        // TODO PASS SID, NAME

        // create end user
            $endUser = $this->createEndUser();
        // save to guru

        $guru = Guru::first();
        $guru->update(['phone' => $phoneNumber]);
        // dd($guru);

    }

    public function createSubAccount()
    {
        // $sid = getenv("TWILIO_ACCOUNT_SID");
        // $token = getenv("TWILIO_AUTH_TOKEN");
        // $twilio = new Client($sid, $token);

        // $account = $twilio->api->v2010->accounts
        //                             ->create(["friendlyName" => "Submarine"]);

        // print($account->sid);

        \Log::debug('CREATING SUB ACCOUNT');
        return;
    }
    
    public function createEndUser()
    {
        \Log::debug('CREATING END USER');
        return;
    }

    public function formatSearchResults($contains)
    {
        // 
    }

    public function vanitize($contains, $availableNumbers)
    {
        // build alpha array
        // loop and vanitize available numbers in friendlyName format

        // CHECK IF CONTAINS  HAS ALPHA
        
        $keypad = [
            'A' => 2,
            'B' => 2,
            'C' => 2,
            'D' => 3,
            'E' => 3,
            'F' => 3,
            'G' => 4,
            'H' => 4,
            'I' => 4,
            'J' => 5,
            'K' => 5,
            'L' => 5,
            'M' => 6,
            'N' => 6,
            'O' => 6,
            'P' => 7,
            'Q' => 7,
            'R' => 7,
            'S' => 7,
            'T' => 8,
            'U' => 8,
            'V' => 8,
            'W' => 9,
            'X' => 9,
            'Y' => 9,
            'Z' => 9,
        ];
        $vanitySplit = str_split($contains);
        $vanityNumeric = collect();
        // return($vanitySplit);

        foreach($vanitySplit as $key => $split)
        {
            if(!$split) continue;

           $result = $keypad[$split];
           $vanityNumeric->push($result);
        }

        $vanitized = collect();

        if($vanityNumeric)
        {
            $vanityNumeric = $vanityNumeric->implode('');

            foreach($availableNumbers as $friendly => $number)
            {
                $vanitizedNumber = Str::replace($vanityNumeric, $contains, $friendly);
                $vanitized->push($vanitizedNumber);
    
            }
        }
        return $vanitized;
    }



}