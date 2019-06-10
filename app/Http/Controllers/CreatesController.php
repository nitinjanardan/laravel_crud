<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article ; 


class Createscontroller extends Controller
{
	// calling  all the data to diaplay in table 
    public function home()
    {
    	$articles = Article::all();
    
    	return view('home' , ['articles'=> $articles]);

    }
    // inserting in to database 

    public function add(Request $request)
    {
    	$this -> validate($request ,[
    	'title' =>	'required',
    	'description' => 'required'
    	]);
    	//return 'Validation Pass';
    	$articles = new Article;
    	$articles->title = $request->input('title');
    	$articles->description = $request->input('description');
    	$articles->save();
    	return redirect('/')->with('info','Record Saved Successfully ');
    }
    // getting the particular id data from database

    public function update($id)
    {
    	$articles = Article::find($id);
    	return view('update' , ['articles'=> $articles]);

    }

    // eiting the modal after clicking update hyperlink
    public function edit(Request $request , $id)
    {
    	$this -> validate($request ,[
    	'title' =>	'required',
    	'description' => 'required'
    	]);
    	$data = array(
    		'title' =>$request->input('title'),
    		'description' =>$request->input('description')
    		 );
    	Article::where('id' , $id)->update($data);
    	
    	$articles = new Article;
    	$articles->title = $request->input('title');
    	$articles->description = $request->input('description');
    	
    	return redirect('/')->with('info','Record Updated Successfully ');
    }

    public function read($id)
    {
    	$articles = Article::find($id);
    	return view('read' , ['articles'=> $articles]);

    }


    public function delete($id)
    {
    	Article::where('id' , $id)->delete();
    	return redirect('/')->with('info','Record Delete Successfully ');	
    }
}




