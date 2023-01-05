<?php
namespace App\ViewModels;

use App\Services\CityService;
use App\Services\TestimonialService;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

use Yajra\DataTables\DataTables;

class TestimonialModel implements ITestimonialModel
{
    use ImageUpload;
    private $_testimonialService;
    public function __construct(TestimonialService $service)
    {
        $this->_testimonialService = $service;
    }

    public function getAll(Request $request)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale = Session::get('currentLocal');
        $data = $this->_testimonialService->getAll();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('name', function ($row) use ($locale)
            {
                return $row->testimonialTranslation->name ?? $row->testimonialTranslationEnglish->name ?? null;
            })
            ->addColumn('address', function ($row) use ($locale)
            {
                return $row->testimonialTranslation->address ?? $row->testimonialTranslationEnglish->address ?? null;
            })
            ->addColumn('description', function ($row) use ($locale)
            {
                return $row->testimonialTranslation->description ?? $row->testimonialTranslationEnglish->description ?? null;
            })
            ->addColumn('action1',function($row){
                if($row->status == 'approved')
                {
                    $but =  '<span class="bg-primary p-1 text-white">Approved</span>';
                    return $but;
                }elseif($row->status == 'pending'){
                    $but = '<span class="bg-warning p-1 text-white">Pending</span>';
                    return $but;
                }else{
                    $but = '<span class="bg-danger p-1 text-white">Rejected</span>';
                    return $but;
                }
            })
            ->addColumn('action', function($row){
                $actionBtn = '<div class="d-flex justify-content-end">
                    <a href="'.route('admin.testimonials.edit',$row).'" class="edit btn btn-info btn-sm"><i class="la la-edit"></i></a> 

                 | <form action="'.route('admin.testimonials.destroy',$row).'" method="POST">
                    '.csrf_field().'
                    '.method_field("DELETE").'
               <button class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')"><i class="la la-trash"></i></button>
                </form></div>';
                return $actionBtn;
            })
            ->rawColumns(['action','action1'])
            ->make(true);
    }

    public function getById($id)
    {
        return $this->_testimonialService->getById($id);
    }

    public function add(Request $request)
    {
        App::setLocale(Session::get('currentLocal'));
        request()->validate([
            'name' => 'required|min:5',
            'address'=> 'nullable',
            'file'=>'nullable',
            'description'=> 'nullable'
        ]);

        $data = $request->all();
        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;
        //thumbnail image save start
        $thumbnailImage = $request->file('file');
        $slug = $request->input('name');
        $thumbnailName = $this->imageUpload($thumbnailImage,$slug,'images',800,450);
        $data['file'] = $thumbnailName;
        //thumbnail image save end
        $this->_testimonialService->add($data);
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'name' => 'required|min:5',
            'address'=> 'nullable',
            'file'=>'nullable',
            'description'=> 'nullable'
        ]);
        $data = $request->all();

        //thumbnail image save start
        $thumbnailImage = $request->file('file');
        $slug = $request->input('name');
        $testimonial  = $this->getById($id);
        $thumbnailName = $this->imageUpdate($thumbnailImage,$slug,$testimonial,'images',800,450);
        //thumbnail image save end

        $data['file'] = $thumbnailName;

        $this->_testimonialService->update($data,$id);
    }

    public function delete($id)
    {
        $testimonial  = $this->getById($id);
        Storage::disk('public')->delete("images/{$testimonial->file}");
        $this->_testimonialService->delete($id);
    }
}