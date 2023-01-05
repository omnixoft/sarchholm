<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use JoeDixon\Translation\Drivers\Translation;

class LanguageController extends Controller
{
    private $translation;

    public function __construct(Translation $translation)
    {
        $this->translation = $translation;
    }

    public function defaultChange($id)
    {
        $language = Language::find($id);

        Session::put('currentLocal', $language->local);
        App::setLocale($language->local);

        session()->flash('type','success');
        session()->flash('message','Language Changed Successfully');
        return redirect()->back();
    }

    public function deleteLanguage(Request $request)
    {
        // return response()->json($request->langVal);
        Language::where('locale',$request->langVal)->delete();
        unlink('resources/lang/'.$request->langVal.".json");
        // return response()->json($request->langVal.".json");
        File::deleteDirectory('resources/lang/'.$request->langVal);
        return response()->json('successfully deleted!');
    }

    public function update(Request $request)
    {
        if ($request->get('group')) {
            $this->translation->addGroupTranslation($request->language, $request->get('group'), $request->get('key'), $request->get('value'));
        } else {
            $this->translation->addSingleTranslation($request->language, $request->get('group'), $request->get('key'), $request->get('value'));
        }

        return response()->json('ok');
    }
}
