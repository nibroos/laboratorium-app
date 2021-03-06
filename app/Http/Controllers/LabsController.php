<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use App\Models\Place;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\UpdateLabRequest;
use Symfony\Component\HttpFoundation\Response;

class LabsController extends Controller
{
  public function index()
  {
    abort_if(Gate::denies('lab_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    $labs = Lab::all();
    $data = [
      'title' => 'Item List'
    ];

    return view('labs.index', compact('labs', 'data'));
  }

  public function create()
  {
    abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    $places = Place::all();
    $backurl = htmlspecialchars($_SERVER['HTTP_REFERER']);
    $data = [
      'title' => 'New Item'
    ];

    return view('labs.create', compact('places', 'backurl', 'data'));
  }

  public function store(Request $request)
  {
    abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    // Lab::create($request->validated());
    $places = Place::all();
    $item_quantity = $request->item_quantity;
    $item_value = $request->item_value;
    $item_total = $item_quantity * $item_value;
    Lab::create([
      'item_name' => $request->item_name,
      'item_desc' => $request->item_desc,
      'item_quantity' => $item_quantity,
      'item_value' => $item_value,
      'item_total' => $item_total,
      'place_id' => $request->place_id,
      'slug' => Str::slug($request->item_name, '-')
    ]);
    return redirect()->route('places.index', compact('places', 'item_quantity', 'item_value', 'item_total'));
  }

  public function show($slug)
  {
    abort_if(Gate::denies('lab_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    $lab = Lab::where('slug', $slug)->first();
    $backurl = htmlspecialchars($_SERVER['HTTP_REFERER']);
    $data = [
      'title' => $lab['item_name'] . "'s Info"
    ];

    return view('labs.show', compact('lab', 'slug', 'backurl', 'data'));
  }

  public function edit($slug)
  {
    abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    $lab = Lab::where('slug', $slug)->first();
    $backurl = htmlspecialchars($_SERVER['HTTP_REFERER']);
    $places = Place::all();
    $data = [
      'title' => 'Edit Item'
    ];

    return view('labs.edit', compact('lab', 'backurl', 'places', 'slug', 'data'));
  }

  public function update(UpdateLabRequest $request, Lab $lab)
  {
    $lab->update($request->validated());
    $lab->update([
      'item_name' => $request->item_name,
      'item_desc' => $request->item_desc,
      'item_quantity' => $request->item_quantity,
      'item_value' => $request->item_value,
      'item_error' => $request->item_error,
      'item_total' => ($request->item_quantity) * ($request->item_value),
    ]);

    return redirect()->route('places.index');
  }

  public function destroy(Lab $lab)
  {
    abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    $lab->delete();
    $backurl = htmlspecialchars($_SERVER['HTTP_REFERER']);

    return redirect()->route('places.index');
  }
}
