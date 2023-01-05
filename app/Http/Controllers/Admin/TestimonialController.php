<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Models\TestimonialTranslation;
use App\ViewModels\ITestimonialModel;
use App\ViewModels\ITestimonialTranslationModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class TestimonialController extends Controller
{
    private $_testimonialModel;
    private $_testimonialTranslationModel;
    public function __construct(ITestimonialModel $model,ITestimonialTranslationModel $translationModel)
    {
        $this->_testimonialModel = $model;
        $this->_testimonialTranslationModel = $translationModel;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
           return $this->_testimonialModel->getAll($request);
        }
        return view('admin.testimonials.index');
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $this->_testimonialModel->add($request);
        return redirect()->route('admin.testimonials.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');
        $testimonial = $this->_testimonialModel->getById($id);
        $testimonialTranslation = $this->_testimonialTranslationModel->getById($id);
        return view('admin.testimonials.edit',compact('testimonial','testimonialTranslation','locale'));
    }

    public function update(Request $request, $id)
    {
        if(!env('USER_VERIFIED'))
        {
            notify()->error('This feature is disable for demo!');
            return redirect()->route('admin.testimonials.index');
        }else{
            $this->_testimonialModel->update($request,$id);
            $this->_testimonialTranslationModel->update($request,$id);
            notify()->success('Testimonial updated successfully!');
            return redirect()->route('admin.testimonials.index');
        }
    }

    public function destroy($id)
    {
        if(!env('USER_VERIFIED'))
        {
            notify()->error('This feature is disable for demo!');
            return redirect()->route('admin.testimonials.index');
        }else{
            $this->_testimonialModel->delete($id);
            $this->_testimonialTranslationModel->delete($id);
            notify()->success('Testimonial deleted successfully!');
            return redirect()->route('admin.testimonials.index');
        }

    }
}
