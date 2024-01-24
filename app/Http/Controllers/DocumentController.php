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
                $document->title = $document->title_fr;
                $document->content = $document->content_fr;
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
            'title' => 'required',
            'title_fr' => 'required',
        ]);

        $documentPath = $request->file('document')->store('documents', 'public');
        Document::create([
            'title' => $request->title,
            'title_fr' => $request->title_fr,
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
