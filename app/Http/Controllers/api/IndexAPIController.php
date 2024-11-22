<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Indexing;
use Illuminate\Http\Request;

class IndexAPIController extends Controller
{
    public function indexFetch()
    {

        $domainName = env('APP_URL', 'https://panel.indjcst.com/storage');
 
        
        // Fetch the domain name from the app configuration

        $index = Indexing::select(
            'indexing_id', 
            'indexing_name', 
            'indexing_url', 
            'is_active', 
            'is_deleted', 
            'indexing_image_url', 
            'created_at as createdtime', 
            'updated_at as modifiedtime'
        )
        ->where('is_active',1)
        ->get()
        ->map(function ($item) use ($domainName) {
            // Add the domain name to the indexing_image_url
            $item->indexing_image_url = $domainName . '/' . ltrim($item->indexing_image_url, '/');
            return $item;
        });

        return response()->json(["indexingList" => $index], 200);
    }
}
