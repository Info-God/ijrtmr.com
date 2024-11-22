<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Editorial_board;
use Illuminate\Http\Request;

class EditorialController extends Controller
{
    public function editorialFetch()
    {

        $domainName = env('APP_URL', 'https://panel.indjcst.com/storage');

        $index = Editorial_board::select('*')
        ->get()
        ->map(function ($item) use ($domainName) {
            // Add the domain name to the indexing_image_url
            $item->member_image_url = $domainName . '/' . ltrim($item->member_image_url, '/');
            return $item;
        });;
        return response()->json(["membersList" => $index], 200);
    }
}
