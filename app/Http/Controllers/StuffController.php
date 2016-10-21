<?php

namespace App\Http\Controllers;

use App\Category;
use App\Stuff;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class StuffController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //here we will show all stuff
        $stuffs = Stuff::orderBy('id', 'desc')->paginate(5);
        return view("stuff.index")->with('stuffs', $stuffs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //here we will show the create form stuff
        $categories = Category::all();
        $tags = Tag::All();
        return view("stuff.create")->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        //validate the user input
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|integer'
        ]);
        //here we will actually create stuff
        $stuff = new Stuff;
        $stuff->fill($request->all());
        $user = Auth::user();
        $user->stuff()->save($stuff);
        $stuff->tags()->sync($request->tags, false);

//        if (!empty(Auth::user()->id)) {
////            $stuff->user_id = Auth::user()->id;
//            $stuff->user = Auth::user();
//        }

        Session::flash('success', 'The stuff has been saved successfully');
        return redirect()->action(
            'StuffController@show', ['id' => $stuff->id]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        //show the stuff
        $stuff = Stuff::findorfail($id);
//        $dt = Carbon::createFromDate($stuff->created_at);
//        $mes=$dt->diffForHumans(Carbon::now());

        return view('stuff.show')->with(["stuff" => $stuff,
//        'mes'=>$mes
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = Auth::user();
        //Edit the stuff
        $stuff = Stuff::findorfail($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('stuff.edit')->with(["stuff" => $stuff, "tags" => $tags])
            ->withCategories($categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate the user input
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|integer'
        ]);

        $stuff = Stuff::findorfail($id);
        $stuff->fill($request->toArray());
//        $stuff->tags()->sync($request->tags, false);
        $stuff->save();
        $stuff->tags()->sync(isset($request->tags) ? $request->tags : [], true);
        Session::flash('success', 'update successfully');
        return redirect()->action(
            'StuffController@show', ['id' => $stuff->id]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete the stuff
        Stuff::destroy($id);
        Session:
        flash('success', 'stuff deleted successfully');
        return redirect()->route('stuff.index');

    }
}
