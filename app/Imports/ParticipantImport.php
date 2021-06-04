<?php

namespace App\Imports;

use App\Participant;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Session;

class ParticipantImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $col)
    {
        return new Participant([
      		'event_id' => Session::get('event_id'),
        	'participant_id' => $col[0],
        	'name'     => $col[1],
        	'email'    => $col[2],
        	'phone' => $col[3],
        	'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
