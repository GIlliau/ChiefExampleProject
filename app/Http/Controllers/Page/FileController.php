<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\UserAction;
use App\Traits\ActionTracker;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    use ActionTracker;

    public function index()
    {
        return view('pages.file');
    }

    public function download()
    {
        $file= public_path(). "/download/cow_doc/5PHG9WUjKc9hxQLh.exe";

        $headers = array(
            'Content-Type: application/exe',
        );

        $this->recordAction(Auth::id(), UserAction::ACTION_DOWNLOAD_FILE, 'cow_doc.exe');

        return response()->download($file, 'cow_doc.exe', $headers);
    }
}
