<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use App\Models\Archives;
use Illuminate\Http\Request;

class ArchivesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $archives = Archives::paginate(5);
        return view('archives.archives', compact('archives'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('archives.archives_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //  paper_title,
        //  paper_abstract,
        //  issue,
        //  volume,
        //  paper_month,
        //  paper_author,
        //  year,
        //  paper_url,
        //  paper_doi,
        // paper_articletype,
        //  paper_pages,

        $request->validate([
            'paper_title' => 'required',
            'paper_abstract' => 'required',
            'issue' => 'required',
            'volume' => 'required',
            'paper_month' => 'required',
            'paper_author' => 'required',
            'year' => 'required',
            'paper_doi' => 'required',
            'paper_articletype' => 'required',
            'paper_pages' => 'required',
            'paper_url' => 'required|file|mimes:pdf,png,jpg,jpeg,gif|max:20480',

        ]);


        $image = null;
        if ($request->hasFile('paper_url')) {
            $file = $request->file('paper_url');
    
            // Generate a file name using the paper title
            $fileName = Str::slug($request->paper_title, '_') . '.' . $file->getClientOriginalExtension();
    
            // Store the file in the 'uploads/archives' directory
            $filePath = $file->storeAs('archives', $fileName, 'public');
    
            // Update the file path in the database
            $image = $filePath;
        }

        $record = Archives::create([
            "paper_title" => $request->paper_title,
            "paper_abstract" => $request->paper_abstract,
            "issue" => $request->issue,
            "volume" => $request->volume,
            "paper_month" => $request->paper_month,
            "paper_author" => $request->paper_author,
            "year" => $request->year,
            "paper_doi" => $request->paper_doi,
            "paper_articletype" => $request->paper_articletype,
            "paper_pages" => $request->paper_pages,
            "paper_url" => $image

        ]);

        return redirect()->route("archives-home")->withSuccess("Archives Created Successfully!");
    }

    /**
     * Display the specified resource.
     */
    // public function download(string $id)
    // {
    //     // Find the archive record by ID
    //     $arc = Archives::find($id);
    
    //     // Check if the record exists
    //     if (!$arc) {
    //         return response()->json(["error" => "Record not found!"], 404);
    //     }
    
    //     // Check if the file path exists
    //     $filepath = storage_path("app/public/" . $arc->paper_url);
    //     if (!file_exists($filepath)) {
    //         return response()->json(["error" => "The File Not Found!"], 404);
    //     }
    
    //     // Sanitize the file name for download
    //     $filename = preg_replace('/[^A-Za-z0-9_\-]/', '_', $arc->paper_title) . ".pdf";
    
    //     // Return the file for download
    //     return response()->download($filepath, $filename);
    // }


    public function viewPDF(string $id)
    {
        // Find the archive record by ID
        $arc = Archives::find($id);
    
        // Check if the record exists
        if (!$arc) {
            return response()->json(["error" => "Record not found!"], 404);
        }
    
        // Generate the public URL for the file
        $fileUrl = asset('storage/' . $arc->paper_url);
    
        // Redirect the user to the file URL
        return redirect($fileUrl);
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $archives = Archives::find($id);
        return view('archives.archives_edit', compact('archives'));
    }

    /**
     * Update the specified resource in storage.
     */
        public function update(Request $request, string $id)
        {
        
            // Find the record
            $record = Archives::find($id);
        
            if (!$record) {
                return redirect()->route("archives-home")->withError("Archives not found!");
            }
         
            // Validate the incoming request
            $request->validate([
                'paper_title' => 'required|string|max:255',
                'paper_abstract' => 'required|string',
                'issue' => 'required|string',
                'volume' => 'required|integer',
                'paper_month' => 'required|string',
                'paper_author' => 'required|string|max:255',
                'year' => 'required|integer',
                'paper_doi' => 'nullable|string|max:255',
                'paper_articletype' => 'nullable|string|max:255',
                'paper_pages' => 'nullable|string|max:255',
                'paper_url' => 'nullable|mimes:pdf|max:5120' // PDF, max size 5MB
            ]);
        
            // Handle file upload
            if ($request->hasFile('paper_url')) {
                $file = $request->file('paper_url');
        
                // Generate a file name using the paper title
                $fileName = Str::slug($request->paper_title, '_') . '.' . $file->getClientOriginalExtension();
        
                // Store the file in the 'uploads/archives' directory
                $filePath = $file->storeAs('archives', $fileName, 'public');
        
                // Update the file path in the database
                $record->paper_url = $filePath;
            }
        
            // Update other fields
            $record->update([
                "paper_title" => $request->paper_title,
                "paper_abstract" => $request->paper_abstract,
                "issue" => $request->issue,
                "volume" => $request->volume,
                "paper_month" => $request->paper_month,
                "paper_author" => $request->paper_author,
                "year" => $request->year,
                "paper_doi" => $request->paper_doi,
                "paper_articletype" => $request->paper_articletype,
                "paper_pages" => $request->paper_pages,
            ]);
        
            return redirect()->route("archives-home")->withSuccess("Archives Successfully Updated!");
        }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $edit = Archives::where("paper_id", $id)->delete();
        return redirect()->route('archives-home')->withSuccess("Successfully deleted!");
    }
}
