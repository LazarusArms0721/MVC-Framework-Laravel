<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;

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

    public function storeAssignment(Request $request){

        $this->validate($request, [
            'name' => 'required',
            'assignment_text' => 'required',
            'assignment_image' => 'required',
        ]);

        $assignment = new Assignment();
        $assignment->name = request('name');
        $assignment->assignment_text = request('assignment_text');
        $assignment->assignment_image = request('assignment_image');
        $assignment->save();

        return view ('pages.blog');
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
