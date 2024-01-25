<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class DocumentController extends Controller
{
    public function index()
    {
        $locale = App::getLocale();
        $documents = Document::latest()->paginate(8);
        if ($locale == 'fr') {
            foreach ($documents as $document) {
                $document->doc_title = $document->doc_title_fr;
            }
        }

        return view('documents.index', compact('documents'));
    }

    public function create()
    {
        return view('documents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'doc_title' => 'required',
            'doc_title_fr' => 'required',
            'document' => 'required|mimes:pdf,doc,docx,txt,jpg,png|max:2048'
        ]);

        $documentPath = $request->file('document')->store('documents', 'public');
        Document::create([
            'doc_title' => $request->doc_title,
            'doc_title_fr' => $request->doc_title_fr,
            'doc_url' => $documentPath,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('documents.index')->with('success', 'Document uploaded successfully');
    }

    public function destroy($id)
    {
        try {
            $document = Document::findOrFail($id);
            $document->delete();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('documents.index')->with('error', 'Document not found');
        }

        return redirect()->route('documents.index');
    }
}
