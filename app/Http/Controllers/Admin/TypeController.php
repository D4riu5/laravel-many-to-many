<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

// Models
use App\Models\Type;
use App\Models\Project;

// Requests
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;

// Helpers
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();
        
        return view('admin.types.index', [
            "types" => $types
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeRequest $request)
    {
        $data = $request->validated();

        $data['slug'] = Str::slug($data['name']);

        $newType = Type::create($data);

        return redirect()->route('admin.types.show', $newType->id)->with('success', 'Type created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        return view('admin.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTypeRequest  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
       $data = $request->validated();

       $data['slug'] = Str::slug($data['name']);
       $type->update($data);

       return redirect()->route('admin.types.show', $type->id)->with('success', 'Type updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        // remove foreign key from projects and update it to null
        // DB::table('projects')
        //     ->where('type_id', $type->id)
        //     ->update(['type_id' => null]);

        // Alternative
        Project::where('type_id', $type->id)->update(['type_id' => null]);

        $type->delete();

        return redirect()->route('admin.types.index', $type->id)->with('success', 'Type deleted successfully!');
    }
}
