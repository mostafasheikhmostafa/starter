<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Http\Requests\OfferRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use LaravelLocalization;

class CrudController extends Controller
{
    public function __construct()
    {

    }
    
    public function getOffers()
    {
        return Offer::get();
    }
  /*  public function store()
     {// Offer= esme table bl modele
         Offer::create([
             'name' => 'Offer3',
             'price' => '5000',
             'details' => 'offer details',
         ]);
         }*/
         public function create()
         {
             return view('offers.create');
         }

         public function store(OfferRequest $request)//->request jeyi mn l form(name:price...)
         {
             
        //validate data before insert to database
        
       // $messages= $this-> getMessages();
       // $rules= $this-> getRulse();
       //  $validator = Validator::make($request->all() ,$rules,$messages);
       // if($validator-> fails()){
           // return redirect()->back()->withErrors($validator)->withInputs($request->all());
        
          //insert
            Offer::create([
                'name_ar' => $request->name_ar,
            'name_en' =>   $request->name_en,
            'price' =>  $request->price,
            'details_ar' => $request->details_ar,
            'details_en' => $request->details_en,
            ]);
            return redirect()->back()->with(['success' => 'تم اضافه العرض بنجاح ']);
         }
        /* protected function getMessages(){
             return  $messages=['name.required' =>  __('messages.offer name required'),
             'name.unique' => __('messages.offer name must be unique') ,
             'price.numeric' => 'سعر العرض يجب ان يكون ارقام',
             'price.required' => 'السعر مطلوب',
             'details.required' => 'ألتفاصيل مطلوبة ',];
         }
         protected function getRulse(){
            return $rules = [
                'name' => 'required|max:100|unique:offers,name',
                'price' => 'required|numeric',
                'details' => 'required',
            ];
        }
        */
        public function getAllOffers(){
            //LaravelLocalization::getCurrentLocale()=> ar and en,
            $offers = Offer::select('id',
            'name_' . LaravelLocalization::getCurrentLocale() . ' as name','price',
            'details_' . LaravelLocalization::getCurrentLocale() . ' as details')->get();
            return view('offers.all', compact('offers'));// compact('offers')-> haydi collection bsta5dema bl
                                                          // foreach taba3 table
        }
         
}
