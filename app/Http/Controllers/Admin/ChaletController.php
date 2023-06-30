<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use Illuminate\Http\Request;
use App\Models\Ikar;
use App\Models\User;
use App\Models\Photo;
use App\Models\Comment;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class ChaletController extends Controller
{
    public function index()
    {
        return view('admin.chalet.index')->with('chalet', Ikar::where('type', 'chalet')->get());
    }
    public function create()
    {
        return view('admin.chalet.create');
    }
    public function store(StoreRequest $request)
    {
        $user = User::where('phone', $request->phone)->firstOrFail();
        // $photo = $request->img->GetClientOriginalExtension();
        // $file_name = time() . '.' . $photo;
        // $path = 'uploads/house';
        // $request->img->move($path, $file_name);
        $chalet = Ikar::create([
            'region' => $request->region,
            'address' => $request->address,
            'city' => $request->city,
            'show_type' => $request->type,
            'type' => 'chalet',
            'price' => $request->price,
            'space' => $request->space,
            'user_id' => $user->id,
            'floors_number' => $request->floors_number,
            'room_number' => $request->room_number,
            'status' => 'none',
        ]);
        if ($request->img) {
            $photo = $request->img->GetClientOriginalExtension();
            $file_name = time() . '.' . $photo;
            $path = 'uploads/chalet';
            $request->img->move($path, $file_name);
            $photo = Photo::create([
                'image' => $file_name,
                'ikar_id' => $chalet->id,
            ]);
        }
        Alert::toast('chalet added successflly', 'success');
        return redirect()->back();
    }
    public function show($id)
    {
        $chalet = Ikar::with('photo')->where('id', $id)->first();
        $rating = Comment::where('ikar_id', $id)->avg('rating');
        return view('admin.chalet.show')->with('chalet', $chalet)->with([
            'rating' => $rating,
            'roundrating' => round($rating, 2),
        ]);
    }
    public function edit($id)
    {
        $chalet = Ikar::find($id);
        return view('admin.chalet.edit')->with('chalet', $chalet);
    }
    public function update(StoreRequest $request, $id)
    {
        $user = User::where('phone', $request->phone)->firstOrFail();
        $chalet = Ikar::find($id);
        $chalet->region = $request->region;
        $chalet->address = $request->address;
        $chalet->city = $request->city;
        $chalet->show_type = $request->type;
        $chalet->price = $request->price;
        $chalet->space = $request->space;
        $chalet->user_id = $user->id;
        $chalet->room_number = $request->room_number;
        $chalet->floors_number = $request->floors_number;
        $chalet->save();
        $photo = $request->img->GetClientOriginalExtension();
        $file_name = time() . '.' . $photo;
        $path = 'uploads/chalet';
        $request->img->move($path, $file_name);
        $images = Photo::where('ikar_id', $id)->first();
        $images->image = $file_name;
        $images->save();
        Alert::toast('chalet updated successflly', 'success');
        return Redirect()->back();
    }
    public function destroy($id)
    {
        $chalet = Ikar::find($id);
        $destintion = 'upload/chalet/' . $chalet->img;
        if (File::exists($destintion)) {
            File::delete($destintion);
        }
        $chalet->delete();
        Alert::toast('chalet deleted successflly', 'success');
        return redirect()->back();
    }
}
