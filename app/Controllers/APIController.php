<?php
/*
    Handle API Calls

    Author - Hunter Keca
*/

namespace App\Controllers;

use App\Models\Persons;

class APIController extends Controller
{
    /*
        Index
    */
    public function getIndex($request, $response) {

        $persons = Persons::all();
        //$jData = array('uid' => $person->uid, 'firstname' => $person->firstname, 'lastname' => $person->lastname, 'dob' => $person->dob);
        $jData = array();

        foreach ($persons as $person) {
            $tmp = array('uid' => $person->uid, 'firstname' => $person->firstname, 'lastname' => $person->lastname, 'dob' => $person->dob, 'zip' => $person->zipcode);
            $jData[] = $tmp;
        }


        $res = $response->withJson($jData);

        return $res;
    }
}