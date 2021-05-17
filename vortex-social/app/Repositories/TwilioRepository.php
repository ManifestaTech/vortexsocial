<?php

namespace App\Repositories;


use Stan;
use Guru;
use Twilio\Rest\Client;


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






}