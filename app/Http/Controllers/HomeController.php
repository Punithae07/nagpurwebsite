<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\AlbumGallery;
use App\Models\Birthday;
use App\Models\Category;
use App\Models\ContactForm;
use App\Models\FloatingMenu;
use App\Models\Newsletters;
use App\Models\NewsletterSubscription;
use App\Models\OurActivities;
use App\Models\DailyThoughts;
use App\Models\AcademyYear;
use App\Models\News;
use App\Models\PhotoGallery;
use App\Models\Toppers;
use App\Models\Quotes;
use App\Models\Staffs;
use App\Models\Handbooks;
use App\Models\Books;
use App\Models\GalleryActivity;
use App\Models\Popup;
use App\Models\Pages;
use App\Models\Posts;
use App\Models\Sliders;
use App\Models\Testimonials;
use App\Models\ToppersX;
use App\Models\ToppersXII;
use App\Models\VideoGallery;
use App\Models\Timetable;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Sliders::where('status', 1)->latest()->get();

        $popups = Popup::where('status', 1)->latest()->get();

        $floatingMenus = FloatingMenu::where('status', true)
            ->orderBy('order_by', 'asc')
            ->get();

        $flashNewsHome = News::where('category_id', 1)
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->get();

        $principalMessage = News::where('category_id', 3)
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->first();

        $provincialMessage = News::where('category_id',4)
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->first();

        $correspondenceMessage = News::where('category_id',5)
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->first();

        // Prepare management messages for the view
        $managementMessages = collect();
        if ($correspondenceMessage) {
            $managementMessages->push([
                'id' => $correspondenceMessage->id,
                'title' => $correspondenceMessage->title ?? 'Correspondent Message',
                'description' => $correspondenceMessage->description ?? '',
                'author' => $correspondenceMessage->author ?? '',
                'designation' => $correspondenceMessage->designation ?? 'Correspondent',
                'image' => $correspondenceMessage->image 
                    ? asset('storage/' . $correspondenceMessage->image) 
                    : asset('frontend/img/image1.png'),
                'route' => route('frontend.correspondence.show', $correspondenceMessage->id),
            ]);
        }
        if ($principalMessage) {
            $managementMessages->push([
                'id' => $principalMessage->id,
                'title' => $principalMessage->title ?? 'Principal Message',
                'description' => $principalMessage->description ?? '',
                'author' => $principalMessage->author ?? '',
                'designation' => $principalMessage->designation ?? 'Principal',
                'image' => $principalMessage->image 
                    ? asset('storage/' . $principalMessage->image) 
                    : asset('frontend/img/image2.png'),
                'route' => route('frontend.principals.show', $principalMessage->id),
            ]);
        }
        if ($provincialMessage) {
            $managementMessages->push([
                'id' => $provincialMessage->id,
                'title' => $provincialMessage->title ?? 'Provincial Message',
                'description' => $provincialMessage->description ?? '',
                'author' => $provincialMessage->author ?? '',
                'designation' => $provincialMessage->designation ?? 'Provincial',
                'image' => $provincialMessage->image 
                    ? asset('storage/' . $provincialMessage->image) 
                    : asset('frontend/img/image3.png'),
                'route' => route('frontend.provincials.show', $provincialMessage->id),
            ]);
        }

        $latestNewsRaw = News::where('category_id', 2)
            ->where('status', 1)
            ->orderBy('date', 'desc')
            ->take(4)
            ->get();

        // Prepare latest news for the view
        $latestNews = $latestNewsRaw->map(function ($news) {
            $newsDate = $news->date 
                ? \Carbon\Carbon::parse($news->date)->format('M d, Y')
                : ($news->created_at 
                    ? $news->created_at->format('M d, Y')
                    : '');
                
                $newsImage = $news->image ? asset('storage/' . $news->image) : asset('images/default-news.jpg');
            
            return [
                'title' => $news->title ?? 'News Title',
                'description' => $news->description ?? '',
                'date' => $newsDate,
                'time' => $news->time ?? 'Time TBA',
                'location' => $news->location ?? 'Location TBA',
                'url' => route('frontend.news', $news->slug),
                'image' => $newsImage,
            ];
        });

        // Get today's daily thought
        $dailyThought = DailyThoughts::where('status', true)
            ->whereDate('date', Carbon::today())
            ->first();
        
        // If no thought for today, get the latest one
        if (!$dailyThought) {
            $dailyThought = DailyThoughts::where('status', true)
                ->orderBy('date', 'desc')
                ->first();
        }

        $upcomingEventsRaw = News::where('category_id', 10)
            ->where('status', 1)
            ->orderBy('date', 'desc')
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        // Prepare upcoming events for the view
        $upcomingEvents = $upcomingEventsRaw->map(function ($event, $index) {
            $eventDate = $event->date 
                ? \Carbon\Carbon::parse($event->date)->format('M d, Y')
                : ($event->created_at 
                    ? $event->created_at->format('M d, Y')
                    : '');
            
            $eventImage = $event->image 
                ? asset('storage/' . $event->image) 
                : asset('frontend/img/blog/blog-' . (($index % 4) + 1) . '.jpg');
            
            // Get category name or use a default
            $categoryName = $event->category->name ?? 'Event';
            
            return [
                'title' => $event->title ?? 'Event Title',
                'description' => $event->description ?? '',
                'date' => $eventDate,
                'image' => $eventImage,
                'time' => $event->time ?? 'Time TBA',
                'location' => $event->location ?? 'Location TBA',
                'category' => $categoryName,
                'url' => route('frontend.upcoming-events', $event->slug),
            ];
        });

        // Timetable data for home page (image download + calendar items)
        $latestTimetableImage = Timetable::where('type', 'image')
            ->where('is_published', true)
            ->latest('created_at')
            ->first();

        $timetableDownloadUrl = $latestTimetableImage && $latestTimetableImage->image_path
            ? asset('storage/' . $latestTimetableImage->image_path)
            : null;

        $timetableCalendar = Timetable::where('type', 'calendar')
            ->where('is_published', true)
            ->with(['entries' => function ($query) {
                $query->orderBy('start_at', 'asc');
            }])
            ->latest('created_at')
            ->first();

        $timetableItems = collect();
        if ($timetableCalendar) {
            $timetableItems = $timetableCalendar->entries->map(function ($entry, $index) {
                $timeLabel = null;
                if ($entry->start_at && $entry->end_at) {
                    $timeLabel = $entry->start_at->format('h:i A') . ' - ' . $entry->end_at->format('h:i A');
                } elseif ($entry->start_at) {
                    $timeLabel = $entry->start_at->format('M d, Y h:i A');
                }

                return [
                    'title' => $entry->subject ?? 'Subject',
                    'class' => $entry->class_name ?? null,
                    'time' => $timeLabel,
                ];
            });
        }

        // Get About Us content for home welcome section
        $aboutUsPage = Pages::where(function($query) {
                $query->where('slug', 'about-us')
                      ->orWhere('slug', 'home-welcome');
            })
            ->where('status', true)
            ->first();
        
        $aboutUsContent = null;
        if ($aboutUsPage) {
            $aboutUsImage = $aboutUsPage->feature_image 
                ? asset('storage/' . $aboutUsPage->feature_image) 
                : asset('frontend/img/about.jpeg');
            
            $aboutUsContent = [
                'title' => $aboutUsPage->title ?? 'About Us',
                'excerpt' => $aboutUsPage->excerpt ?? '',
                'image' => $aboutUsImage,
                'url' => $aboutUsPage->slug_url ?? route('frontend.pages.about-school'),
            ];
        }

        $galleries = PhotoGallery::latest()->limit(8)->get();
        $galleryImagesRaw = $galleries->flatMap(function ($gallery) {
            return $gallery->images()->get();
        })->take(6);

        // Prepare gallery images for the view
        $galleryImages = $galleryImagesRaw->map(function ($image, $index) {
            $imagePath = $image->path ?? '';
            $imageUrl = $imagePath 
                ? asset('storage/' . $imagePath) 
                : asset('frontend/img/gallery/gallery-' . (($index % 6) + 1) . '.jpg');
            
            return [
                'url' => $imageUrl,
                'alt' => $image->alt ?? $image->name ?? 'Gallery Image',
                'index' => $index,
            ];
        });

        $totalGalleries = PhotoGallery::count();

        $homeGallery = AlbumGallery::latest()->limit(6)->get();

        $latestVideo = VideoGallery::latest()->first();
        
        $videoLinks = VideoGallery::latest()->limit(6)->get();
        
        /* =======================
        | BIRTHDAY API
        =======================*/
        $birthdayCelebrants = collect();
        $data = ['Student' => []];

        $apiUrl = config('app.birthday_api_url');
        $schoolCode = config('app.school_code');

        try {
            if ($apiUrl) {
                $response = Http::withoutVerifying()
                    ->timeout(10)
                    ->get($apiUrl, ['SchoolCode' => $schoolCode]);
        
                if ($response->successful()) {
        
                    $data = $this->parseApiResponse(trim($response->body()));
        
                    $today = Carbon::today();
                    $day = (int) $today->format('d');
                    $month = (int) $today->format('m');
        
                    $filter = function ($person) use ($day, $month) {
                        if (empty($person['DOB'])) return false;
        
                        try {
                            $dob = Carbon::createFromFormat('d/m/Y', trim($person['DOB']));
                            return $dob->day === $day && $dob->month === $month;
                        } catch (\Exception $e) {
                            return false;
                        }
                    };
        
                    $data['Student'] = isset($data['Student'])
                        ? array_filter($data['Student'], $filter)
                        : [];
        
                    /* =========================
                     | STUDENTS (FIXED)
                     =========================*/
                    foreach ($data['Student'] as $student) {
                        $birthdayCelebrants->push([
                            'name'  => trim($student['NAME'] ?? 'Student'),
                            'class' => trim($student['CLASS'] ?? ''),
                            'image' => !empty($student['PhotoPath'])
                                ? route('proxy.image', ['url' => $student['PhotoPath']])
                                : asset('frontend/img/default-student.png'),
                        ]);
                    }
                }
            }
        } catch (\Exception $e) {
            Log::error('Birthday API error', ['error' => $e->getMessage()]);
        }

        // Get toppers data
        $toppers = Toppers::where('status', true)
            ->orderBy('order_by', 'asc')
            ->orderBy('percentage', 'desc')
            ->take(5)
            ->get();

        // Prepare toppers data for the view
        $toppersData = $toppers->map(function ($topper, $index) {
            $topperImage = is_array($topper->image) 
                ? (isset($topper->image[0]) ? asset('storage/' . $topper->image[0]) : asset('frontend/img/insta-1.jpg'))
                : ($topper->image ? asset('storage/' . $topper->image) : asset('frontend/img/insta-1.jpg'));
            
            return [
                'name' => $topper->name ?? 'Topper Name',
                'class' => $topper->class ?? 'N/A',
                'percentage' => $topper->percentage ?? '0',
                'rank' => $index + 1,
                'image' => $topperImage,
            ];
        });

        return view('frontend.layouts.home', compact(
            'sliders',
            'popups',
            'floatingMenus',
            'correspondenceMessage',
            'principalMessage',
            'managementMessages',
            'flashNewsHome',
            'data',
            'videoLinks',
            'galleryImages',
            'totalGalleries',
            'homeGallery',
            'latestNews',
            'dailyThought',
            'upcomingEvents',
            'birthdayCelebrants',
            'toppersData',
            'aboutUsContent',
            'timetableItems',
            'timetableDownloadUrl',
        ))->with(['birthdays' => $data]);
    }

     private function parseApiResponse($body)
    {
        if ($this->isJson($body)) {
            return json_decode($body, true);
        }

        if ($this->isXml($body)) {
            $xml = simplexml_load_string($body);
            $jsonString = $xml->string ?? null;
            return $jsonString ? json_decode($jsonString, true) : json_decode(json_encode($xml), true);
        }

        return null;
    }

    private function isJson($string)
    {
        json_decode($string);
        return json_last_error() === JSON_ERROR_NONE;
    }

    private function isXml($string)
    {
        libxml_use_internal_errors(true);
        $xml = simplexml_load_string($string);
        $valid = $xml !== false;
        libxml_clear_errors();
        return $valid;
    }

    private function extractYoutubeVideoId($url)
    {
        if (is_array($url)) {
            $url = reset($url);
        }

        if (!is_string($url) || empty($url)) {
            return null;
        }

        preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/i', $url, $matches);
        return $matches[1] ?? null;
    }
    private function convertToEmbedUrl($url)
    {
        if (strpos($url, 'youtu.be') !== false) {
            $videoId = substr(parse_url($url, PHP_URL_PATH), 1);
            return "https://www.youtube.com/embed/$videoId";
        }

        if (strpos($url, 'youtube.com/watch') !== false) {
            parse_str(parse_url($url, PHP_URL_QUERY), $queryParams);
            return isset($queryParams['v'])
                ? "https://www.youtube.com/embed/{$queryParams['v']}"
                : $url;
        }

        return $url;
    }
    public function gallery()
    {
        $albums = \App\Models\AlbumGallery::where('status', 1)->get();
        $groupedAlbums = $albums->groupBy('academic_year');

        return view('frontend.pages.gallery', compact('groupedAlbums'));
    }

    public function showYearGallery($year)
    {
        $albums = \App\Models\AlbumGallery::where('status', 1)
            ->get()
            ->filter(function ($album) use ($year) {
                return $album->academic_year == $year;
            });

        return view('frontend.pages.galleryByYear', compact('albums', 'year'));
    }

    public function show($id)
    {
        $album = \App\Models\AlbumGallery::findOrFail($id);

        // sub_images is now a flat array of paths
        $images = is_string($album->sub_images) ? json_decode($album->sub_images, true) : $album->sub_images;
        $images = collect($images ?: []);

        return view('frontend.pages.show', compact('album', 'images'));
    }

    public function videoGallery()
    {
        $videos = [];

        $records = VideoGallery::latest()->get();

        foreach ($records as $record) {
            $linksRaw = $record->link ?? null;
            $links = is_string($linksRaw)
                ? (json_decode($linksRaw, true) ?: [])
                : (is_array($linksRaw) ? $linksRaw : []);

            foreach ($links as $item) {
                $url = is_array($item) ? ($item['url'] ?? null) : (is_string($item) ? $item : null);
                if (empty($url)) {
                    continue;
                }

                $embedUrl = $this->convertToEmbedUrl($url);
                if (!$embedUrl) {
                    continue;
                }

                $videos[] = [
                    'title' => $record->title ?? 'School Video',
                    'embedUrl' => $embedUrl,
                ];
            }
        }

        return view('frontend.pages.videoGallery', compact('videos'));
    }
    public function contactUs()
    {
        return view('frontend.pages.contact');
    }

    public function storeContactUs(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:100',
                'email' => 'required|email|max:100',
                'subject' => 'required|string|max:200',
                'phone' => 'nullable|string|max:10',
                'message' => 'required|string|max:1000',
            ]);

            ContactForm::create($validatedData);

            return response()->json([
                'status' => true,
                'message' => 'Thank you for contacting us. We will get back to you shortly'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => false,
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function storeNewsletter(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'email' => 'required|email|max:255|unique:newsletter_subscriptions,email',
            ], [
                'email.required' => 'Please enter your email address',
                'email.email' => 'Please enter a valid email address',
                'email.unique' => 'This email is already subscribed to our newsletter',
            ]);

            NewsletterSubscription::create([
                'email' => $validatedData['email'],
                'is_active' => true,
                'subscribed_at' => now(),
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Thank you for subscribing to our newsletter!'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => false,
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong. Please try again later.',
            ], 500);
        }
    }
    public function singleNews($slug)
    {
        $news = News::where('slug', $slug)
            ->where('category_id', 2)
            ->where('status', 1)
            ->first();

        if (!$news) {
            abort(404, 'News not found');
        }

        return view('frontend.news', compact('news'));
    }

    public function singleFlashNews($slug)
    {
        $flashNews = News::where('slug', $slug)
            ->where('status', 1)
            ->where('category_id', 1)
            ->first();

        return view('frontend.pages.singleflashnews', compact('flashNews'));
    }

    public function allNews(Request $request)
    {
        $latestNews = News::where('category_id', 2)
            ->where('status', 1)
            ->orderBy('date', 'desc')
            ->paginate(9);

        return view('frontend.pages.allNews', compact('latestNews'));
    }

    public function principalShow($id)
    {
        $principal = News::where('category_id', 3)->where('id', $id)->first();
        $breadcrumbs = [
            [
                'name' => 'Principal Messages',
                'url' => route('frontend.pages.all-principal-message'),
            ],
        ];
        return view('frontend.pages.principalShow', compact('principal', 'breadcrumbs'));
    }

    public function provincialShow($id)
    {
        $provincial = News::where('category_id', 4)->where('id', $id)->first();

        if (!$provincial) {
            abort(404, 'Provincial message not found');
        }

        $breadcrumbs = [
            [
                'name' => 'Provincial Message',
                'url' => route('frontend.pages.all-provincial-message'),
            ],
        ];

        return view('frontend.pages.provincialShow', compact('provincial', 'breadcrumbs'));
    }

    public function correspondenceShow($id)
    {
        $correspondence = News::where('category_id', 5)->where('id', $id)->first();

        $breadcrumbs = [
            [
                'name' => 'Correspondence Message',
                'url' => route('frontend.pages.all-correspondence-message'),
            ],
        ];
        return view('frontend.pages.corresPondentShow', compact('correspondence', 'breadcrumbs'));
    }
    public function allPrincipalMessage()
    {
        $allPrincipals = News::where('category_id', 3)->orderBy('created_at', 'desc')->get();

        $breadcrumbs = [
            [
                'name' => 'Principal Message',
                'url' => route('frontend.pages.all-principal-message'),
            ],
        ];
        return view('frontend.pages.allPrincipalMessage', compact('allPrincipals', 'breadcrumbs'));
    }

    public function allProvincialMessage()
    {
        $allProvincials = News::where('category_id', 4)->orderBy('created_at', 'desc')->get();

        $breadcrumbs = [
            [
                'name' => 'Provincial Message',
                'url' => route('frontend.pages.all-provincial-message'),
            ],
        ];

        return view('frontend.pages.allProvincialMessage', compact('allProvincials', 'breadcrumbs'));
    }

    public function allCorrespondenceMessage()
    {
        $allCorrespondence = News::where('category_id', 5)->orderBy('created_at', 'desc')->get();

        $breadcrumbs = [
            [
                'name' => 'Correspondence Message',
                'url' => route('frontend.pages.all-correspondence-message'),
            ],
        ];
        return view('frontend.pages.allCorrespondenceMessage', compact('allCorrespondence', 'breadcrumbs'));
    }

    public function staff()
    {
        $staffs = Staffs::where('status', true)
            ->orderBy('order_by', 'asc')
            ->orderBy('name', 'asc')
            ->get();

        // Group staff by staff_type
        $kindergartenStaff = $staffs->where('staff_type', 'kindergarten');
        $schoolSectionStaff = $staffs->where('staff_type', 'school-section');
        $officeStaff = $staffs->where('staff_type', 'office');
        $helpingStaff = $staffs->where('staff_type', 'helping');

        return view('frontend.pages.staff', compact(
            'kindergartenStaff',
            'schoolSectionStaff',
            'officeStaff',
            'helpingStaff'
        ));
    }

    public function toppers()
    {
        $toppers = Toppers::where('status', true)
            ->orderBy('order_by', 'asc')
            ->orderBy('name', 'asc')
            ->get();
        return view('frontend.pages.toppers', compact('toppers'));
    }
}