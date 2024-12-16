<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Experience;
use App\Models\Facts;
use App\Models\Images;
use App\Models\Links;
use App\Models\PersonalDetails;
use App\Models\Policy;
use App\Models\Skills;
use App\Models\Testimonial;
use App\Models\Visitor;
use App\Services\TwilioService;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent as Agent;
use Illuminate\Routing\Controller as BaseController;

class ResumeController extends BaseController
{
    public function index(Request $request)
    {
        $agent = new Agent();
        $insert = array(
            "ip" => $request->ip(),
            "browser" => $request->userAgent(),
            "os" => $agent->platform(),
            "device" => $agent->device(),
        );
        Visitor::createIfNotExists($insert);
        $personalDetails = PersonalDetails::where("pdStatus", "!=", "0")->pluck("pdValue", "pdTitle")->all();
        $images = Images::where("imgStatus", "!=", "0")->pluck("imgFile", "imgTitle")->all();
        $links = Links::where("linkStatus", "!=", "0")->orderBy("linkDownload", "asc")->get();
        $facts = Facts::all();
        $skills = Skills::all();
        $education = Education::orderBy("eduEndDate", "desc")->get();
        $experience = Experience::orderBy("expEndDate", "desc")->get();
        $testimonials = Testimonial::all();
        return view('resume-new', compact('personalDetails', 'images', 'links', 'facts', 'skills', 'education', 'experience', 'testimonials'));
    }

    public function privacyPolicy(Request $request)
    {
        $agent = new Agent();
        $insert = array(
            "ip" => $request->ip(),
            "browser" => $request->userAgent(),
            "os" => $agent->platform(),
            "device" => $agent->device(),
        );
        Visitor::createIfNotExists($insert);
        $personalDetails = PersonalDetails::where("pdStatus", "!=", "0")->pluck("pdValue", "pdTitle")->all();
        $images = Images::where("imgStatus", "!=", "0")->pluck("imgFile", "imgTitle")->all();
        $links = Links::where("linkStatus", "!=", "0")->orderBy("linkDownload", "asc")->get();
        $policy = $this->getPolicyData("Privacy Policy");
        $policyContent = $this->renderJson($policy->policyDescription);

        return view('policy', compact('personalDetails', 'images', 'links', 'policy', 'policyContent'));
    }
    
    public function turmsConditions(Request $request)
    {
        $agent = new Agent();
        $insert = array(
            "ip" => $request->ip(),
            "browser" => $request->userAgent(),
            "os" => $agent->platform(),
            "device" => $agent->device(),
        );
        Visitor::createIfNotExists($insert);
        $personalDetails = PersonalDetails::where("pdStatus", "!=", "0")->pluck("pdValue", "pdTitle")->all();
        $images = Images::where("imgStatus", "!=", "0")->pluck("imgFile", "imgTitle")->all();
        $links = Links::where("linkStatus", "!=", "0")->orderBy("linkDownload", "asc")->get();
        $policy = $this->getPolicyData("Turms And Conditions");
        $policyContent = $this->renderJson($policy->policyDescription);

        return view('policy', compact('personalDetails', 'images', 'links', 'policy', 'policyContent'));
    }

    public function refundPolicy(Request $request)
    {
        $agent = new Agent();
        $insert = array(
            "ip" => $request->ip(),
            "browser" => $request->userAgent(),
            "os" => $agent->platform(),
            "device" => $agent->device(),
        );
        Visitor::createIfNotExists($insert);
        $personalDetails = PersonalDetails::where("pdStatus", "!=", "0")->pluck("pdValue", "pdTitle")->all();
        $images = Images::where("imgStatus", "!=", "0")->pluck("imgFile", "imgTitle")->all();
        $links = Links::where("linkStatus", "!=", "0")->orderBy("linkDownload", "asc")->get();
        $policy = $this->getPolicyData("Refund and Cancellation Policy");
        $policyContent = $this->renderJson($policy->policyDescription);

        return view('policy', compact('personalDetails', 'images', 'links', 'policy', 'policyContent'));
    }

    private function getPolicyData($policyName)
    {
        $policy = Policy::where('policyName', $policyName)
            ->where('policyStatus', '1')
            ->firstOrFail();

        return $policy;
    }

    private function renderJson(array $data): string
    {
        $html = '<ul>'; // Use ordered list for structure
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                // Check if value is an associative or numeric array
                if (array_keys($value) === range(0, count($value) - 1)) {
                    // Numeric array (render as list items)
                    $html .= '<ul>';
                    foreach ($value as $item) {
                        $html .= '<li>' . (is_array($item) ? $this->renderJson($item) : htmlspecialchars($item)) . '</li>';
                    }
                    $html .= '</ul>';
                } else {
                    // Associative array (render as key-value pair)
                    $html .= '<li><strong>' . ucfirst(str_replace('_', ' ', $key)) . ':</strong> ' . $this->renderJson($value) . '</li>';
                }
            } else {
                // Render plain text
                $html .= '<li><strong>' . ucfirst(str_replace('_', ' ', $key)) . ':</strong> ' . htmlspecialchars($value) . '</li>';
            }
        }
        $html .= '</ul>';
        return $html;
    }
}
