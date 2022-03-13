<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalcController extends Controller
{
    public function index()
    {
        return view('calculator');
    }


      /**
     * Function for calulator processing page /process
     *
     * @param Request $request
     * @return void
     */

     
    public function calculate(Request $request)
    {
        $request->validate([
            'val1' => 'required|numeric',
            'val2' => 'required|numeric',
            'operator' => [
                'required',
                function ($attribute, $value = 'operator' , $fail) {
                    $class_name = 'App\\Http\\Controllers\\Calc'.ucfirst($value);
                    if (!class_exists($class_name)) {
                         return $fail('That operatar is invalid.');
                    }
                },
            ],
        ],[
            'val1.required' => 'Value 1 cannot be blank',
            'val1.numeric' => 'Value 1 must be a number',
            'val2.required' => 'Value 2 cannot be blank',
            'val2.numeric' => 'Value 2 must be a number',
            'operator.required' => 'Please select an operator'
        ]);

        

        $val1     = $request->input('val1');
        $val2     = $request->input('val2');
        $operator =$request->input('operator');
               //start operator
        $calc     = CalcFactory::build($operator);
        $result   = $calc->calculate($val1,$val2);
        $sign     = $calc->getSign();
        
        return redirect()->route('calculator.home')->with( 
            [ 
                'val1' => $val1,
                'val2' => $val2,
                'result' => $result,                
                'sign' => $sign,
                'operator' => $operator
            ]
        );
    }
}
