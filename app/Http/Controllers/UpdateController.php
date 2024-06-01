<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CertificationRequest;
use App\Http\Requests\ExperienceRequest;
use App\Http\Requests\InfoRequest;
use App\Http\Requests\ProjectsRequest;
use App\Http\Requests\StacksRequest;
use App\Http\Requests\SocialsRequest;
use App\Models\Certification;
use App\Models\Experience;
use App\Models\User;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Social;
use App\Models\Stack;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    protected $myuser;
    protected $user;

    function __construct() {
        $this->myuser = User::findorfail(1);
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            if (!$this->user) {
                abort(403, 'Unauthorized');
            }

            return $next($request);
        });
    }
    public function Info(InfoRequest $request){        
        $validate = $request->validated();
        $info = $this->user->info;
        $oldphotourl=$info->cv;
        if($request->input('cv')){
            $file = $validate['cv'];
            $cv = Storage::disk('public')->put('cv', $file);
            $path = Storage::url($cv);
        }
        else{
            $path = $oldphotourl;
        }
        if ($info) {
            $info->update([
                'name' => $validate['name'],
                'gender' => $validate['gender'],
                'job_desc' => $validate['job_desc'],
                'nickname' => $validate['nickname'],
                'other_nickname' => $validate['other_nickname'],
                'brand' => $validate['brand'],
                'origin' => $validate['origin'],
                'currently' => $validate['currently'],
                'phone' => $validate['phone'],
                'cv' => $path,
            ]);
        }
    }
    public function Stack(StacksRequest $request, Stack $stack){
        $validated = $request->validated();
        $data = [
            'name' => $validated['name'],
            'level' => $validated['level'],
        ];
        if ($stack && $stack->user_id == $this->user->id) {
            $stack->update($data);
        }else{
            $this->user->stacks()->create($data);
        }
    }
    public function Project(ProjectsRequest $request, Project $project){
        if($project){
            $oldphotourl=$project->img;
        }
        $validated = $request->validated();
        $file = $validated['img'];
        if($file){
            $img = Storage::disk('public')->put('projects', $file);
            $path = Storage::url($img);
        }
        else{
            $path = $oldphotourl;
        }
        $data = [
            'name' => $validated['name'],
            'img' => $path,
            'about' => $validated['about'],
            'stacks' => $validated['stacks'],
            'url' => $validated['url'],
            'git' => $validated['git']
        ];
        if ($project && $project->user_id == $this->user->id) {
            $project->update($data);
            // Delete old photo
            // $project->img
        }else{
            $this->user->projects()->create($data);
        }
    }

    public function Experience(ExperienceRequest $request, Experience $experience){
        $validated = $request->validated();
        $data = [
            'name' => $validated['name'],
            'location' => $validated['location'],
            'post' => $validated['p'],
            'start' => $validated['start'],
            'end' => $validated['end'],
        ];
        if ($experience && $experience->user_id == $this->user->id) {
            $experience->update($data);
        }else{
            $this->user->experience()->create($data);
        }
    }
    public function Certification(CertificationRequest $request, Certification $certification){
        $validated = $request->validated();
        $data = [
            'name' => $validated['name'],
            'location' => $validated['location'],
            'details' => $validated['details'],
            'certified' => $validated['certified'],
            'date' => $validated['date']
        ];
        if ($certification && $certification->user_id == $this->user->id) {
            $certification->update($data);
        }else{
            $this->user->certifications()->create($data);
        }
    }
    public function Social(SocialsRequest $request, Social $social){
        $validated = $request->validated();
        $data = [
            'name' => $validated['name'],
            'url' => $validated['url'],
            'handle' => $validated['socialhandle'],
        ];
        if ($social && $social->user_id == $this->user->id) {
            $social->update($data);
        }else{
            $this->user->socials()->create($data);
        }
    }
}
