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
        All persons

        Returned in json format
    */
    public function getPersons($request, $response) {

        // Grab all the persons from the database
        $persons = Persons::all();
        
        // Create an array for the persons
        $jData = array();

        // Put an array of the person's properties and add to the jData array
        foreach ($persons as $person) {
            $tmp = array('uid' => $person->uid, 'firstname' => $person->firstname, 'lastname' => $person->lastname, 'dob' => $person->dob, 'zip' => $person->zipcode);
            $jData[] = $tmp;
        }

        // Create a json response
        $res = $response->withJson($jData);

        // Return the responses
        return $res;
    }

    /*
        Get users by firstname

        Returned in json format
    */
    public function getPersonFirstName($request, $response, $args) {
        // Get name from the route
        $name = $args['name'];

        // Query the dataabase for the user
        $persons = Persons::where("firstname", "=", $name)->get();

       // Create an array for the persons
        $jData = array();

        // Put an array of the person's properties and add to the jData array
        foreach ($persons as $person) {
            $tmp = array('uid' => $person->uid, 'firstname' => $person->firstname, 'lastname' => $person->lastname, 'dob' => $person->dob, 'zip' => $person->zipcode);
            $jData[] = $tmp;
        }

        // Create a json response
        $res = $response->withJson($jData);

        // return the response
        return $res;
    }

    /*
        Get users by lastname

        Returned in json format
    */
    public function getPersonLastName($request, $response, $args) {
        // Get name from the route
        $name = $args['name'];

        // Query the database for the user
        $persons = Persons::where("lastname", "=", $name)->get();

        // Create an array for the persons
        $jData = array();

        // Put an array of the person's properties and add to the jData array
        foreach ($persons as $person) {
            $tmp = array('uid' => $person->uid, 'firstname' => $person->firstname, 'lastname' => $person->lastname, 'dob' => $person->dob, 'zip' => $person->zipcode);
            $jData[] = $tmp;
        }

        // Create a json response
        $res = $response->withJson($jData);

        // return the response
        return $res;
    }

    /*
        Get specific user by uid

        Returned in json format
    */
    public function getPersonUid($request, $response, $args) {
        // Get name from the route
        $name = $args['uid'];

        // Query the database for the user
        $person = Persons::where("uid", "=", $name)->first();

        $jData = array('uid' => $person->uid, 'firstname' => $person->firstname, 'lastname' => $person->lastname, 'dob' => $person->dob, 'zip' => $person->zipcode);

        // Create a json response
        $res = $response->withJson($jData);

        // return the response
        return $res;
    }
    
}