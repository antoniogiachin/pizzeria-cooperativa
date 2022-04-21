<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pizza;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pizzas = Pizza::all();

        return view('admin.pizzas.index', compact('pizzas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pizzas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
            $request->validate(
                [
                    'name' => 'required|min:1',
                    'price' => 'required|min:1',
                    'imageFile'=> 'nullable|image|max:4096',
                ]
            );

            $data = $request->all();

            $slug = Str::slug($data['name']);

            $counter = 1;

            while(Pizza::where('slug', $slug)->first()){
                $slug = Str::slug($data['name']) . '-' . $counter;
                $counter++;

            }

            $data['slug'] = $slug;

            // storage immagine
            if(isset($data['imageFile'])){
                $image_path = Storage::put('uploads', $data['imageFile']);
                $data['image'] = $image_path;
            }

            $pizza = new Pizza();

            $pizza->fill($data);

            $pizza->save();

            return redirect()->route('admin.pizzas.index', ['pizza' => $pizza->id])->with('status', 'pizza added successfully');


        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pizza $pizza)
    {
        return view('admin.pizzas.show', compact('pizza'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pizza = Pizza::find($id);

        if ($pizza) {
            return view('admin.pizzas.edit', compact('pizza'));
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pizza $pizza)
    {
        $request->validate(
            [
                'name' => 'required|min:1',
                'price' => 'required|min:1',
                'imageFile' => 'nullable|image|max:4096',
            ]
        );

        $data = $request->all();

            $slug = Str::slug($data['name']);

            $counter = 1;

            while(Pizza::where('slug', $slug)->first()){
                $slug = Str::slug($data['name']) . '-' . $counter;
                $counter++;

            }

        // storage immagine
        if (isset($data['imageFile'])) {

            if ($pizza->image) {
                Storage::delete($pizza->image);
            }

            $image_path = Storage::put('uploads', $data['imageFile']);
            $data['image'] = $image_path;
        }



        $data['slug'] = $slug;
        $pizza->update($data);
        $pizza->save();

        return redirect()->route('admin.pizzas.index', ['pizza' => $pizza->id])->with('status', 'pizza edit successfully');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pizza $pizza) {

        if ($pizza->image) {
            Storage::delete($pizza->image);
        }

        $pizza->delete();

        return redirect()->route('admin.pizzas.index');
    }

}
