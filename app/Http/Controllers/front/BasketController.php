<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Gloudemans\Shoppingcart\Facades\Cart;

class BasketController extends Controller
{
    public function index()
    {

        $courses = Cart::content();

       // dd($courses);

        return view('front.basket', compact('courses'));

    }


    public function showCourse()
    {
        $id = request('id');

        $course = Course::findOrFail($id);
        if (!$course)
            abort(404);

        return view('front.render.Course_modal', compact('Course'))->render();
    }


    function add()
    {
        $id = request('id');
        $qty=1;
        $course = Course::findOrFail($id);
        if (!$course)
            abort(404);

        Cart::add(['id' => $course->id, 'name' => $course->name, 'qty' => $qty, 'price' => $course->discountprice ?? $course->price, 'weight' => 0,
                'options' => [
                    'photo' => $course->photo,
                    'name' => $course->name,
                ]]
        );
////        return Cart::content()->groupBy('id')->count();
//        return Cart::count();
    }

    public function update()
    {

        $rowId = request('id');
        $val = request('val');
        // return $rowId;
        $qty = request('qty');
        $cart = Cart::update($rowId, ['qty' => $qty]); // Will update the name

    }

    public function destroy($rowId)
    {
        Cart::remove($rowId);
        return redirect()->back()
            ->with('mesaj', 'Mehsul sebetden cixarildi')
            ->with('type', 'success');
    }
}
