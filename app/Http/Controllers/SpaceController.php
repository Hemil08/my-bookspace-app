<?php

namespace App\Http\Controllers;

use App\Models\Space;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SpaceController extends Controller
{
    public function index()
    {

        $user = Auth::user();

        if($user->role !== 'owner'){
            abort(403,'Unauthorized access');
        }

        $spaces = Space::with(['user','category'])::where(user_id,$user->id)->get();
        return view('spaces.index')->with('spaces',$spaces);
    }

    public function create(){
        $categories = Category::all();
        return view('spaces.create')->with('categories',$categories);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'price_per_hour' => 'required|numeric',
            'from_date' => 'required|date',
            'to_date' => 'required|date',
        ])

        Space::create($request->all());

        return redirect()->route('space.index');
    }

    public function show(Space $space){
        return view('spaces.show', compact('space'));
    }

    public function edit(Space $space){
        $categories = Category:all();
        return view('spaces.edit',compact('space','categories'));
    }

    public function update(Request $request,Space $space){
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'price_per_hour' => 'required|numeric',
            'from_date' => 'required|date',
            'to_date' => 'required|date',
        ])

        $space->update($request->all());

        return redirect()->route('space.index');
    }

    public function destroy(Space $space){
        $space -> delete();

        return redirect()->route('spaces.index');
    }

}
