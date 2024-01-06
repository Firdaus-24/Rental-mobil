<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TransactionsController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $cars = Cars::all();
    return view('template.pages.mobil.car-list', [
      'cars' => $cars
    ])->render();
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create($id)
  {
    return view('template.pages.sewa.index');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'dateStart'   => 'required',
      'dateEnd'   => 'required',
    ]);
    if ($validator->fails()) {
      return response()->json($validator->errors(), 422);
    }
    DB::beginTransaction();
    try {
      $post = Transactions::create([
        'users_id'   => Auth::user()->id,
        'cars_id'   => $request->carId,
        'tgl_mulai'   => $request->dateStart,
        'tgl_selesai'   => $request->dateEnd,
        'status'   => 'SEWA',
      ]);
      //   dd($request);
      DB::commit();
      return redirect()->back()->with('success', 'Sewa berhasil Ditambahkan!');
      //   return response()->json([
      //     'success' => true,
      //     'message' => 'Mobil Ditambahkan!',
      //     'data'    => $post
      //   ], 201);
    } catch (\Exception $e) {
      DB::rollBack();

      return redirect()->back()->with('error', 'Sewa gagal Ditambahkan!');
      //   return response()->json([
      //     'error' => true,
      //     'message' => 'Mobil Gagal Ditambahkan!',
      //     'data' => $e->getMessage(),
      //   ], 500);
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(Transactions $transactions)
  {
    return view('template.pages.transactions.index');
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Transactions $transactions)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Transactions $transactions)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Transactions $transactions)
  {
    //
  }

  public function getAjax(request $request)
  {
    $column = array('merk', 'model', 'nopol', 'tgl_mulai', 'tgl_selesai', 'status', 'actions');
    $total  = null;
    $boot   = null;
    $limit  = $request->input('length');
    $start  = $request->input('start');
    $order  = $column[$request->input('order.0.column')];
    $dir    = $request->input('order.0.dir');


    $temp = DB::table("transactions as trs")
      ->leftJoin('cars as car', 'car.id', '=', 'trs.cars_id')
      ->select("trs.*", "car.*", "trs.id as actions", "trs.updated_at as trs_update", "trs.id as id")
      ->whereNull('trs.deleted_at');

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

      $temp = DB::table("transactions as trs")
        ->leftJoin('cars as car', 'car.id', '=', 'trs.cars_id')
        ->select("trs.*", "car.*", "trs.id as actions", "trs.id as id")
        ->whereNull('trs.deleted_at');
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
        $obj['tgl_mulai']        =  '<p class="mb-0 text-xs font-weight-bold">' . $die->tgl_mulai . '</p>';
        $obj['tgl_selesai']        =  '<p class="mb-0 text-xs font-weight-bold">' . $die->tgl_selesai . '</p>';

        $obj['status']        =  '<p class="mb-0 text-xs font-weight-bold">' . $die->status . '</p>';

        $obj['actions']     = '<a  class="mx-3" role="button"  data-toggle="modal" onclick="ShowModalEdit(this)" data-id="' . $die->id . '" title="Edit">
              <i class="fas fa-edit text-info" aria-hidden="false"></i>
            </a>
            <a  class="mx-3" role="button" data-id="' . $die->id . '"   onClick="hapus(this)" title="Hapus">
              <i class="fas fa-trash text-danger" aria-hidden="false"></i>
            </a>';


        // $obj['trs_update']        =  $die->trs_update;
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
