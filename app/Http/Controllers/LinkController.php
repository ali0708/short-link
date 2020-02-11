<?php

namespace App\Http\Controllers;

use App\Link;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LinkController extends Controller
{
    public function index()
    {
        $id = auth()->id();

        if (User::isUser($id)){
            $links = auth()->user()->link;
            return view('links.lists',['links'=>$links]);
        }else{
            $links = Link::all();
            return view('links.lists',['links'=>$links]);

        }
    }

    public function delete($id)
    {
        $link = Link::findOrFail($id);
        if (auth()->user()->can('delete',$link)){
            $link->delete();
            return redirect()->back();
        }
        return abort(403);

    }

    public function edit(Request $id)
    {
        $links = Link::findOrFail($id);

        if (auth()->user()->can('edit' , Link::class)){
            return view('links.edit',compact('links'));
        }
        return abort(403);
    }

    public function checkEdit(Request $request,$id)
    {
        $link = Link::findOrFail($id);
        if (auth()->user()->can('edit' , Link::class)){
            $this->validate($request,[
                'url' => 'required|url'
            ]);
            $link->url = $request->url;
            $link->save();
            return redirect()->route('links');
        }
        return abort(403);

    }

    public function create()
    {
        if (auth()->user()->can('create',Link::class)){
            return view('links.create');
        }else{
            return abort(403);
        }

    }

    public function checkCreate(Request $request)
    {
        if (auth()->user()->can('create',Link::class)){
            Link::createlink($request);
            return redirect(route('links'));
        }else{
            return abort(403);
        }
    }

    public function changeCondition($id)
    {
        $link = Link::findOrFail($id);
        $link->Condition = !$link->Condition;
        $link->save();

        return redirect(route('links'));
    }

    public function show($slug)
    {
        $link = Link::where('slug',$slug)->first();
        return redirect($link->url);
    }
}
