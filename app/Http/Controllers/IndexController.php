<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use App\Rules\AgeMatchesBirthday;
use App\Rules\agematchesbirthdaymember;
use App\Rules\CheckAtLeastOneCheckbox;
use App\Rules\UniqueNameCombination;
use Illuminate\Support\Facades\Log;
use App\Models\Resident;
use App\Models\Member;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccountApprovalNotification;
use Illuminate\Support\Str;
use Illuminate\Support\HtmlString;


class IndexController extends Controller
{
    public function index()
    {
        return view('welcome');
        //return "Hello, this is the welcome page!";
    }

}