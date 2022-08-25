<?php

namespace App\Http\Controllers;

use App\Models\Enroll;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class AdminControllsEnrollController extends Controller
{
    public function manage()
    {
        $enrolls = Enroll::latest()->get();
        return view('admin.enroll.index', [
            'enrolls' => $enrolls
        ]);
    }
    public function status($id) 
    {
        // return $id;
        $enroll = Enroll::where('id', $id)->with('course')->first();
        // return $enroll->status;
        if ($enroll->status == 0)
        {
            $enroll->status = 1;
            $enroll->payment_amount = $enroll->course->fee; 
            $message = "Status changed successfully";
        }
        else {
            
            $enroll->status = 1;
            $message = "Enroll Already Aprroved";
        }
        $enroll->save();
        return back()->with('message', $message);
    }
}
