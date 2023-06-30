<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use Illuminate\Http\Request;
use App\Models\Ikar;
use App\Models\Photo;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;



class HomeController extends Controller
{
    public function showRating()
    {
        return view('admin.comment')->with('rating', Comment::with(['user', 'ikar'])->get()->toArray());
    }

    public function showAll()
    {
        return view('admin.showall')
            ->with('house', Ikar::where('type', 'house')->count())
            ->with('store', Ikar::where('type', 'store')->count())
            ->with('chalet', Ikar::where('type', 'chalet')->count())
            ->with('user', User::all()->count());
    }
    public function index()
    {
        return view('admin.house.index')
            ->with('house', Ikar::where('type', 'house')->get());
    }
    public function create()
    {
        return view('admin.house.create');
    }
    public function store(StoreRequest $request)
    {
        $user = User::where('phone', $request->phone)->firstOrFail();
        //     // // $photo = $request->img->GetClientOriginalExtension();
        //     // // $file_name = time() . '.' . $photo;
        //     // // $path = 'uploads/house';
        //     // // $request->img->move($path, $file_name);
        $house = Ikar::create([
            'region' => $request->region,
            'address' => $request->address,
            'city' => $request->city,
            'show_type' => $request->type,
            'type' => 'house',
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
            $path = 'uploads/house';
            $request->img->move($path, $file_name);
            $photo = Photo::create([
                'image' => $file_name,
                'ikar_id' => $house->id,
            ]);
        }
        Alert::toast('house added successfuly', 'success');
        return redirect()->back();
    }
    public function show($id)
    {
        $house = Ikar::with('photo')->where('id', $id)->first();
        $rating = Comment::where('ikar_id', $id)->avg('rating');
        return view('admin.house.show')->with('house', $house)->with([
            'rating' => $rating,
            'roundrating' => round($rating, 2),
        ]);
    }
    public function edit($id)
    {
        $house = Ikar::find($id);
        return view('admin.house.edit')->with('house', $house);
    }
    public function update(StoreRequest $request, $id)
    {
        $user = User::where('phone', $request->phone)->firstOrFail();
        $house = Ikar::find($id);
        $house->region = $request->region;
        $house->address = $request->address;
        $house->city = $request->city;
        $house->show_type = $request->type;
        $house->price = $request->price;
        $house->space = $request->space;
        $house->user_id = $user->id;
        $house->room_number = $request->room_number;
        $house->floors_number = $request->floors_number;
        $house->save();
        $photo = $request->img->GetClientOriginalExtension();
        $file_name = time() . '.' . $photo;
        $path = 'uploads/house';
        $request->img->move($path, $file_name);
        $images = Photo::where('ikar_id', $id)->first();
        $images->image = $file_name;
        $images->save();
        Alert::toast('house updated successfuly', 'success');
        return Redirect()->back();
    }




    public function destroy($id)
    {
        $house = Ikar::find($id);
        $destintion = 'upload/house/' . $house->img;
        if (File::exists($destintion)) {
            File::delete($destintion);
        }
        $house->delete();
        Alert::toast('house deleted successfuly', 'success');
        return redirect()->back();
    }
}
