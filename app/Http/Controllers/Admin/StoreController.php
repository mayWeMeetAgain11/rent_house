<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use Illuminate\Http\Request;
use App\Models\Ikar;
use App\Models\User;
use App\Models\Photo;
use App\Models\Comment;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class StoreController extends Controller
{
    public function index()
    {
        return view('admin.store.index')->with('store', Ikar::where('type', 'store')->get());
    }
    public function create()
    {
        return view('admin.store.create');
    }
    public function store(StoreRequest $request)
    {
        $user = User::where('phone', $request->phone)->firstOrFail();
        // $photo = $request->img->GetClientOriginalExtension();
        // $file_name = time() . '.' . $photo;
        // $path = 'uploads/house';
        // $request->img->move($path, $file_name);
        $store = Ikar::create([
            'region' => $request->region,
            'address' => $request->address,
            'city' => $request->city,
            'show_type' => $request->type,
            'type' => 'store',
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
            $path = 'uploads/store';
            $request->img->move($path, $file_name);
            $photo = Photo::create([
                'image' => $file_name,
                'ikar_id' => $store->id,
            ]);
        }
        Alert::toast('store added successflly', 'success');
        return redirect()->back();
    }
    public function show($id)
    {
        $store = Ikar::with('photo')->where('id', $id)->first();
        $rating = Comment::where('ikar_id', $id)->avg('rating');
        return view('admin.store.show')->with('store', $store)->with([
            'rating' => $rating,
            'roundrating' => round($rating, 2),
        ]);
    }
    public function edit($id)
    {
        $store = Ikar::find($id);
        return view('admin.store.edit')->with('store', $store);
    }
    public function update(StoreRequest $request, $id)
    {
        $user = User::where('phone', $request->phone)->firstOrFail();
        $store = Ikar::find($id);
        $store->region = $request->region;
        $store->address = $request->address;
        $store->city = $request->city;
        $store->show_type = $request->type;
        $store->price = $request->price;
        $store->space = $request->space;
        $store->user_id = $user->id;
        $store->room_number = $request->room_number;
        $store->floors_number = $request->floors_number;
        $store->save();
        $photo = $request->img->GetClientOriginalExtension();
        $file_name = time() . '.' . $photo;
        $path = 'uploads/store';
        $request->img->move($path, $file_name);
        $images = Photo::where('ikar_id', $id)->first();
        $images->image = $file_name;
        $images->save();
        Alert::toast('store updated successflly', 'success');
        return Redirect()->back();
    }
    public function destroy($id)
    {
        $store = Ikar::find($id);
        $destintion = 'upload/store/' . $store->img;
        if (File::exists($destintion)) {
            File::delete($destintion);
        }
        $store->delete();
        Alert::toast('store deleted successflly', 'success');
        return redirect()->back();
    }
}
