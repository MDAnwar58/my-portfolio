<?php

namespace App\Http\Controllers;

use App\Models\AppContent;
use App\Models\Skill;
use App\Models\SocialMedia;
use App\Models\Visitor;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Crypt;

class HomeController extends Controller
{
    public function index(Request $request): View
    {
        $deviceInfo = $this->detectDevice($request);
        $deviceToken = $this->generateDeviceToken($request);

        Visitor::firstOrCreate(['device_token' => $deviceToken], [
            'ip' => $request->ip(),
            'device_type' => $deviceInfo['device_type'],
            'device_token' => $deviceToken,
        ]);

        $appContent = AppContent::first();
        $skills = Skill::oldest()->get();
        $works = Work::latest()->get();
        $social_medias = SocialMedia::oldest()->get();

        return view('welcome', compact('appContent', 'skills', 'works', 'social_medias'));
    }
    public function generateDeviceToken($request)
    {
        $userAgent = $request->userAgent();
        $ip = $request->ip();

        // Create a unique token based on device characteristics
        $deviceString = $ip . '|' . $userAgent;

        // Hash it to create a consistent token
        $token = hash('sha256', $deviceString);

        // Or for a shorter token
        $shortToken = substr(hash('sha256', $deviceString), 0, 32);

        return $token;
    }
    public function verifyDeviceToken($request, $storedToken)
    {
        $deviceString = $request->ip() . '|' . $request->userAgent();
        $computedToken = hash('sha256', $deviceString);

        return hash_equals($storedToken, $computedToken);
    }
    public function detectDevice($request)
    {
        $userAgent = $request->userAgent();

        // Default to Desktop (which includes laptops)
        $deviceType = 'Desktop';
        $subDeviceType = 'Desktop/Laptop'; // Both fall under desktop category

        // Mobile detection
        if (preg_match('/(android|webos|iphone|ipod|blackberry|iemobile|opera mini|windows phone|mobile)/i', $userAgent)) {
            $deviceType = 'Mobile';

            // Try to be more specific
            if (preg_match('/android/i', $userAgent)) {
                $subDeviceType = 'Android Phone';
            } elseif (preg_match('/iphone|ipod/i', $userAgent)) {
                $subDeviceType = 'iPhone';
            } elseif (preg_match('/windows phone/i', $userAgent)) {
                $subDeviceType = 'Windows Phone';
            } else {
                $subDeviceType = 'Mobile Device';
            }
        }
        // Tablet detection
        elseif (preg_match('/(tablet|ipad|playbook|silk|kindle|android(?!.*mobile))/i', $userAgent)) {
            $deviceType = 'Tablet';

            if (preg_match('/ipad/i', $userAgent)) {
                $subDeviceType = 'iPad';
            } elseif (preg_match('/android/i', $userAgent)) {
                $subDeviceType = 'Android Tablet';
            } else {
                $subDeviceType = 'Tablet';
            }
        }
        // Try to detect if it's potentially a laptop based on screen size (requires JavaScript)
        // This is just an educated guess based on user agent patterns
        elseif (preg_match('/(windows nt|macintosh|linux|x11|ubuntu|fedora)/i', $userAgent)) {
            // Desktop OS detected
            if (preg_match('/(windows nt|macintosh)/i', $userAgent)) {
                // Most laptops run Windows or macOS
                $subDeviceType = 'Probably Laptop';
            } else {
                $subDeviceType = 'Desktop Computer';
            }
        }

        // Additional checks for bots
        if (preg_match('/(bot|crawler|spider|scraper)/i', $userAgent)) {
            $deviceType = 'Bot';
            $subDeviceType = 'Web Crawler';
        }

        return [
            'ip' => $request->ip(),
            'device_type' => $deviceType,
            'device_subtype' => $subDeviceType,
            'operating_system' => $this->detectOS($userAgent),
            'browser' => $this->detectBrowser($userAgent),
            'user_agent' => $userAgent,
        ];
    }

    // Helper method to detect OS
    // private function detectOS($userAgent)
    // {
    //     $os = 'Unknown OS';

    //     // Windows detection with version
    //     if (preg_match('/windows nt 10\.0/i', $userAgent)) {
    //         // Try to detect Windows 11 vs Windows 10
    //         // Windows 11 has specific build numbers
    //         if (
    //             preg_match('/windows nt 10\.0; win64; x64/i', $userAgent) &&
    //             preg_match('/chrome\/\d+\.\d+\.\d+\.\d+/i', $userAgent)
    //         ) {
    //             // This is an educated guess - Windows 11 often reports Chrome version
    //             // A better approach is to check for Edge/Chrome specific patterns
    //             $os = 'Windows 11';
    //         } else {
    //             $os = 'Windows 10';
    //         }
    //     } elseif (preg_match('/windows nt 6\.3/i', $userAgent)) {
    //         $os = 'Windows 8.1';
    //     } elseif (preg_match('/windows nt 6\.2/i', $userAgent)) {
    //         $os = 'Windows 8';
    //     } elseif (preg_match('/windows nt 6\.1/i', $userAgent)) {
    //         $os = 'Windows 7';
    //     } elseif (preg_match('/windows nt 6\.0/i', $userAgent)) {
    //         $os = 'Windows Vista';
    //     } elseif (preg_match('/windows nt 5\.1/i', $userAgent)) {
    //         $os = 'Windows XP';
    //     } elseif (preg_match('/macintosh|mac os x/i', $userAgent)) {
    //         // Detect macOS versions
    //         if (preg_match('/mac os x 10_15|macos 10\.15|catalina/i', $userAgent)) {
    //             $os = 'macOS Catalina';
    //         } elseif (preg_match('/mac os x 10_14|macos 10\.14|mojave/i', $userAgent)) {
    //             $os = 'macOS Mojave';
    //         } elseif (preg_match('/mac os x 10_13|macos 10\.13|high sierra/i', $userAgent)) {
    //             $os = 'macOS High Sierra';
    //         } elseif (preg_match('/mac os x 10_12|macos 10\.12|sierra/i', $userAgent)) {
    //             $os = 'macOS Sierra';
    //         } else {
    //             $os = 'macOS';
    //         }
    //     } elseif (preg_match('/linux/i', $userAgent)) {
    //         $os = 'Linux';
    //     } elseif (preg_match('/android/i', $userAgent)) {
    //         // Extract Android version if available
    //         if (preg_match('/android (\d+(?:\.\d+)?)/i', $userAgent, $matches)) {
    //             $os = 'Android ' . $matches[1];
    //         } else {
    //             $os = 'Android';
    //         }
    //     } elseif (preg_match('/iphone|ipad|ipod/i', $userAgent)) {
    //         $os = 'iOS';
    //     }

    //     return $os;
    // }
    private function detectOS($userAgent)
    {
        $os = 'Unknown OS';

        if (preg_match('/windows nt 10/i', $userAgent)) {
            $os = 'Windows 10/11';
        } elseif (preg_match('/windows nt 6\.3/i', $userAgent)) {
            $os = 'Windows 8.1';
        } elseif (preg_match('/windows nt 6\.2/i', $userAgent)) {
            $os = 'Windows 8';
        } elseif (preg_match('/windows nt 6\.1/i', $userAgent)) {
            $os = 'Windows 7';
        } elseif (preg_match('/macintosh|mac os x/i', $userAgent)) {
            $os = 'macOS';
        } elseif (preg_match('/linux/i', $userAgent)) {
            $os = 'Linux';
        } elseif (preg_match('/android/i', $userAgent)) {
            $os = 'Android';
        } elseif (preg_match('/iphone|ipad|ipod/i', $userAgent)) {
            $os = 'iOS';
        }

        return $os;
    }

    // Helper method to detect browser
    private function detectBrowser($userAgent)
    {
        $browser = 'Unknown Browser';

        if (preg_match('/edg/i', $userAgent)) {
            $browser = 'Microsoft Edge';
        } elseif (preg_match('/chrome/i', $userAgent)) {
            $browser = 'Google Chrome';
        } elseif (preg_match('/firefox/i', $userAgent)) {
            $browser = 'Mozilla Firefox';
        } elseif (preg_match('/safari/i', $userAgent)) {
            $browser = 'Apple Safari';
        } elseif (preg_match('/opera|opr/i', $userAgent)) {
            $browser = 'Opera';
        } elseif (preg_match('/msie|trident/i', $userAgent)) {
            $browser = 'Internet Explorer';
        }

        return $browser;
    }
}
