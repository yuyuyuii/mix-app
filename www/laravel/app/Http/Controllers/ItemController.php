<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ItemRequest;

use App\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = Item::nameFilter($request->name)
                ->orderby('created_at', 'desc')
                ->paginate(3)
                ->appends($request->all);//ページネーションでも検索結果をひきつぐ 
                // ->get();
      // $query = Item::query();
      // if(isset($request->name)){
      //   $query->where('name', 'like', '%'.$request->name.'%');
      // }
      // $items = $query->orderby('created_at', 'desc')->get();
      
      return view('items.index')->with('items', $items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
    {
      $item = new Item();

      $item->name = $request->name;
      $item->age = $request->age;
      $item->sex = $request->sex;
      $item->memo = $request->memo;
      $item->save();
      return redirect()->action('ItemController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $item = Item::findOrFail($id);
        return view('items.show')->with('item', $item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::findOrFail($id);
        return view('items.edit')->with('item', $item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ItemRequest $request, $id)
    {
        $item = Item::findOrFail($id);
        $item->fill($request->all()->save());
        return redirect()->route('show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Item  $item
     * @return \Illuminate\Http\Response
     */
    public function delete(Item $item)
    {
        return view('items.delete')->with('item', $item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('index');
    }
}
