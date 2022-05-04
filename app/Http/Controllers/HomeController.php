<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessEmployees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Log;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
           if ($request->has('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $filePath = public_path('uploads').'/'.$fileName;
            if (!file_exists($filePath)) {
                $file->move(public_path('uploads'), $fileName);
            }

            $header = null;
            $dataFromCsv = [];
            $records = array_map('str_getcsv', file($filePath));

            //Rearranging the data
            foreach ($records as $key => $record) {
                if (!$header) {
                    $header = $record;
                } else {
                    $dataFromCsv[] = $record;
                }
                
            }

            //break data into chunks
            $dataFromCsv = array_chunk($dataFromCsv, 200);
            foreach ($dataFromCsv as $key => $dataCsv) {
                # loop through each employee
                foreach ($dataCsv as $key => $data) {
                    //upto here we can save data
                    $employeeData[$key][] = array_combine($header, $data);
                    
                }
                ProcessEmployees::dispatch($employeeData[$key]);

            }
            
           
           }

           return "operation successful!";
            
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            dd($th);
        }
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
