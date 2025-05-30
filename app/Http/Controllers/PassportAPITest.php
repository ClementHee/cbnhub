<?php

namespace App\Http\Controllers;

use Closure;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PassportAPITest extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $user;
    
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(auth('api')->check()) {
                $this->user = auth('api')->user();
            }
            return $next($request);
        });

    }

    public function userInfo() {
        
        return response()->json([
            'email'     => $this->user->email,
            'name'      => $this->user->name
        ]);
    }

    public function logout() {
        if(auth('api')->user()) {
            auth('api')->user()->tokens->each(function ($token, $key) {
                $token->delete();
            });
        }
        return response()->json(null, 200);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
