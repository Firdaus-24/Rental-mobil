<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Number;

class CarsController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('template.pages.mobil.index');
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'merk'   => 'required',
      'model'   => 'required',
      'nopol'   => 'required',
      'tarif'   => 'required',
    ]);
    if ($validator->fails()) {
      return response()->json($validator->errors(), 422);
    }
    DB::beginTransaction();
    $cleanNopol = preg_replace('/[^A-Za-z0-9]/', '', $request->nopol);
    try {
      $post = Cars::create([
        'merk'   => strtoupper($request->merk),
        'model'   => strtoupper($request->model),
        'nopol'   => strtoupper($cleanNopol),
        'tarif'   => $request->tarif,
      ]);
      DB::commit();
      return response()->json([
        'success' => true,
        'message' => 'Mobil Ditambahkan!',
        'data'    => $post
      ], 201);
    } catch (\Exception $e) {
      DB::rollBack();

      return response()->json([
        'error' => true,
        'message' => 'Mobil Gagal Ditambahkan!',
        'data' => $e->getMessage(),
      ], 500);
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(Cars $cars)
  {
    return response()->json($cars);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Cars $cars)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Cars $cars)
  {
    $validator = Validator::make($request->all(), [
      'merk'   => 'required',
      'model'   => 'required',
      'nopol'   => 'required',
      'tarif'   => 'required',
    ]);

    if ($validator->fails()) {
      return response()->json($validator->errors(), 422);
    }
    DB::beginTransaction();
    $cleanNopol = preg_replace('/[^A-Za-z0-9]/', '', $request->nopol);
    try {
      $cars->merk = strtoupper($request->merk);
      $cars->model = strtoupper($request->model);
      $cars->nopol = strtoupper($cleanNopol);
      $cars->tarif = $request->tarif;
      $cars->save();


      DB::commit();

      return response()->json([
        'success' => true,
        'message' => 'Mobil Diubah!',
      ], 200);
    } catch (\Exception $e) {
      DB::rollBack();
      return response()->json([
        'error' => true,
        'message' => 'Mobil Gagal Diubah!',
        'data' => $e->getMessage(),
      ], 500);
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Cars $cars)
  {
    DB::beginTransaction();
    try {
      $delete = $cars->delete();
      DB::commit();
      return response()->json(
        [
          'success' => true,
          'message' => 'Mobil Dihapus!',
          'data'    => $delete
        ]
      );
    } catch (\Exception $e) {
      DB::rollBack();
      return response()->json([
        'error' => true,
        'message' => 'Mobil Gagal Dihapus!',
        'data' => $e->getMessage(),
      ], 500);
    }
  }
  public function getAjax(request $request)
  {
    $column = array('merk', 'model', 'nopol', 'tarif', 'actions', 'updated_at');
    $total  = null;
    $boot   = null;
    $limit  = $request->input('length');
    $start  = $request->input('start');
    $order  = $column[$request->input('order.0.column')];
    $dir    = $request->input('order.0.dir');


    $temp = DB::table("cars as car")
      ->select("car.*", "car.id as actions", "car.id as id")
      ->whereNull('car.deleted_at');

    $total = $temp->count();
    $totalFiltered = $total;

    if (empty($request->input('search.value'))) {
      $boot = $temp->offset($start)
        ->orderBy($order, $dir)
        ->limit($limit)
        ->get();
    } else {
      $search = $request->input('search.value');
      $boot = $temp->whereRaw("(LOWER(car.merk) LIKE '%" . $search . "%' OR LOWER(car.model) LIKE '%" . $search . "%' OR LOWER(car.nopol) LIKE '%" . $search . "%' OR LOWER(car.tarif) LIKE '%" . $search . "%')")

        ->offset($start)
        ->orderBy($order, $dir)
        ->limit($limit)
        ->get();

      $temp = DB::table("cars as car")
        ->select("car.*", "car.id as actions", "car.id as id")
        ->whereNull('car.deleted_at');
      $totalFiltered =  $temp->whereRaw("(LOWER(car.merk) LIKE '%" . $search . "%' OR LOWER(car.model) LIKE '%" . $search . "%' OR LOWER(car.nopol) LIKE '%" . $search . "%' OR LOWER(car.tarif) LIKE '%" . $search . "%')")
        ->get()
        ->count();
    }
    $data = array();
    if (!empty($boot)) {
      foreach ($boot as $key => $die) {
        $obj = array();

        // $obj['no']          = $start + $key + 1;
        $obj['merk']        =  '<p class="mb-0 text-xs font-weight-bold">' . $die->merk . '</p>';
        $obj['model']        =  '<p class="mb-0 text-xs font-weight-bold">' . $die->model . '</p>';
        $obj['nopol']        =  '<p class="mb-0 text-xs font-weight-bold">' . $die->nopol . '</p>';
        $obj['tarif']        =  '<p class="mb-0 text-xs font-weight-bold">' . $die->tarif . '</p>';
        $role = Auth::user()->role;

        $obj['actions']     = '<a  class="mx-3" role="button"  data-toggle="modal" onclick="ShowModalEdit(this)" data-id="' . $die->id . '" title="Edit">
              <i class="fas fa-edit text-info" aria-hidden="false"></i>
            </a>
            <a  class="mx-3" role="button" data-id="' . $die->id . '"   onClick="hapus(this)" title="Hapus">
              <i class="fas fa-trash text-danger" aria-hidden="false"></i>
            </a>';


        $obj['updated_at']        =  $die->updated_at;
        $data[]   = $obj;
      }
    }
    $json_data = array(
      "draw"            => intval($request->input('draw')),
      "recordsTotal"    => intval($total),
      "recordsFiltered" => intval($totalFiltered),
      "data"            => $data
    );

    echo json_encode($json_data);
  }
}
