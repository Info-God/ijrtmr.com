<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Archives;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArchiveAPIController extends Controller
{
    public function archiveUnique()
    {
        $data = Archives::select("year", "volume", "issue")->distinct()->get();

        if (!$data) {
            return response()->json([
                'message' => 'Data Not Found!'
            ], 404);
        }

        return response()->json($data, 200);
    }

    public function archiveFetch(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'year' => 'required',
            'volume' => 'required',
            'issue' => 'required'
        ]);

        if ($validate->fails()) {
            return response()->json(['errors' => $validate->errors()], 404);
        }

        $data = Archives::where("year", $request->year)->where("volume", $request->volume)->where("issue", $request->issue)->get();

        if (!$data) {
            return response()->json([
                'message' => 'Data Not Found!'
            ], 404);
        }

        return response()->json($data, 200);
    }

    public function archiveGet(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'paper_id' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json(['errors' => $validate->errors()], 404);
        }

        $data = Archives::where("paper_id", $request->paper_id)->get();

        if (!$data) {
            return response()->json([
                'message' => 'Data Not Found!'
            ], 404);
        }

        return response()->json($data, 200);
    }
}
