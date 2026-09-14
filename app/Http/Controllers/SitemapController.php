<?php

namespace App\Http\Controllers;

use App\Data\InsightData;
use App\Data\ProjectData;
use App\Data\ServiceData;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $urls = [
            [
                'loc' => route('home'),
                'lastmod' => date('Y-m-d'),
                'changefreq' => 'weekly',
                'priority' => '1.0',
            ],
            [
                'loc' => route('projects.index'),
                'lastmod' => date('Y-m-d'),
                'changefreq' => 'weekly',
                'priority' => '0.9',
            ],
            [
                'loc' => route('services.index'),
                'lastmod' => date('Y-m-d'),
                'changefreq' => 'monthly',
                'priority' => '0.9',
            ],
            [
                'loc' => route('process'),
                'lastmod' => date('Y-m-d'),
                'changefreq' => 'monthly',
                'priority' => '0.8',
            ],
            [
                'loc' => route('about'),
                'lastmod' => date('Y-m-d'),
                'changefreq' => 'monthly',
                'priority' => '0.8',
            ],
            [
                'loc' => route('contact'),
                'lastmod' => date('Y-m-d'),
                'changefreq' => 'monthly',
                'priority' => '0.9',
            ],
            [
                'loc' => route('insights.index'),
                'lastmod' => date('Y-m-d'),
                'changefreq' => 'weekly',
                'priority' => '0.7',
            ],
        ];

        // Add Project URLs
        foreach (ProjectData::all() as $project) {
            $urls[] = [
                'loc' => route('projects.show', $project['slug']),
                'lastmod' => date('Y-m-d'),
                'changefreq' => 'monthly',
                'priority' => '0.8',
                'image' => asset($project['cover_image']),
                'image_title' => $project['title'],
            ];
        }

        // Add Service URLs
        foreach (ServiceData::all() as $service) {
            $urls[] = [
                'loc' => route('services.show', $service['slug']),
                'lastmod' => date('Y-m-d'),
                'changefreq' => 'monthly',
                'priority' => '0.8',
                'image' => asset($service['image']),
                'image_title' => $service['title'],
            ];
        }

        // Add Insight URLs
        foreach (InsightData::all() as $insight) {
            $urls[] = [
                'loc' => route('insights.show', $insight['slug']),
                'lastmod' => date('Y-m-d'),
                'changefreq' => 'monthly',
                'priority' => '0.7',
                'image' => asset($insight['cover_image']),
                'image_title' => $insight['title'],
            ];
        }

        $xml = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">'."\n";

        foreach ($urls as $url) {
            $xml .= "  <url>\n";
            $xml .= "    <loc>{$url['loc']}</loc>\n";
            $xml .= "    <lastmod>{$url['lastmod']}</lastmod>\n";
            $xml .= "    <changefreq>{$url['changefreq']}</changefreq>\n";
            $xml .= "    <priority>{$url['priority']}</priority>\n";
            if (isset($url['image'])) {
                $xml .= "    <image:image>\n";
                $xml .= "      <image:loc>{$url['image']}</image:loc>\n";
                $xml .= '      <image:title>'.htmlspecialchars($url['image_title'])."</image:title>\n";
                $xml .= "    </image:image>\n";
            }
            $xml .= "  </url>\n";
        }

        $xml .= '</urlset>';

        return response($xml, 200, [
            'Content-Type' => 'application/xml',
            'X-Robots-Tag' => 'noindex',
        ]);
    }
}
