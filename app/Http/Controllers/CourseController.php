<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Season;
use Illuminate\Http\Request;
use App\Models\CourseTracking;
use App\Models\SectionMaterial;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{

    public $pdfFile;
    public $ep;
    public $currentPdf = null;
    public $preview = false;
    public $previewVid = false;
    public $currentVid;
    public $prevUrl;

    public $path;
    public string $upload_type = '';
    public $order;
    public $file_category;
    public $file_path;
    public $file_name;

    public $video_title;
    public $brightcove_url;
    public $course_section_id;


    public $viewVideo = false;
   
  

    public function previewPDF($pdf)
    {
        $this->preview = true;
        $this->currentPdf = $pdf;
        $this->path = storage_path("app/pdfs/{$pdf}");
    }

    public function previewVideos($url)
    {

        $this->previewVid = true;
        $this->currentVid = $url;
        $this->prevUrl = $url;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(int $s)
    {
        $courses = Course::where('season_id', $s)
            ->get();

        return view('pages.sba.course.course', compact('courses', 's'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('pages.sba.course.course-create', [
            'seasons' => Season::all(),
        ]);
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
    public function show(Course $course)
    {

        //
        $course = Course::findOrFail($course->id);

        $season = Season::findOrFail($course->season_id);



        return view('pages.sba.course.course-view', compact('course', 'season'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {

        $course = Course::findOrFail($course->id);
        $seasons = Season::all();

        return view('pages.sba.course.course-management', compact('course', 'seasons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }

    public function assignCohort(Course $course)
    {

        $course = Course::findOrFail($course->id);

        return view('pages.sba.course.cohort-assign-course', compact('course'));
    }

    public function seeCourses(Request $request)
    {
        $user = Auth::user()->id;
        $seasons = Season::all();
        $courses = Course::whereHas('cohorts.users', function ($query) use ($user) {
            $query->where('users.id', $user);
        })->with(['cohorts'])->orderBy('order')->get();

        return view('pages.sba.course.my-courses', compact('courses', 'seasons'));
    }

    public function seeMyCourses(Course $mycourses)
    {
        $materials = $mycourses->sectionMaterials()->get();
        $sections = $mycourses->getCourseSections()->get();
        $season = Season::findOrFail($mycourses->season_id);
        $course = Course::findOrFail($mycourses->id);
        CourseTracking::create([
            'user_id' => Auth::user()->id,
            'course_id' => $course->id,
        ]);

        return view('pages.sba.course.my-course-view', compact('course', 'season', 'materials', 'sections'));
    }

    public function allCourses()
    {
        $courses = Course::all();
        $seasons = Season::all();
        return view('pages.sba.course.all-courses', compact('courses', 'seasons'));
    }

    public function viewVideo($episode, $courseSection){

        $this->viewVideo = true;
        if ($this->viewVideo) {
            return view('pages.sba.course.media', [
                'videoUrl' => SectionMaterial::where('upload_type', 'video')->where('course_section_id',$courseSection)->get(),
            ]);
        } else {
            return redirect()->back()->with('error', 'No video to preview.');
        }
    }
}
