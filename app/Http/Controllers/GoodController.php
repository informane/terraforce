<?php


namespace App\Http\Controllers;


use App\Models\Good;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class GoodController extends Controller
{
    public function goods()
    {
        $goods = Good::all();

        return view('goods', ['goods' => $goods]);
    }

    /**
     * Display the user's profile form.
     */
    public function create(Request $request): View
    {
        $good = new Good;
        return view('good.edit', ['good' => $good]);
    }

    /**
     * Display the user's profile form.
     */
    public function edit($id): View
    {
        $good = Good::find($id);
        return view('good.edit', [
            'good' => $good
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {

        $good = Good::find($request->post('id'));
        if($good==null){
            $good = new Good;
        }
        if($good->validated($request)) {
            $good->fill($request->post());
            $good->save();
        }

        return Redirect::to('/goods');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $good = Good::find($request->get('id'));
        $good->delete();

        return Redirect::to('/goods');
    }
}
