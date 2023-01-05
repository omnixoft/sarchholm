<?php
namespace App\ViewModels;
use App\Services\SocialLoginService;
use App\Traits\ENVFilePutContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SocialLoginModel implements ISocialLoginModel
{
    use ENVFilePutContent;

    private $_socialLoginService;

    public function __construct(SocialLoginService $socialLoginService)
    {
        $this->_socialLoginService = $socialLoginService;
    }

    public function initialize(Request $request)
    {
        $validator = Validator::make($request->only('client_id','secret'),[
            'client_id' => 'required',
            'secret' => 'required',
        ]);

        if ($validator->fails()){
            return response()->json(['errors' => $validator->errors()->all()]);
        }else{
            $data = $request->all();
            $this->_socialLoginService->initialize($data);
            return response()->json(['success' => __('Data Added successfully.')]);
        }
    }
}