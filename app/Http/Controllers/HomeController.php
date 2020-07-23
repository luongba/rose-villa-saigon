<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
   	public function welcome(Request $request)
    	{
        	return view('pages.index');
    	} 
   	public function events(Request $request)
    	{
        	return view('pages.events');
   		} 
   	public function spa(Request $request)
    	{
        	return view('pages.spa');
   		} 
   	public function fooddrink(Request $request)
    	{
        	return view('pages.food-drink');
   		} 
    public function about(Request $request)
      {
          return view('pages.about');
      }
    public function contact(Request $request)
      {
          return view('pages.contact');
      }
    public function singleroom(Request $request)
      {
          return view('pages.single-room');
      }

}
