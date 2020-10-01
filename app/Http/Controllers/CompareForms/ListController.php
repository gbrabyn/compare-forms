<?php


namespace App\Http\Controllers\CompareForms;

use App\Model\PersonExperience;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListController extends Controller
{
    public function index()
    {
        return view('compare-forms/list', [
            'people' => PersonExperience::where(['sessionId'=>session()->getId()])->orderBy('fullName', 'asc')->get(),
        ]);
    }
}
