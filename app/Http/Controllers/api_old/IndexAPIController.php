<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Indexing;
use Illuminate\Http\Request;

class IndexAPIController extends Controller
{
    public function indexFetch()
    {
        $index = Indexing::select('indexing_id', 'indexing_name', 'indexing_url', 'is_active', 'is_deleted', 'indexing_image_url', 'created_at as createdtime', 'updated_at as modifiedtime')->get();
        return response()->json(["indexingList" => $index], 200);
    }
}
