<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\faqmodel;

class FaQController extends Controller
{
    public function faq() {

        $faq = faqmodel::all();
        return view('admin.faq',compact('faq'));
    }

    public function addFaq () {
       return view('admin.addFaq');
    }
    

    public function savefaq(Request $request) {


        $faq = new faqmodel();
        $faq->question= $request->question;
        $faq->reponse= $request->reponse;
        $faq->save();

        activity()
            ->causedby(auth()->user())
            ->performedOn($faq)
            ->log('faq created');
                        
        $notification = [
            'message' => 'FAQ create successfully.',
            'alert-type' => 'success'
        ];



        
        return redirect()->route('admin.faq')->with($notification);
    }


}
