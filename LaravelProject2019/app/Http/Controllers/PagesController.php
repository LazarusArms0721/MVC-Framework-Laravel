<?php

namespace App\Http\Controllers;

use App\Page;
use App\Assignment;
use App\Blog;
use Illuminate\Routing\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Assign;
use RealRashid\SweetAlert\Facades\Alert;


class PagesController extends Controller
{
    public function getIndex(Request $request){
        $slug = $request->path();

        $latestAssignment = Assignment::latest()->first();
        $latestBlog       = Blog::latest()->first();


        $pages = Page::all();

        $page_title = "Home";
        return view ('pages.index', compact('pages', 'latestAssignment', 'latestBlog'));
    }

    public function getAssignments(){
        $assignments = Assignment::orderBy('created_at', 'DESC')->paginate(9);

        if(session('success_message')){
            Alert::toast('Assignment created successfully!', 'success');
        }

        elseif(session('deleted_message')){
            Alert::toast('Assignment deleted successfully!', 'success');
        }

        elseif(session('edited_message')){
            Alert::toast('Assignment edited successfully!', 'success');
        }

        return view ('pages.assignments', compact('assignments'));
    }

    public function getAssignment(Assignment $assignment){
        $assignment = Assignment::find($assignment->id);


        return view('pages.assignment_single', compact('assignment'));
    }

    public function createAssignment(){

        return view('pages.create_assignment');
    }

    public function storeAssignment(Request $request){
        //hier wordt aangegeven welke velden verplicht zijn.
        $this->validate($request, [
            'name' => 'required|min: 8',
            'assignment_text' => 'required|min: 15',
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

//        return redirect()->to('/assignments')->withSuccessMessage('Assignment successfully added!');
        return redirect('/assignments')->with('success', 'Post was created!');
    }

    // Get selected assignment through edit button.
    public function showAssignment(Assignment $assignment){

        $assignment = Assignment::find($assignment->id);

        return view('pages.assignment_update', compact('assignment'));
    }

    public function updateAssignment(Request $request, Assignment $assignment){


        if ($request->hasFile('assignment_image')){

            $filenameWithExt = $request->file('assignment_image')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('assignment_image')->getClientOriginalExtension();

            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('assignment_image')->storeAs('public/assignment_images1', $fileNameToStore);

        } else {
            $fileNameToStore = $assignment->assignment_image;
        }

        $assignment = Assignment::where('id', $assignment->id)->update([

            'name' => $request->input('name'),
            'assignment_text' => $request->input('assignment_text'),
            'assignment_image' => $fileNameToStore

        ]);


        if ($assignment){


            return redirect('/assignments')->withEditedMessage('Assignment updated successfully');
        }


        return back()->withInput();
    }

    public function deleteAssignment(Assignment $assignment){

        $assignment->delete();

        return redirect('/assignments')->withDeletedMessage('Assignment deleted successfully');

    }

    public function assignmentFilter(Request $request) {

        return Assignment::filter($request)->get();


    }

    public function getBlogs(){
        $blogs = Blog::orderBy('created_at', 'DESC')->paginate(10);
        $assignments = Assignment::all();

        if(session('success_message')){
            Alert::toast('Success! Created blogpost', 'success');
        }
        elseif(session('edited_message')){
            Alert::toast('Success! Edited blogpost', 'success');
        }
        elseif(session('deleted_message')){
            Alert::toast('Success! Deleted blogpost.', 'success');
        }

        return view ('pages.blog', compact('blogs', 'assignments'));
    }

    public function getSingleBlog(Blog $blog){
        $blog = Blog::find($blog->id);

        return view ('pages.blog_single', compact('blog'));
    }

    public function getBlogFilter(Request $request) {

        $filteredblogs =  Blog::filter($request)->orderBy('created_at', 'DESC')->paginate(10);
        $assignments = Assignment::all();

        return view ('pages.blog_results', compact('filteredblogs', 'assignments'));


    }

    public function getDateFilter(Request $request){
        $startdate  = $request->input('startdate');
        $enddate    = $request->input('enddate');
        $assignments = Assignment::all();

//        $filteredblogs = Blog::whereBetween('created_at', [$startdate, $enddate]);

        $filteredblogs = Blog::filter($request)->whereBetween('created_at', [$startdate, $enddate])->get();

        return view('pages.blog_results_date', compact('filteredblogs', 'assignments', 'startdate','enddate'));

    }

    public function createBlog(){
        $assignments = Assignment::all();

        return view ('pages.create_blog', compact('assignments'));
    }

    public function storeBlog(Request $request){
        $this->validate($request, [
            'assignment_id' => 'required',
            'title' => 'required',
            'text' => 'required'
        ]);


        $blog = new Blog();
        $blog->assignment_id = request('assignment_id');
        $blog->title = request('title');
        $blog->text = request('text');
        $blog->user_id = Auth::user()->id;
        $blog->save();

        return redirect()->to('/blog')->withSuccessMessage('Blogpost created succesfully!');
    }

    public function showBlog(Blog $blog, Assignment $assignments){


        $blog = Blog::find($blog->id);
        $assignments = Assignment::all();

        return view ('pages.blog_update', compact('blog', 'assignments'));

    }

    public function updateBlog(Request $request,  Blog $blog ){

        $this->validate($request, [
            'assignment_id' => 'required',
            'title' => 'required',
            'text' => 'required'
        ]);

        $blogUpdate = Blog::where('id', $blog->id)->update([

            'assignment_id' => $request->input('assignment_id'),
            'title' => $request->input('title'),
            'text' => $request->input('text'),


        ]);


        if ($blogUpdate){

            return redirect('/blog')->with('success', 'Blog updated sucessfully')->withEditedMessage('Blogpost edited successfully!');
        }

            return back()->withInput();

    }

    public function deleteBlog(Blog $blog){

        $currentPath = \Illuminate\Support\Facades\Route::getFacadeRoot()->current()->uri();

        $blog->delete();

        if ($currentPath === 'dashboard'){
            return redirect('/dashboard');
        } else {

            return redirect('/blog')->withDeletedMessage('Blogpost deleted successfully!');

        }

    }

}
