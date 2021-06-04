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
    public function model(array $row)
    {
        return new Participant([
      		'event_id' => Session::get('event_id'),
        	'participant_id' => $row[0],
        	'name'     => $row[1],
        	'email'    => $row[2],
        	'phone' => $row[3],
        	'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
