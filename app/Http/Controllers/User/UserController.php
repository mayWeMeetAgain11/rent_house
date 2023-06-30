<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ikar;
use App\Models\Photo;
use App\Models\Comment;
use App\Models\Request as Requests;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

use function PHPSTORM_META\type;

class UserController extends Controller
{
    public function rating($id)
    {
        return view('user.rating')->with('rating', Comment::with('user')->where('ikar_id', $id)->latest()->get())->with('ikar_id', $id);
    }
    public function createRating(Request $request)
    {
        $ratingCount = Comment::where([
            'user_id' => Auth::id(),
            'ikar_id' => $request->ikar_id,
        ])->count();
        if (!$request->rating) {
            Alert::toast('add atleast one star for this ihar', 'error');
            return redirect()->back();
        }
        if (!$request->discription) {
            Alert::toast('add comment please', 'error');
            return redirect()->back();
        }
        if ($ratingCount > 0) {
            Alert::toast('your rating already exists', 'error');
            return redirect()->back();
        } else {
            $rating = Comment::create([
                'user_id' => Auth::id(),
                'ikar_id' => $request->ikar_id,
                'rating' => $request->rating,
                'discription' => $request->discription,
            ]);
            Alert::toast('thanks for rating', 'success');
            return redirect()->back();
        }
    }
    public function index()
    {
        return view('user.index')
            ->with("city", Ikar::select('city')->distinct()->get())
            ->with("region", Ikar::select('region')->distinct()->get())
            ->with('house', Ikar::where('type', 'house')->where('status', 'none')->latest()->take(3)->get())
            ->with('store', Ikar::where('type', 'store')->where('status', 'none')->latest()->take(3)->get())
            ->with('chalet', Ikar::where('type', 'chalet')->where('status', 'none')->latest()->take(3)->get());
    }
    public function userIndex()
    {
        return view('user.userindex')
            ->with('ikar', Ikar::where('user_id', Auth::id())->get());
    }
    public function create()
    {
        return view('user.create');
    }
    public function store(StoreUserRequest $request)
    {
        $ikar = Ikar::create([
            'region' => $request->region,
            'address' => $request->address,
            'city' => $request->city,
            'show_type' => $request->type,
            'type' => $request->ikar_type,
            'price' => $request->price,
            'space' => $request->space,
            'user_id' => Auth::id(),
            // 'phone' => Auth::user()->phone,
            'floors_number' => $request->floors_number,
            'room_number' => $request->room_number,
            'status' => 'none',
        ]);
        if ($request->img) {
            $photo = $request->img->GetClientOriginalExtension();
            $file_name = time() . '.' . $photo;
            $path = 'uploads/' . $request->ikar_type;
            $request->img->move($path, $file_name);
            $photo = Photo::create([
                'image' => $file_name,
                'ikar_id' => $ikar->id,
            ]);
        }
        Alert::toast('ikar added successflly', 'success');
        return redirect()->back();
    }
    public function show($id)
    {
        $ikar = Ikar::with('photo')->where('id', $id)->first();
        $rating = Comment::where('ikar_id', $id)->avg('rating');
        return view('user.show')->with('ikar', $ikar)->with([
            'rating' => $rating,
            'roundrating' => round($rating, 2),
        ]);
    }
    public function edit($id)
    {
        $ikar = Ikar::find($id);
        if (Auth::id() == $ikar->user_id) {
            return view('user.edit')->with('ikar', $ikar);
        }
        return abort(403);
    }
    public function update(UpdateUserRequest $request, $id)
    {
        $ikar = Ikar::find($id);
        if (Auth::id() === $ikar->user_id) {
            $ikar->region = $request->region;
            $ikar->address = $request->address;
            $ikar->city = $request->city;
            $ikar->show_type = $request->type;
            $ikar->price = $request->price;
            $ikar->space = $request->space;
            $ikar->user_id = Auth::id();
            $ikar->room_number = $request->room_number;
            $ikar->floors_number = $request->floors_number;
            $ikar->save();
            if ($request->img) {
                $photo = $request->img->GetClientOriginalExtension();
                $file_name = time() . '.' . $photo;
                $path = 'uploads/' . $ikar->type;
                $request->img->move($path, $file_name);
                $images = Photo::where('ikar_id', $ikar->id)->first();
                $images->image = $file_name;
                $images->save();
            }
            Alert::toast('ikar updated successflly', 'success');
            return redirect()->back();
        }
        return abort(403);
    }

    public function destroy($id)
    {
        $ikar = Ikar::find($id);
        if (Auth::id() === $ikar->user_id) {
            $destintion = 'upload/chalet/' . $ikar->img;
            if (File::exists($destintion)) {
                File::delete($destintion);
            }
            $ikar->delete();
            Alert::toast('ikar deleted successflly', 'success');
            return redirect()->back();
        }
        return abort(403);
    }
    public function createRequest($id)
    {
        return view('user.request')->with('ikar', Ikar::find($id));
    }
    public function storeRequest(Request $request)
    {
        $ratingCount = Requests::where([
            'user_id' => Auth::id(),
            'ikar_id' => $request->ikar_id,
        ])->count();
        if ($ratingCount > 0) {
            Alert::toast('your request already exists', 'error');
            return redirect()->back();
        } elseif (Auth::id() == $request->owner_id) {
            Alert::toast('the house is yours', 'error');
            return redirect()->back();
        } else {
            $order = Requests::create([
                'user_id' => Auth::id(),
                'owner_id' => $request->owner_id,
                'ikar_id' => $request->ikar_id,
                'last_date' => $request->last_date,
                'status' => "idle",
            ]);
            Alert::toast('request sent successflly', 'success');
            return redirect()->back();
        }
    }
    public function showAllRequest()
    {
        return view('user.showrequest')->with('request', Requests::where('owner_id', Auth::id())->where('status', 'idle')->get());
    }
    public function deal($id)
    {
        $order = Requests::find($id);
        $order->status = 'accepted';
        $order->ikar->status = 'unavailable';
        $order->ikar->save();
        $order->save();
        return redirect()->back();
    }
    public function deleteRequest($id)
    {
        $request = Requests::find($id);
        if (Auth::id() == $request->owner_id) {
            $request->delete();
            Alert::toast('request deleted successflly', 'success');
        } else {
            return abort(403);
        }
    }
    public function showAllIkars()
    {
        return view('user.ikars')->with('ikar', Ikar::with('photo')->where('status', 'none')->get());
    }
    public function search(Request $request)
    {
        $validation = $request->validate([
            'city' => 'string|required',
            'region' => 'string|required',
        ]);
        if ($request->max && $request->city && $request->region && $request->type && $request->property) {
            $result = Ikar::where([
                'city' => $request->city,
                'region' => $request->region,
                'type' => $request->type,
                'show_type' => $request->property,
            ])
                ->whereBetween('price', [$request->min || 0, $request->max])->get();
        } elseif ($request->city && $request->region && $request->type && $request->max) {
            $result = Ikar::where([
                'city' => $request->city,
                'region' => $request->region,
                'type' => $request->type,
            ])
                ->whereBetween('price', [$request->min || 0, $request->max])->get();
        } elseif ($request->city && $request->region && $request->property && $request->max) {
            $result = Ikar::where([
                'city' => $request->city,
                'region' => $request->region,
                'show_type' => $request->property,
            ])
                ->whereBetween('price', [$request->min || 0, $request->max])->get();
        } elseif ($request->city && $request->region && $request->property) {
            $result = Ikar::where([
                'city' => $request->city,
                'region' => $request->region,
                'show_type' => $request->property,
            ])->get();
        } elseif ($request->city && $request->region && $request->type) {
            $result = Ikar::where([
                'city' => $request->city,
                'region' => $request->region,
                'type' => $request->type,
            ])->get();
        } elseif ($request->city && $request->region && $request->max) {
            $result = Ikar::where([
                'city' => $request->city,
                'region' => $request->region,
            ])
                ->whereBetween('price', [$request->min || 0, $request->max])->get();
        } elseif ($request->city && $request->region) {
            $result = Ikar::where([
                'city' => $request->city,
                'region' => $request->region,
            ])->get();
        }
        return view('user.search')->with('result', $result);
    }
}
