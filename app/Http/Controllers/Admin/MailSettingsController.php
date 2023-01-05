<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\ENVFilePutContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MailSettingsController extends Controller
{
    use ENVFilePutContent;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mail-settings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->only('mail_host','mail_address','mail_name','port','password','encryption'),[
                'mail_host' => 'required',
                'mail_address' => 'required',
                'mail_name' => 'required',
                'port' => 'required',
                'password' => 'required',
                'encryption' => 'required',
            ]);

            if ($validator->fails()){
                return response()->json(['errors' => $validator->errors()->all()]);
            }

            $this->dataWriteInENVFile('MAIL_HOST',$request->mail_host);
            $this->dataWriteInENVFile('MAIL_PORT',$request->port);
            $this->dataWriteInENVFile('MAIL_FROM_ADDRESS',$request->mail_address);
            $this->dataWriteInENVFile('MAIL_FROM_NAME',$request->mail_name);
            $this->dataWriteInENVFile('MAIL_USERNAME',$request->mail_address);
            $this->dataWriteInENVFile('MAIL_PASSWORD',$request->password);
            $this->dataWriteInENVFile('MAIL_ENCRYPTION',$request->encryption);

            return response()->json(['success' => __('Data Added successfully.')]);

        }


        // $data = $request->all();

		// 	//writting mail info in .env file
		// 	$path = '.env';
		// 	$searchArray = array('MAIL_HOST="' . env('MAIL_HOST') . '"',
        //                         'MAIL_PORT=' . env('MAIL_PORT'),
        //                         'MAIL_FROM_ADDRESS="' . env('MAIL_FROM_ADDRESS') . '"',
        //                         'MAIL_FROM_NAME="' . env('MAIL_FROM_NAME') . '"',
        //                         'MAIL_USERNAME="' . env('MAIL_USERNAME') . '"',
        //                         'MAIL_PASSWORD="' . env('MAIL_PASSWORD') . '"',
        //                         'MAIL_ENCRYPTION="' . env('MAIL_ENCRYPTION') . '"');
		// 	// $searchArray = array('MAIL_HOST=' . env('MAIL_HOST'),'MAIL_PORT=' . env('MAIL_PORT'),'MAIL_FROM_ADDRESS=' . env('MAIL_FROM_ADDRESS'),'MAIL_FROM_NAME=' . env('MAIL_FROM_NAME'),'MAIL_USERNAME=' . env('MAIL_USERNAME'),'MAIL_PASSWORD=' . env('MAIL_PASSWORD'),'MAIL_ENCRYPTION=' . env('MAIL_ENCRYPTION'));

		// 	$replaceArray = array('MAIL_HOST="' . $data['mail_host'] . '"',
        //                         'MAIL_PORT=' . $data['port'],
        //                         'MAIL_FROM_ADDRESS="' . $data['mail_address'] . '"',
        //                         'MAIL_FROM_NAME="' . $data['mail_name'] . '"',
        //                         'MAIL_USERNAME="' . $data['mail_address'] . '"',
        //                         'MAIL_PASSWORD="' . $data['password'] . '"',
        //                         'MAIL_ENCRYPTION="' . $data['encryption'] . '"');

		// 	file_put_contents($path, str_replace($searchArray, $replaceArray, file_get_contents($path)));

			// return redirect()->back()->with('message', 'Data updated successfully');
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
