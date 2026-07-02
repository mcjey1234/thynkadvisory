<?php

namespace App\Services;

use App\Models\AboutUs;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\Milestone;
use App\Models\Process;
use App\Models\Banner;
use App\Models\FooterItem;
use App\Models\Menu;
use App\Models\Setting; // Create this model
use Illuminate\Support\Facades\Cache;

class KnowledgeBaseService
{
    public function getFullContext()
    {
        // Cache the knowledge base to avoid repeated DB queries
        return Cache::remember('knowledge_base', 3600, function() {
            $context = [];
            
            // About Us
            $about = AboutUs::where('is_active', true)->first();
            if ($about) {
                $context['about'] = [
                    'title' => $about->title ?? 'About Thynk Advisory',
                    'subtitle' => $about->subtitle ?? '',
                    'description' => $about->description ?? '',
                    'mission' => $about->mission ?? '',
                    'vision' => $about->vision ?? '',
                    'values' => $about->about_values ?? '',
                ];
            }
            
            // Services
            $services = Service::active()->ordered()->get();
            if ($services->count() > 0) {
                $context['services'] = $services->map(function($service) {
                    return [
                        'title' => $service->title,
                        'description' => $service->description,
                        'icon' => $service->icon,
                    ];
                })->toArray();
            }
            
            // Team Members
            $team = TeamMember::active()->get();
            if ($team->count() > 0) {
                $context['team'] = $team->map(function($member) {
                    return [
                        'name' => $member->name,
                        'position' => $member->position,
                        'bio' => $member->bio,
                        'description' => $member->description,
                        'email' => $member->email,
                        'phone' => $member->phone,
                        'linkedin' => $member->linkedin,
                    ];
                })->toArray();
            }
            
            // Processes
            $processes = Process::active()->ordered()->get();
            if ($processes->count() > 0) {
                $context['process'] = $processes->map(function($process) {
                    return [
                        'step' => $process->step_number,
                        'title' => $process->title,
                        'description' => $process->description,
                        'icon' => $process->icon,
                    ];
                })->toArray();
            }
            
            // Milestones
            $milestones = Milestone::active()->get();
            if ($milestones->count() > 0) {
                $context['milestones'] = $milestones->map(function($milestone) {
                    return [
                        'year' => $milestone->year,
                        'month' => $milestone->month,
                        'day' => $milestone->day,
                        'title' => $milestone->title,
                        'description' => $milestone->description,
                        'icon' => $milestone->icon,
                    ];
                })->toArray();
            }
            
            // Footer Menus
            $footerMenus = FooterItem::active()->menus()->get();
            if ($footerMenus->count() > 0) {
                $context['footer_menus'] = $footerMenus->map(function($item) {
                    return [
                        'label' => $item->label,
                        'url' => $item->url,
                    ];
                })->toArray();
            }
            
            // Social Links
            $socialLinks = FooterItem::active()->social()->get();
            if ($socialLinks->count() > 0) {
                $context['social_links'] = $socialLinks->map(function($item) {
                    return [
                        'platform' => $item->platform,
                        'label' => $item->label,
                        'url' => $item->url,
                        'icon' => $item->icon,
                    ];
                })->toArray();
            }
            
            // Header Menus
            $headerMenus = Menu::active()->header()->topLevel()->get();
            if ($headerMenus->count() > 0) {
                $context['header_menus'] = $headerMenus->map(function($menu) {
                    $data = [
                        'label' => $menu->label,
                        'url' => $menu->url,
                        'icon' => $menu->icon,
                    ];
                    
                    $children = $menu->children()->get();
                    if ($children->count() > 0) {
                        $data['children'] = $children->map(function($child) {
                            return [
                                'label' => $child->label,
                                'url' => $child->url,
                            ];
                        })->toArray();
                    }
                    
                    return $data;
                })->toArray();
            }
            
            // ============================================
            // COMPANY SETTINGS — ALL FROM DATABASE
            // ============================================
            $context['company'] = $this->getCompanySettings();
            
            // ============================================
            // TOPICS / FAQ — FROM DATABASE OR SETTINGS
            // ============================================
            $context['topics'] = $this->getTopics();
            
            return $context;
        });
    }

    /**
     * Get Company Settings from Database
     */
    private function getCompanySettings()
    {
        // Try to get from settings table
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        
        // Default values if not found in DB
        $defaults = [
            'company_name' => 'Thynk Advisory',
            'company_founded' => '2020',
            'company_location' => 'Nairobi, Kenya',
            'company_phone' => '+254 700 123 456',
            'company_email' => 'info@thynkadvisory.com',
            'company_website' => 'https://thynkadvisory.com',
            'booking_link' => 'https://cal.com/jared-ogutu-swvv6o',
            'calendly_link' => 'https://cal.com/jared-ogutu-swvv6o',
        ];
        
        // Merge defaults with DB settings
        foreach ($defaults as $key => $value) {
            if (!isset($settings[$key]) || empty($settings[$key])) {
                $settings[$key] = $value;
            }
        }
        
        return $settings;
    }

    /**
     * Get Topics from Database or use defaults
     */
    private function getTopics()
    {
        // Try to get topics from settings or a topics table
        $topics = [];
        
        // If you have a Topics model, use it
        // $topicsFromDB = Topic::active()->get();
        // foreach ($topicsFromDB as $topic) {
        //     $topics[$topic->key] = $topic->value;
        // }
        
        // Default topics if not in DB
        if (empty($topics)) {
            $topics = [
                'gamification' => 'We use proven frameworks like Octalysis and our 4-pillar approach (Cognitive, Motivational, Balancing, Presentation) to create engaging learning experiences.',
                'instructional design' => 'We combine proven learning theories with modern technology to create interactive, effective training programs.',
                'compliance training' => 'We transform mandatory training into engaging, memorable experiences that improve knowledge retention.',
                'leadership development' => 'We design programs that build leadership skills through immersive, practical learning experiences.',
                'mobile development' => 'We build native and cross-platform mobile apps for Android and iOS using Flutter, React Native, Kotlin, and Swift.',
                'web development' => 'We build scalable web platforms using React, Laravel, Vue, and Node.js — from MVPs to enterprise-grade systems.',
                'gis' => 'We create interactive maps and spatial data analysis tools using Mapbox, QGIS, PostGIS, and Leaflet.',
                'elearning' => 'We design engaging eLearning experiences with gamification, AI-powered video, and professional course authoring tools.',
            ];
        }
        
        return $topics;
    }

    /**
     * Get Formatted Context for Prompt
     */
    public function getFormattedContext()
    {
        $data = $this->getFullContext();
        
        $formatted = "=== ABOUT THYNK ADVISORY ===\n\n";
        
        if (isset($data['about'])) {
            if (!empty($data['about']['mission'])) {
                $formatted .= "Mission: {$data['about']['mission']}\n";
            }
            if (!empty($data['about']['vision'])) {
                $formatted .= "Vision: {$data['about']['vision']}\n";
            }
            if (!empty($data['about']['description'])) {
                $formatted .= "About: {$data['about']['description']}\n";
            }
            if (!empty($data['about']['values'])) {
                $formatted .= "Values: {$data['about']['values']}\n";
            }
        }
        $formatted .= "\n";
        
        $formatted .= "=== OUR SERVICES ===\n\n";
        if (isset($data['services']) && count($data['services']) > 0) {
            foreach ($data['services'] as $service) {
                $formatted .= "- {$service['title']}";
                if (!empty($service['description'])) {
                    $formatted .= ": {$service['description']}";
                }
                $formatted .= "\n";
            }
        }
        $formatted .= "\n";
        
        $formatted .= "=== HOW WE WORK ===\n\n";
        if (isset($data['process']) && count($data['process']) > 0) {
            foreach ($data['process'] as $step) {
                $formatted .= "Step {$step['step']}: {$step['title']} - {$step['description']}\n";
            }
        }
        $formatted .= "\n";
        
        $formatted .= "=== OUR TEAM ===\n\n";
        if (isset($data['team']) && count($data['team']) > 0) {
            foreach ($data['team'] as $member) {
                $formatted .= "- {$member['name']}: {$member['position']}\n";
                if (!empty($member['bio'])) {
                    $formatted .= "  Skills: {$member['bio']}\n";
                }
                if (!empty($member['description'])) {
                    $formatted .= "  About: {$member['description']}\n";
                }
            }
        }
        $formatted .= "\n";
        
        $formatted .= "=== CONTACT & BOOKING ===\n\n";
        $company = $data['company'] ?? [];
        $formatted .= "Location: " . ($company['company_location'] ?? 'Nairobi, Kenya') . "\n";
        $formatted .= "Phone: " . ($company['company_phone'] ?? '+254 700 123 456') . "\n";
        $formatted .= "Email: " . ($company['company_email'] ?? 'info@thynkadvisory.com') . "\n";
        $formatted .= "Website: " . ($company['company_website'] ?? 'https://thynkadvisory.com') . "\n";
        $formatted .= "Booking: " . ($company['booking_link'] ?? 'https://cal.com/jared-ogutu-swvv6o') . "\n";
        $formatted .= "\n";
        
        $formatted .= "=== KEY TOPICS ===\n\n";
        if (isset($data['topics'])) {
            foreach ($data['topics'] as $topic => $info) {
                $formatted .= ucfirst($topic) . ": " . $info . "\n";
            }
        }
        
        return $formatted;
    }

    public function getContextForPrompt($message)
    {
        $message = strtolower($message);
        $context = $this->getFullContext();
        $relevant = [];
        
        $keywords = [
            'gamification' => 'gamification',
            'instructional' => 'instructional design',
            'compliance' => 'compliance training',
            'leadership' => 'leadership development',
            'service' => 'services',
            'cost' => 'pricing',
            'price' => 'pricing',
            'team' => 'team',
            'who' => 'team',
            'member' => 'team',
            'process' => 'process',
            'how' => 'process',
            'mission' => 'about',
            'vision' => 'about',
            'about' => 'about',
            'values' => 'about',
            'book' => 'booking',
            'schedule' => 'booking',
            'consult' => 'booking',
            'contact' => 'contact',
            'phone' => 'contact',
            'email' => 'contact',
        ];
        
        foreach ($keywords as $key => $topic) {
            if (str_contains($message, $key)) {
                if ($topic === 'services' && isset($context['services'])) {
                    $relevant['services'] = $context['services'];
                } elseif ($topic === 'team' && isset($context['team'])) {
                    $relevant['team'] = $context['team'];
                } elseif ($topic === 'process' && isset($context['process'])) {
                    $relevant['process'] = $context['process'];
                } elseif ($topic === 'about' && isset($context['about'])) {
                    $relevant['about'] = $context['about'];
                } elseif ($topic === 'booking' && isset($context['company'])) {
                    $relevant['booking'] = $context['company']['booking_link'] ?? 'https://cal.com/jared-ogutu-swvv6o';
                } elseif ($topic === 'contact' && isset($context['company'])) {
                    $relevant['contact'] = [
                        'phone' => $context['company']['company_phone'] ?? '+254 700 123 456',
                        'email' => $context['company']['company_email'] ?? 'info@thynkadvisory.com',
                    ];
                } elseif (isset($context['topics'][$topic])) {
                    $relevant[$topic] = $context['topics'][$topic];
                }
            }
        }
        
        return $relevant;
    }

    public function searchKnowledge($query)
    {
        $query = strtolower($query);
        $context = $this->getFullContext();
        $results = [];
        
        // Search in about
        if (isset($context['about'])) {
            foreach ($context['about'] as $key => $value) {
                if (!empty($value) && str_contains(strtolower($value), $query)) {
                    $results['about'][$key] = $value;
                }
            }
        }
        
        // Search in services
        if (isset($context['services'])) {
            foreach ($context['services'] as $service) {
                if (str_contains(strtolower($service['title']), $query) || 
                    str_contains(strtolower($service['description']), $query)) {
                    $results['services'][] = $service;
                }
            }
        }
        
        // Search in team
        if (isset($context['team'])) {
            foreach ($context['team'] as $member) {
                if (str_contains(strtolower($member['name']), $query) || 
                    str_contains(strtolower($member['position']), $query) ||
                    str_contains(strtolower($member['bio'] ?? ''), $query)) {
                    $results['team'][] = $member;
                }
            }
        }
        
        return $results;
    }

    public function refreshCache()
    {
        Cache::forget('knowledge_base');
        return $this->getFullContext();
    }
}