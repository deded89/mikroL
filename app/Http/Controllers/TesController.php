<?php

namespace App\Http\Controllers;

use App\Cabang;
use Illuminate\Http\Request;
use DataTables;


class TesController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Cabang::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Tutup" class="btn btn-danger btn-sm tutupCabang">Tutup</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('tes');
    }

    public function store(Request $request)
    {
        Cabang::Create(

            ['nama_cabang' => $request->nama_cabang, 'is_open' => true]
        );
        return response()->json(['success' => 'Cabang saved successfully.']);
    }

    public function update(Request $request, $id)
    {
        $cabang = Cabang::find($id);
        $cabang->update(['nama_cabang' => $request->nama_cabang, 'is_open' => true]);
        return response()->json(['success' => 'Cabang saved successfully.']);
    }

    public function edit($id)
    {
        $cabang = Cabang::find($id);
        return response()->json($cabang);
    }

    public function destroy($id)
    {
        Cabang::find($id)->delete();
        return response()->json(['success' => 'Cabang deleted successfully.']);
    }
}
