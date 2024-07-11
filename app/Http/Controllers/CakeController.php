<?php

namespace App\Http\Controllers;

use App\Models\Cake;
use Illuminate\Http\Request;

class CakeController extends Controller
{
    const DISABLE = 0;
    const ENABLE = 1;

    public function index()
    {

        $access_rule = explode(',', auth()->user()->access_rule);
        if (!in_array("1", $access_rule)) {
            return abort(404);
        }

        $render_data = [
            'cakes' => Cake::all(),
        ];

        return view('main.pages.cakes.cakes', $render_data);
    }

    public function store(Request $request)
    {
        $imagename = $request->imagename;
        $formData = [
            'image_path' => $imagename,
            'cakename' => $request->cakename,
            'subname' => $request->subname,
            'description' => $request->description,
            'flavor' => $request->flavor,
            'price' => $request->price,
            'hour' => $request->hourInput,
            'minute' => $request->minuteInput,
        ];

        if ($request->timeChecked == 1) {
            $formData['hour'] = $request->numtime;
            $formData['minute'] = 0;
        } else if ($request->timeChecked == 2) {
            $formData['hour'] = 0;
            $formData['minute'] = $request->numtime;
        }

        Cake::create($formData);

        return response()->json([
            'response' => 1,
            'message' => 'You have successfully add new cake.',
            'path' => '/cakes'
        ]);
    }

    public function edit(string $id)
    {
        $data = Cake::find($id);
        return response()->json($data);
    }

    public function update(Request $request, string $id)
    {
        $e_imagename = $request->e_imagename;

        $formData = [
            'image_path' => $e_imagename,
            'cakename' => $request->e_cakename,
            'subname' => $request->e_subname,
            'description' => $request->e_description,
            'flavor' => $request->e_flavor,
            'price' => $request->e_price,
            'hour' => $request->e_hourInput,
            'minute' => $request->e_minuteInput,
        ];

        if ($request->timeChecked == 1) {
            $formData['hour'] = $request->e_numtime;
            $formData['minute'] = 0;
        } else if ($request->timeChecked == 2) {
            $formData['hour'] = 0;
            $formData['minute'] = $request->e_numtime;
        }

        Cake::where('id', $id)->update($formData);

        return response()->json([
            'response' => 1,
            'message' => 'You have successfully update this cake.',
            'path' => '/cakes'
        ]);
    }

    public function updateStatus(Request $request, string $id)
    {
        $cake = Cake::find($id);
        $cake->status = $request->status == self::ENABLE ? self::DISABLE : self::ENABLE;
        $cake->save();

        return response()->json([
            'response' => 1,
            'message' => 'You have successfully update the status of this cake.',
            'path' => '/cakes'
        ]);
    }

    public function destroy(string $id)
    {
        $cake = Cake::find($id);
        $cake->delete();

        return response()->json([
            'response' => 1,
            'message' => 'You have successfully delete this cake.',
            'path' => '/cakes'
        ]);
    }

    public function storeImage(Request $request)
    {
        $filename = '';

        if ($request->hasFile('cakeimage')) {

            $image_name = time() . '.' . $request->cakeimage->extension();

            $filename = $request->getSchemeAndHttpHost() . '/images/cakes/' . $image_name;

            $request->cakeimage->move(public_path('/images/cakes/'), $filename);

            return response()->json([
                'image' => $filename,
                'image_name' => $image_name
            ]);
        }
    }
}
