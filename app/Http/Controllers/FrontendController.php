<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
   public function about_us(){
       return view('frontend.about_us');
   }
   public function our_partners(){
       return view('frontend.our_partner');
   }
   public function consumer_studies(){
       return view('frontend.consumer_studies');
   }
   public function contact_us(){
       return view('frontend.contact_us');
   }
   public function frontend_faq(){
       return view('frontend.faq');
   }
   public function resources(){
       return view('frontend.resources');
   }
   public function terms_of_use(){
       return view('frontend.terms_of_use');
   }
   public function privacy_policy(){
       return view('frontend.privacy_policy');
   }





   public function careers(){
       return view('frontend.careers');
   }
   public function consumer_connect(){
       return view('frontend.consumer.connect');
   }
   public function consumer_data_analysis(){
       return view('frontend.consumer.data_analysis');
   }
   public function consumer_data_visualization(){
       return view('frontend.consumer.data_visualization');
   }
   public function consumer_questionnaire(){
       return view('frontend.consumer.questionnaire');
   }
   public function consumer_sampling(){
       return view('frontend.consumer.sampling');
   }
}
