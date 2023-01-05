<?php

namespace JoeDixon\Translation\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use JoeDixon\Translation\Drivers\Translation;
use JoeDixon\Translation\Http\Requests\LanguageRequest;

class LanguageController extends Controller
{
    private $translation;

    public function __construct(Translation $translation)
    {
        $this->translation = $translation;
    }

    public function index(Request $request)
    {
       // $languages = $this->translation->allLanguages();
        $languages =  Language::orderBy('name','ASC')->get();
        return view('translation::languages.index', compact('languages'));
    }

    public function create()
    {
        return view('translation::languages.create');
    }

    public function store(LanguageRequest $request)
    {

        $language = new Language();
        $language->name = htmlspecialchars($request->name);
        $language->locale = strtolower(htmlspecialchars(trim($request->locale)));

        if (empty($request->default)) {
            $language->default   = 0;
        }
        else {
            Language::where('default', '=', 1)->update(['default' => 0]);
            $language->default= $request->default;
        }

        $language->save();

        $this->translation->addLanguage($request->locale, $request->name);

        notify()->success('Language created!');
        return redirect()
            ->route('languages.index')
            ->with('success', __('translation::translation.language_added'));
    }
}
