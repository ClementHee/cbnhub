<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Course;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckCourseAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $courseId = $request->route('mycourses');
        
        if ($courseId) {
           
            $course = $courseId;
            $user = $request->user();
               
            if (!$course->isAccessibleBy($user)) {
                if ($request->expectsJson()) {
                    return response()->json(['error' => 'Access denied'], 403);
                }
                
                return redirect()->route('my-courses')
                               ->with('error', 'You do not have access to this course');
            }
        }
        
        return $next($request);
    
    }
}
