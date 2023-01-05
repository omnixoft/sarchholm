<?php
namespace App\ViewModels;

use App\Services\PartnerService;
use App\Services\SiteInfoService;
use App\Traits\ImageUpload;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class SiteInfoModel implements ISiteInfoModel
{
    use ImageUpload;
    private $_siteInfoService;
    public function __construct(SiteInfoService $service)
    {
        $this->_siteInfoService = $service;
    }

    public function getAll(Request $request)
    {
        App::setLocale(Session::get('currentLocal'));
        return $this->_siteInfoService->getAll();
    }

    public function getById($id)
    {
        return $this->_siteInfoService->getById($id);
    }

    public function add(Request $request)
    {
        request()->validate([
            'title'=> 'required',
            'logo'=> 'nullable',
            'favicon'=> 'nullable',
            'email'=> 'nullable | email',
            'phone'=> 'nullable',
            'description'=> 'nullable | max: 255',
            'address'=> 'nullable',
            'copy_right'=> 'nullable',
            'fb'=> 'nullable',
            'twitter'=> 'nullable',
            'yt'=> 'nullable',
            'pinterest' => 'nullable',
            'terms_condition'=> 'nullable',
            'privacy_policy'=> 'nullable',
            'color'=>'nullable | min:6 | max:7',
            'about_us'=>'nullable',
        ]);
        $data = $request->all();

        // logo save start

        $siteInfo = $this->_siteInfoService->getById(1);
        $id = $siteInfo->id;
        $logo = $request->file('logo');

        $slug =  Str::slug($request->input('title'));

        if (isset($logo))
        {
            if(isset($siteInfo->logo))
            {
                File::delete(public_path() . "/images/images/{$siteInfo->logo}");
            }

            $currentDate = Carbon::now()->toDateString();
            $fileName = $slug.'-'.$currentDate.'-'.uniqid();
            $image = \Intervention\Image\Facades\Image::make($logo)->encode('webp', 90)->fit(465, 75)->save(public_path('images/images/'  .  $fileName . '.webp'));
            $logoName = $image->basename;
        } else
        {
            $logoName = $siteInfo->logo;
        }
        $data['logo'] = $logoName;
        // logo save end

        // favicon icon save start

        $favicon = $request->file('favicon');

        $slug =  Str::slug($request->input('title'));

        if (isset($favicon))
        {
            if(isset($siteInfo->favicon))
            {
                File::delete(public_path() . "/images/images/{$siteInfo->favicon}");
            }

            $currentDate = Carbon::now()->toDateString();
            $fileName = $slug.'-'.$currentDate.'-'.uniqid();
            $image = \Intervention\Image\Facades\Image::make($favicon)->encode('webp', 90)->fit(30, 30)->save(public_path('images/images/'  .  $fileName . '.webp'));
            $faviconName = $image->basename;
        } else
        {
            $faviconName = $siteInfo->favicon;
        }
        $data['favicon'] = $faviconName;
        // favicon icon save end

        $this->_siteInfoService->update($data,$id);
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'name'=> 'nullable',
            'image'=>'nullable',
        ]);
        $data['name'] = $request->input('name');
        //thumbnail image save start
        $thumbnailImage = $request->file('image');
        $slug = $request->input('name');
        $partner  = $this->getById($id);
        $thumbnailName = $this->imageUpdate($thumbnailImage,$slug,$partner,'images',150,100);
        //thumbnail image save end
        $data['image'] = $thumbnailName;
        $siteId = $this->_siteInfoService->getById(1);

        $this->_siteInfoService->update($data,$id);
    }

    public function delete($id)
    {
        $partner  = $this->getById($id);
        Storage::disk('public')->delete("images/{$partner->image}");
        $this->_siteInfoService->delete($id);
    }

}
