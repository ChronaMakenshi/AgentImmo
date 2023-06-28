<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyFormRequest;
use App\Models\Option;
use App\Models\Property;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Property::class, 'property');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.properties.index', [
            'properties' => Property::orderBy('created_at', 'desc')->paginate(8)
//            'properties' => Property::orderBy('created_at', 'desc')->withTrashed()->paginate(8)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prorerty = new Property;
//        $prorerty->fill([
//            'surface' => 45,
//            'rooms' => 2,
//            'bedrooms' => 1,
//            'floors' => 1,
//            'city' => 'Perigueux',
//            'postal_code' => '24000',
//            'sold' => false,
//            ]);
        return view('admin.properties.form', [
            'property' => $prorerty,
            'options' => Option::pluck('name', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request)
    {
        $property = Property::create($this->FileData(new Property(), $request));
        $property->options()->sync($request->validated('options'));
        return to_route('admin.property.index')->with('success', 'Le bien a bien été créé !');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view('admin.properties.form', [
            'property' => $property,
            'options' => Option::pluck('name', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request, Property $property)
    {
        $property->options()->sync($request->validated('options'));
        $property->update($this->FileData($property, $request));
        return to_route('admin.property.index')->with('success', 'Le bien a bien été modifié !');
    }

    private function FileData (Property $property, PropertyFormRequest $request): array
    {
        $data = $request->validated();
        /** @var UploadedFile|null $image */
        $image = $request->validated('image');
        if ($image === null || $image->getError()) {
            return $data;
        }
        if ($property->image)
        {
            Storage::disk('public')->delete($property->image);
        }
        $data['image'] = $image->store('property', 'public');
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return to_route('admin.property.index')->with('danger', 'Le bien a bien été supprimé !');
    }
}
