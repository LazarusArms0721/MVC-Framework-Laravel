<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Page;
use App\Assignment;
use App\Blog;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Assign;


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
        $assignments = Assignment::all()->sortByDesc('created_at');



        return view ('pages.assignments', compact('assignments'));
    }

    public function createAssignment(){

        return view ('pages.create_assignment');
    }

    public function storeAssignment(Request $request){
        //hier wordt aangegeven welke velden verplicht zijn.
        $this->validate($request, [
            'name' => 'required',
            'assignment_text' => 'required',
            'assignment_image' => 'image'
        ]);


//      Afbeelding wordt hier opgehaald bij submissie en in een public envorinment geplaats
        if ($request->hasFile('assignment_image')){

            $filenameWithExt = $request->file('assignment_image')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('assignment_image')->getClientOriginalExtension();

            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('assignment_image')->storeAs('public/assignment_images1', $fileNameToStore);

        } else {
            $fileNameToStore = 'noimage.jpeg';
        }

//        // hier wordt een nieuwe assignment qua gegevens opgehaald en opgeslagen als nieuwe entry.
        $assignment = new Assignment();


        $assignment->name            = $request->input('name');
        $assignment->assignment_text = $request->input('assignment_text');
        $assignment->assignment_image = $fileNameToStore;

        $assignment->save();

        return redirect()->to('/assignments');
    }

    public function showAssignment(Assignment $assignment){

        $assignment = Assignment::find($assignment->id);


        return view('pages.assignment_update', compact('assignment'));
    }

    public function updateAssignment(Request $request, $id){

        $name            = $request->input('name');
        $assignmentText  = $request->input('assignment_text');
        $assignmentImage = $request->input('assignment_image');

        DB::update('update assignment set name=?, assignment_text=?, assignment_image=? where id=?', [$name, $assignmentText, $assignmentImage, $id]);

    }

    public function deleteAssignment(Request $request){

    }

    public function assignmentFilter(Request $request) {

        return Assignment::filter($request)->get();


    }

    public function getBlogs(){
        $blogs = Blog::all()->sortByDesc('created_at');
        $assignments = Assignment::all();



        return view ('pages.blog', compact('blogs', 'assignments'));
    }

    public function getBlogFilter(Request $request) {

        $filteredblogs =  Blog::filter($request)->get();
        $assignments = Assignment::all();

        return view ('pages.blog_results', compact('filteredblogs', 'assignments'));


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

        return redirect()->to('/blog');
    }

    public function deleteBlog(){

    }

}
