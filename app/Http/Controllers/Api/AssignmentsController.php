<?php


namespace App\Http\Controllers\Api;

use App\Assignment;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use PhpParser\Node\Expr\Assign;


class AssignmentsController extends Controller
{
    public function getIndex(Request $request){

//        $agent_id = $_GET['assignment_id'];

    }

    public function index(Request $request){

        return Assignment::filter($request)->get();
    }

    public function getAssignments(){

        $user = $this->authUser();





    }




}