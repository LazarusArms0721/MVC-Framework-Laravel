<?php
/**
 * Created by PhpStorm.
 * User: erhan
 * Date: 14/10/2019
 * Time: 14:19
 */

namespace App\Http\Controllers;

use App\Assignment;
use Illuminate\Http\Request;

class AssignmentsController extends Controller
{
    public function getIndex(Request $request){

//        $agent_id = $_GET['assignment_id'];

    }

    public function index(Request $request){

        return Assignment::filter($request)->get();
    }



}