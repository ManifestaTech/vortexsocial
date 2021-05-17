<?php

namespace App\Repositories;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Stan;

class ConversationRepository
{

    public function joinConversation($phone, $groupId)
    {
        $stan = Stan::where('phone', $phone)->firstOrFail();
        $group = Group::firstOrFail($groupId);

        if(!$stan) {
            $stan = new Stan;
            $stan->phone = $phone;
            // $stan->wa_id = $this->fetchWaId($phone);
            $stan->save();
        }

        $stanning = $group->guru->stans->has($stan->id);

        if (!$stanning) {
            $group->guru->stans()->attach($stan->id);
        }


        // Add Stan to Conversation
        // Send Welcome Messages
        


    }
    
}