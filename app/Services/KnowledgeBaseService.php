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
                    'title' => $about->title ?? 'About Sofel Labs',
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
                        'email' => $member->email,
                        'phone' => $member->phone,
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
                        'title' => $milestone->title,
                        'description' => $milestone->description,
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
                    ];
                    
                    // Get children if any
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
            
            // Company Info
            $context['company'] = [
                'name' => 'Sofel Labs',
                'founded' => '2020',
                'location' => 'Nairobi, Kenya',
                'phone' => env('SOFEL_PHONE', '+254 700 123 456'),
                'email' => env('SOFEL_EMAIL', 'info@sofellabs.com'),
                'website' => env('APP_URL', 'https://sofellabs.com'),
                'calendly' => 'https://calendly.com/mwangikamau/consultation',
            ];
            
            // Key topics for quick lookup
            $context['topics'] = [
                'gamification' => 'We use proven frameworks like Octalysis and our 4-pillar approach (Cognitive, Motivational, Balancing, Presentation) to create engaging learning experiences.',
                'instructional design' => 'We combine proven learning theories with modern technology to create interactive, effective training programs.',
                'compliance training' => 'We transform mandatory training into engaging, memorable experiences that improve knowledge retention.',
                'leadership development' => 'We design programs that build leadership skills through immersive, practical learning experiences.',
            ];
            
            return $context;
        });
    }

    public function getFormattedContext()
    {
        $data = $this->getFullContext();
        
        $formatted = "=== ABOUT SOFEL LABS ===\n\n";
        
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
        } else {
            $formatted .= "We offer instructional design, gamification, compliance training, and leadership development services.\n";
        }
        $formatted .= "\n";
        
        $formatted .= "=== HOW WE WORK ===\n\n";
        if (isset($data['process']) && count($data['process']) > 0) {
            foreach ($data['process'] as $step) {
                $formatted .= "Step {$step['step']}: {$step['title']} - {$step['description']}\n";
            }
        } else {
            $formatted .= "We follow a proven process: Discovery & Strategy → Design & Development → Launch & Measure.\n";
        }
        $formatted .= "\n";
        
        $formatted .= "=== OUR TEAM ===\n\n";
        if (isset($data['team']) && count($data['team']) > 0) {
            foreach ($data['team'] as $member) {
                $formatted .= "- {$member['name']}: {$member['position']}\n";
                if (!empty($member['bio'])) {
                    $formatted .= "  {$member['bio']}\n";
                }
            }
        }
        $formatted .= "\n";
        
        $formatted .= "=== COMPANY INFO ===\n\n";
        $formatted .= "Location: {$data['company']['location']}\n";
        $formatted .= "Phone: {$data['company']['phone']}\n";
        $formatted .= "Email: {$data['company']['email']}\n";
        $formatted .= "Website: {$data['company']['website']}\n";
        $formatted .= "Booking: {$data['company']['calendly']}\n\n";
        
        $formatted .= "=== KEY TOPICS ===\n\n";
        if (isset($data['topics'])) {
            foreach ($data['topics'] as $topic => $info) {
                $formatted .= "{$topic}: {$info}\n";
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
            'process' => 'process',
            'how' => 'process',
            'mission' => 'about',
            'vision' => 'about',
            'about' => 'about',
            'values' => 'about',
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
        
        return $results;
    }

    public function refreshCache()
    {
        Cache::forget('knowledge_base');
        return $this->getFullContext();
    }
}
