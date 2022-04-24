<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use Illuminate\Database\Eloquent\Model;
use JD\Cloudder\Facades\Cloudder;
use Illuminate\Http\Request;
use Cloudinary\Cloudinary;
use App\Helpers\Helper;
use App\Models\Project;
use App\Models\File;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$data = Project::all();
        $data = ProjectResource::collection(Project::all());
        return json_encode([
            'message' => 'successfully!',
            'data' => $data
        ], 200);
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
        $project = Project::create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        if ($request->hasFile('pictures')) {
            $files = $request->file('pictures');
            $url  = cloudinary()->upload($files->getRealPath(),['folder' => 'leo'])->getSecurePath();
            if($url){
                $file = $project->files()->create([
                    'project_id' => $project->id,
                    'url' => $url
                ]);
            }
        }
        
        return \json_encode([
            'message' => 'success',
            'data' => $project
        ]);      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Project::find($id);
        return json_encode([
            'message' => 'successfully!',
            'data' => $data
        ], 200);
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
        $data = $this->show($id);
        $title = $request->title;
        $dta->save();
        return json_encode([
            'message' => 'successfully updated!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->show($id);
        $data->delete();
        return json_encode([
            'message' => 'successfully deleted'
        ], 200);
    }
}
