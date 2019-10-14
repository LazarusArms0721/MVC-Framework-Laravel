<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Page;


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
        return view ('pages.blog');
    }

    public function createBlog(){
        return view ('pages.create_blog');
    }

}
