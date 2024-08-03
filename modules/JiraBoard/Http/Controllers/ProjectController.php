<?php

namespace Modules\JiraBoard\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\JiraBoard\Http\Services\ProjectService;
use Modules\JiraBoard\Models\Project;

class ProjectController extends Controller
{
    public function __construct(public readonly ProjectService $projectService)
    {
    }

    public function index(Request $request)
    {
        // return $this->projectService->updateEveryProject();
        $value = $this->projectService->fetchAllProjectsFromDB( $request->project_type );
        $data  = [
            'projects'    => $value['projects'],
            'projectType' => $value['projectType'],
        ];
        return view('pages.project.index', $data);
    }

    public function update(Request $request)
    {
        // return $request;
        $status = $this->projectService->updateProjectStautus( $request->projectStat, $request->id );
        return response()->json($status);
    }

    public function getGroup()
    {
        return $this->projectService->updateEveryGroup();
    }

    public function getUser()
    {
        return $this->projectService->updateEveryUser();
    }

    public function loadProject( Request $request )
    {
        $project = $this->projectService->loadProjectVaiAajaxCall($request->projectType);


        return response()->json($project);
    }
}
