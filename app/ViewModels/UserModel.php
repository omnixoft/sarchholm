<?php
namespace App\ViewModels;

use App\Services\UserService;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;

class UserModel implements IUserModel
{
    use ImageUpload;
    private $_userService;
    public function __construct(UserService $service)
    {
        $this->_userService = $service;
    }

    public function getAll(Request $request)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale = Session::get('currentLocal');
        $data = $this->_userService->getAgents();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('name', function ($row) use ($locale)
            {
                return $row->f_name . ' '.$row->l_name;
            })
            ->addColumn('email', function ($row) use ($locale)
            {
                return $row->email;
            })
            ->addColumn('mobile', function ($row) use ($locale)
            {
                return $row->mobile;
            })
            ->addColumn('credits', function ($row) use ($locale)
            {
                return $row->packageUser->sum('price');
            })
            ->addColumn('properties', function ($row) use ($locale)
            {
                return $row->properties->count();
            })
            ->addColumn('created_at', function ($row) use ($locale)
            {
                return $row->created_at;
            })
            ->addColumn('action', function($row){
                $actionBtn = '<div class="d-flex justify-content-end">
                    <a href="'.route('admin.agents.edit',$row->id).'" class="edit btn btn-info btn-sm"><i class="la la-edit"></i></a> 

                 | <form action="'.route('admin.agents.destroy',$row->id).'" method="POST">
                    '.csrf_field().'
                    '.method_field("DELETE").'
               <button class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')"><i class="la la-trash"></i></button>
                </form></div>';
                return $actionBtn;
            })
            ->rawColumns(['action','status'])
            ->make(true);

    }

    public function getById($id)
    {
        return $this->_userService->getById($id);
    }

    public function add(Request $request)
    {
        request()->validate([
            'f_name' => ['required', 'string', 'max:255'],
            'l_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
            'confirm_password' => ['same:password'],
        ]);
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;
        $this->_userService->add($data);
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'f_name'=> 'required',
            'l_name'=> 'required',
            'username'=> 'required',
            'type'=> 'nullable',
            'email'=> 'required',
            'mobile'=> 'nullable',
            'mobile_office' => 'nullable',
            'title'=> 'nullable',
            'company_name'=> 'nullable',
            'image'=> 'nullable',
            'description'=> 'nullable',
            'skype'=> 'nullable',
            'fb'=> 'nullable',
            'twitter'=> 'nullable',
            'instagram'=> 'nullable',
        ]);
        //thumbnail image save start
        $image = $request->file('image');
        $slug = $request->input('username');
        $user  = $this->getById($id);
        $imageName = $this->imageUpdate($image,$slug,$user,'users',380,400);
        //thumbnail image save end
        $data = $request->all();

        $data['image'] =$imageName;
        $this->_userService->update($data,$id);
    }

    public function delete($id)
    {
        $this->_userService->delete($id);
    }

}