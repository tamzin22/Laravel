<?php

  namespace App\Http\Controllers;

  use App\Post;

  class PagesController extends Controller{

  	public function getIndex(){

      $posts = Post::orderBy('created_at','desc')->limit(5)->get();

  		#process variable data or params
  		#talk to the model
  		#receive from the model
  		#compile or process data from the model
  		#pass data to the correct view
  		return view('Pages.welcome')->withPosts($posts);

  	}

  	public function getAbout(){

  		$first = 'Evelyne';
  		$Last  = 'Otwoma';

  		$fullname = $first ." ".$Last;
  		$email = "evelynetamzin@gmail.com";
  		$data = [];
  		$data['email'] = $email;
  		$data['fullname'] = $fullname;

  		return view('Pages.about')-> withData($data);

  	}

  	public function getContact(){

  		return view('Pages.contact');

  	}

  }