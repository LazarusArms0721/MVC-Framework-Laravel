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

    public function getProjects(){
        return view ('pages.projects');
    }

    public function getBlog(){

//        haalt alle entries op uit blogs table

        $blogs = Blog::all();

        return view ('blog.blade.php');

//        return view ('pages.blog');


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
