<?php

namespace App\Http\Controllers;

use App\Http\Requests\CertificationRequest;
use App\Http\Requests\ExperienceRequest;
use Illuminate\Http\Request;
use App\Http\Requests\InfoRequest;
use App\Http\Requests\ProjectsRequest;
use App\Http\Requests\SkillsRequest;
use App\Http\Requests\SocialsRequest;
use App\Mail\Test;
use App\Models\Certification;
use App\Models\Experience;
use App\Models\Info;
use App\Models\User;
use App\Models\Project;
use App\Models\Stack;
use App\Models\Social;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    protected $myuser;

    function __construct() {
        $this->myuser = User::findorfail(1);
    }
    public function index(){
        $data = User::with(['experience', 'info', 'certifications', 'projects', 'stacks', 'socials'])->find(1);
        return Inertia::render('Main',$data);
    }
    public function editSite(){
        $user=Auth::user();
        $data = User::with(['experience', 'info', 'certifications', 'projects', 'stacks', 'socials'])->find($user->id);
        return Inertia::render('Edit',$data);
    }
    public function messages(){
        return Inertia::render('Messages');
    }
    public function testmail(){
        Mail::send(new Test());
        dd('sent');
    }
}
