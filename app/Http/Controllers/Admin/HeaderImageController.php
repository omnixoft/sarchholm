<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeaderImage;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;

class HeaderImageController extends Controller
{
    use ImageUpload;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale = Session::get('currentLocal');
        $data = HeaderImage::all();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('page', function (HeaderImage $headerImage) use ($locale){
                    return $headerImage->page;
                })
                ->addColumn('Image', function ($row) {
                    $url=asset("images/header/$row->url");
                    // $image = '<img src="images/header/'.$row->url.'" style="width:50px;height:50px">';
                    return '<img src='.$url.' border="0" width="40" style="width:50px;height:50px" align="center" />';
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<div class="d-flex justify-content-end">
                    <a href="'.route('admin.header-images.edit',$row).'" class="edit btn btn-info btn-sm"><i class="la la-edit"></i></a>

                 | <form action="'.route('admin.header-images.destroy',$row).'" method="POST">
                    '.csrf_field().'
                    '.method_field("DELETE").'
               <button class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')"><i class="la la-trash"></i></button>
                </form></div>';
                    return $actionBtn;
                })
                ->rawColumns(['action','Image'])
                ->make(true);
        }
        return view('admin.header-images.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.header-images.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'page' => 'required',
            'image' => 'required'
        ]);

        $data = $request->all();
        //header image save
        $headerImage = $request->file('image');
        $slug = $request->input('page');
        $imageName = $this->imageUpload($headerImage,$slug,'header',1400,700);
        $data['url'] = $imageName;

        HeaderImage::create($data);
        notify()->success('Image added successfully!');
        return redirect()->route('admin.header-images.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(HeaderImage $headerImage)
    {
        return view('admin.header-images.edit',compact('headerImage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'page' => 'required',
        ]);

        $data = $request->all();
        //header image save start
        $headerImage = $request->file('image');
        $slug = $request->input('page');
        $image  = HeaderImage::find($id);
        $imageName = $this->imageUpdate($headerImage,$slug,$image,'header',1400,700);
        $data['url'] = $imageName;
        //header image save end

        $image->update([
            'page'=> $data['page'],
            'url'=> $data['url']
        ]);

        notify()->success('Image updated successfully!');
        return redirect()->route('admin.header-images.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(HeaderImage $headerImage)
    {
        File::delete(public_path() . "/images/header/{$headerImage->url}");
        $headerImage->delete();
        return redirect()->route('admin.header-images.index');
    }
}
