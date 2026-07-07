<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProcessController;
use App\Http\Controllers\MilestoneController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ContactController;
use App\Services\GeminiService;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\SubscriptionController; 
use App\Http\Controllers\BookingController; 
use App\Http\Controllers\DailyPostController;
use App\Http\Controllers\PublicPrivacyPolicyController;
use App\Http\Controllers\PublicTermsOfServiceController;
// ============================================ -->
// PUBLIC ROUTES -->
// ============================================ -->
Route::get("/test-observer", function() {
    try {
        \Illuminate\Support\Facades\Log::info("=== TEST OBSERVER ROUTE HIT ===");
        
        // Check if Service model exists
        $serviceModel = new \App\Models\Service();
        \Illuminate\Support\Facades\Log::info("Service model loaded");
        
        // Create a test service
        $service = \App\Models\Service::create([
            "title" => "Test Observer Service " . date("Y-m-d H:i:s"),
            "description" => "Testing observer from route",
            "is_active" => true,
            "display_order" => 999,
        ]);
        
        \Illuminate\Support\Facades\Log::info("Test service created with ID: " . $service->id);
        
        // Manually trigger observer
        $observer = new \App\Observers\ServiceObserver();
        $observer->created($service);
        
        return response()->json([
            "success" => true,
            "message" => "Service created and observer triggered",
            "service_id" => $service->id
        ]);
        
    } catch (\Exception $e) {
        \Illuminate\Support\Facades\Log::error("Test observer error: " . $e->getMessage());
        return response()->json([
            "success" => false,
            "error" => $e->getMessage(),
            "trace" => $e->getTraceAsString()
        ]);
    }
});

// Debug Knowledge Base
Route::get('/debug-knowledge', function() {
    try {
        $kb = new \App\Services\KnowledgeBaseService();
        $data = $kb->getFullContext();
        
        return response()->json([
            'success' => true,
            'knowledge_base' => $data,
            'formatted' => $kb->getFormattedContext(),
            'team_count' => isset($data['team']) ? count($data['team']) : 0,
            'services_count' => isset($data['services']) ? count($data['services']) : 0,
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);
    }
});
//terms of service and privacy policy routes
Route::get('/terms-of-service', [PublicTermsOfServiceController::class, 'index'])->name('terms.of.service');
Route::get('/privacy-policy', [PublicPrivacyPolicyController::class, 'index'])->name('privacy.policy');
// ads.txt for Google AdSense
Route::get('/ads.txt', function () {
    return response("google.com, pub-8335787923057820, DIRECT, f08c47fec0942fa0", 200)
        ->header('Content-Type', 'text/plain');
});
// Home Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/course-fog', [HomeController::class, 'index']);

// Daily Digest Routes
Route::get('/digest', [DailyPostController::class, 'index'])->name('daily.digest');
Route::get('/daily-digest/{date}', [DailyPostController::class, 'show'])->name('daily.digest.show');

// Projects Routes
Route::get('/projects', [App\Http\Controllers\ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{id}', [App\Http\Controllers\ProjectController::class, 'show'])->name('projects.show');

//testimonials Routes
Route::get('/testimonials', [App\Http\Controllers\TestimonialController::class, 'index'])->name('testimonials.index');
// SCORM Project Routes
Route::get('/scorm-projects', [App\Http\Controllers\ScormProjectController::class, 'index'])->name('scorm.index');
Route::get('/scorm-projects/{id}', [App\Http\Controllers\ScormProjectController::class, 'show'])->name('scorm.show');
Route::get('/scorm-projects/{id}/play', [App\Http\Controllers\ScormProjectController::class, 'play'])->name('scorm.play');

// Chat Routes
Route::get('/chat', [ChatController::class, 'index'])->name('chat');
Route::post('/chat/send', [ChatController::class, 'send'])->name('chat.send');
Route::get('/chat/history/{contactId}', [ChatController::class, 'getHistory'])->name('chat.history');

// About Route
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Services Routes
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/services/{id}', [ServiceController::class, 'show'])->name('services.show');
Route::get('/services/detail/{slug}', [ServiceController::class, 'detail'])->name('services.detail');

// Process Route
Route::get('/process', [ProcessController::class, 'index'])->name('process');

// Milestones Route
Route::get('/milestones', [MilestoneController::class, 'index'])->name('milestones');

// Team Route
Route::get('/team', [TeamController::class, 'index'])->name('team');
Route::get('/team/{id}', [TeamController::class, 'show'])->name('team.show');

// Contact Routes
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');

// Location Routes
Route::get('/kenya', [HomeController::class, 'kenya'])->name('kenya');
Route::get('/usa', [HomeController::class, 'usa'])->name('usa');
Route::get('/africa', [HomeController::class, 'africa'])->name('africa');

Route::post('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');
Route::get('/unsubscribe', [SubscriptionController::class, 'unsubscribePage'])->name('unsubscribe');
Route::post('/unsubscribe/process', [SubscriptionController::class, 'unsubscribe'])->name('unsubscribe.process');
Route::post('/check-subscription', [SubscriptionController::class, 'checkStatus'])->name('check.subscription');
// Debug: All menus
Route::get('/debug-menus', function() {
    $allMenus = \App\Models\Menu::all();
    $headerMenus = \App\Models\Menu::where('position', 'header')
        ->where('is_active', 1)
        ->where('parent_id', 0)
        ->get();
    
    return [
        'all_menus_count' => $allMenus->count(),
        'all_menus' => $allMenus->toArray(),
        'header_menus_count' => $headerMenus->count(),
        'header_menus' => $headerMenus->toArray(),
    ];
});

// Debug: Menu structure
Route::get('/debug-menu-structure', function() {
    $menus = \App\Models\Menu::where('position', 'header')
        ->where('is_active', 1)
        ->orderBy('display_order')
        ->get();
    
    $mainItems = $menus->where('parent_id', 0)->values();
    $subItems = $menus->where('parent_id', '>', 0)->groupBy('parent_id');
    
    $structure = [];
    foreach ($mainItems as $main) {
        $item = [
            'id' => $main->id,
            'label' => $main->label,
            'url' => $main->url,
            'display_order' => $main->display_order,
            'children' => []
        ];
        
        if (isset($subItems[$main->id])) {
            foreach ($subItems[$main->id] as $child) {
                $item['children'][] = [
                    'id' => $child->id,
                    'label' => $child->label,
                    'url' => $child->url,
                    'display_order' => $child->display_order,
                ];
            }
        }
        $structure[] = $item;
    }
    
    return [
        'total_menus' => $menus->count(),
        'main_count' => $mainItems->count(),
        'sub_count' => $menus->where('parent_id', '>', 0)->count(),
        'structure' => $structure,
    ];
});

// Debug: Header menus
Route::get('/debug-header-menus', function() {
    $headerMenus = \App\Models\Menu::where('position', 'header')
        ->where('is_active', 1)
        ->orderBy('display_order')
        ->get();
    
    return response()->json([
        'count' => $headerMenus->count(),
        'menus' => $headerMenus->map(function($menu) {
            return [
                'id' => $menu->id,
                'label' => $menu->label,
                'url' => $menu->url,
                'parent_id' => $menu->parent_id,
                'display_order' => $menu->display_order,
                'is_active' => $menu->is_active,
                'menu_type' => $menu->menu_type,
            ];
        })
    ]);
});
Route::get('/discovery', [BookingController::class, 'index'])->name('book');
// Debug: Submenus
Route::get('/debug-submenus', function() {
    $menus = \App\Models\Menu::where('position', 'header')
        ->where('is_active', 1)
        ->get();
    
    $mainItems = $menus->where('parent_id', 0);
    $subItems = $menus->where('parent_id', '>', 0);
    
    $result = [];
    foreach ($mainItems as $main) {
        $children = $subItems->where('parent_id', $main->id);
        $result[] = [
            'parent' => [
                'id' => $main->id,
                'label' => $main->label,
                'url' => $main->url,
            ],
            'children_count' => $children->count(),
            'children' => $children->map(function($child) {
                return [
                    'id' => $child->id,
                    'label' => $child->label,
                    'url' => $child->url,
                ];
            })->values()
        ];
    }
    
    return $result;
});

// Debug: Test email
Route::get('/test-email', function() {
    try {
        $data = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone' => '+254 700 000 000',
            'subject' => 'Test Email',
            'message' => 'This is a test email from Sofel Labs.'
        ];
        
        Mail::to('mcjey103@gmail.com')->send(new \App\Mail\ContactMail($data));
        
        return '✅ Email sent successfully!';
    } catch (\Exception $e) {
        return '❌ Error: ' . $e->getMessage();
    }
});

// ============================================ -->
// GEMINI AI TEST ROUTE -->
// ============================================ -->
Route::get('/test-gemini', function() {
    try {
        $gemini = new GeminiService();
        
        // Test connection
        if (!$gemini->testConnection()) {
            return response()->json([
                'success' => false,
                'error' => 'Cannot connect to Gemini API. Please check your API key.'
            ], 500);
        }

        // Generate text
        $response = $gemini->generateText(
            "Say 'Hello! Gemini AI is working perfectly with Sofel Labs.'"
        );

        return response()->json([
            'success' => true,
            'message' => 'Gemini is working!',
            'response' => $response
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'error' => $e->getMessage()
        ], 500);
    }
});