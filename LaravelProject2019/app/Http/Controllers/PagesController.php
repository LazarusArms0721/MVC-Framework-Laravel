<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Validator,Redirect,Response,File;

use App\Page;
use App\Assignment;
use App\Blog;


class PagesController extends Controller
{
    public function getIndex(Request $request){

        $slug = $request->path();

        $pages = Page::all();



        $page_title = "Home";
        return view ('pages.index', compact('pages'));
    }

    public function getAbout(){
        return view ('pages.about');
    }

    public function getAssignments(){

        $assignments = Assignment::all();

        return view ('pages.assignments', compact('assignments'));
    }

    public function createAssignment(){

        return view ('pages.create_assignment');
    }

    public function storeAssignment(){

        request()->validate([
            'assignment_image' => 'required|image|mimes:jpeg,png,jpg,gif,svgl'
        ]);
        if ($files = $request->file('assignment_image')){
            $destinationPath = 'public/image/';
            $assignmentImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $assignmentImage);
            $insert['assignment_image'] = $assignmentImage;
        }
        $check = Image::insertGetId($insert);

        return Redirect::to("image")
            ->withSuccess('Great! Image has been successfully uploaded.');

        $assignment = new Assignment();
        $assignment->name = request('name');
        $assignment->assignment_text = request('assignment_text');
        $assignment->assignment_image = request('assignment_image');
        $assignment->save();
    }

    public function getBlog(){

        $blogs = Blog::all();

        return view ('pages.blog', compact('blogs'));
    }

    public function createBlog(){

        $assignments = Assignment::all();

        return view ('pages.create_blog', compact('assignments'));
    }

    public function storeBlog(){

        $blog = new Blog();
        $blog->assignment_id = request('assignment_id');
        $blog->title = request('title');
        $blog->text = request('text');
        $blog->save();

        return view('pages.blog');
    }

}
