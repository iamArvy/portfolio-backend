<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Social;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function Project(Project $project){
        if($project){
            $project->delete();
        }
    }
    public function Skill(Skill $skill){
        if($skill){
            $skill->delete();
        }
    }
    public function Certification(Certification $certification){
        if($certification){
            $certification->delete();
        }
    }
    public function Experience(Experience $experience){
        if($experience){
            $experience->delete();
        }
    }
    public function Social(Social $social){
        if($social){
            $social->delete();
        }
    }
}
