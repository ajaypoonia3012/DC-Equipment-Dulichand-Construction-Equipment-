<?php

namespace Database\Seeders;

use App\Models\SeoMeta;
use Illuminate\Database\Seeder;

class SeoMetaSeeder extends Seeder
{
    public function run(): void
    {
        $metas = [
            [
                'page_slug' => 'home',
                'page_name' => 'Home Page',
                'title' => 'DC Equipment Jaipur | Construction Equipment Spares & DCP Construction Chemicals Rajasthan',
                'description' => 'Established in 2016 in Jaipur, Dulichand Construction Equipment (DC Equipment) provides high-performance batching plant parts, concrete pump spares, transit mixer rebuilds, and authorized DCP construction chemicals across Rajasthan.',
                'keywords' => 'construction equipment spares jaipur, dcp construction chemicals rajasthan, batching plant parts ajmer road, concrete pump wear plates jaipur, transit mixer drum repair rajasthan, pce hyperplasticisers jaipur, hydraulic pumps jaipur',
                'canonical_url' => url('/'),
                'og_title' => 'DC Equipment | Heavy Construction Machinery Spares & DCP Chemicals Jaipur',
                'og_description' => 'Rajasthan\'s trusted distributor for concrete pumps, transit mixer drums, batching plant spares, and DCP high-performance construction chemicals.',
            ],
            [
                'page_slug' => 'about',
                'page_name' => 'About Us',
                'title' => 'About DC Equipment | Premier Construction Solutions in Jaipur Since 2016',
                'description' => 'Learn about Dulichand Construction Equipment (DC Equipment), established in 2016 by Director Jitender Singh in Jaipur. Specialized engineering facility and stockist for major infrastructure leaders across Rajasthan.',
                'keywords' => 'about dc equipment, dulichand construction equipment jaipur, jitender singh director, upasana 1st avenue ajmer road jaipur, construction equipment supplier rajasthan',
                'canonical_url' => url('/about'),
                'og_title' => 'About DC Equipment - Heavy Machinery Engineering & DCP Dealership Jaipur',
                'og_description' => 'Founded in 2016 in Jaipur, delivering precision engineering, wear spares, and chemical solutions for India\'s largest infrastructure builders.',
            ],
            [
                'page_slug' => 'products',
                'page_name' => 'Equipment & Machinery Spares',
                'title' => 'Construction Equipment Spares Jaipur | Batching Plants, Pumps, Mixers & Hydraulics',
                'description' => 'Explore our complete inventory of batching plant wear liners, tungsten carbide wear plates, concrete pump pipes, transit mixer spiral drums, and Rexroth hydraulic pumps with immediate delivery from Jaipur.',
                'keywords' => 'construction equipment spares jaipur, batching plant parts ajmer road, concrete pump spectacle plate jaipur, s-valve tube rajasthan, transit mixer gearbox, delivery pipes 125mm rajasthan',
                'canonical_url' => url('/products'),
                'og_title' => 'Heavy Construction Equipment & Wear Spares Inventory | DC Equipment Jaipur',
                'og_description' => 'High-wear replacement parts for batching plants, concrete pumps, boom placers, and transit mixers in stock at Jaipur.',
            ],
            [
                'page_slug' => 'chemicals',
                'page_name' => 'DCP Construction Chemicals',
                'title' => 'DCP Construction Chemicals Rajasthan | Hyperplasticisers, Waterproofing, Grouts & Hardeners',
                'description' => 'Authorized distributor for DCP (Don Construction Products) in Rajasthan. High-early strength PCE hyperplasticisers, polyurethane waterproofing, non-shrink precision grouts, and industrial flooring hardeners in Jaipur.',
                'keywords' => 'dcp construction chemicals rajasthan, pce hyperplasticisers jaipur, structuro 335 dcp, concrete admixtures jaipur, non shrink grout rajasthan, floor hardener ajmer road, aquathane waterproofing',
                'canonical_url' => url('/chemicals'),
                'og_title' => 'DCP Construction Chemical Solutions Rajasthan | DC Equipment',
                'og_description' => 'Official Don Construction Products (DCP) solutions for RMC plants, precast yards, and industrial infrastructure in Rajasthan.',
            ],
            [
                'page_slug' => 'services',
                'page_name' => 'Engineering Services & Workshop',
                'title' => 'Transit Mixer Drum Rebuild & Concrete Pump Repair Jaipur | DC Equipment Services',
                'description' => 'Specialized workshop services in Jaipur: Hardox spiral drum relining, S-valve and rock valve re-manufacturing, hydraulic pump testing, PLC automation, refurbished machinery sales, and rental fleet support.',
                'keywords' => 'transit mixer drum repair rajasthan, concrete pump servicing jaipur, hydraulic cylinder rebuild ajmer road, refurbished concrete pump jaipur, mixer rental fleet rajasthan',
                'canonical_url' => url('/services'),
                'og_title' => 'Industrial Workshop & On-Site Field Services | DC Equipment Jaipur',
                'og_description' => 'Expert drum flight re-lining, sub-assembly overhauls, on-site diagnostics, and rental support across Rajasthan.',
            ],
            [
                'page_slug' => 'projects',
                'page_name' => 'Projects & Client References',
                'title' => 'Client References & Major Projects Rajasthan | MEIL, JK Lakshmi, KEC | DC Equipment',
                'description' => 'See how DC Equipment supports top infrastructure leaders like MEIL, JK Lakshmi Cement, KEC International, ZIP Enterprises, and Montecarlo across national highway, water grid, and power projects.',
                'keywords' => 'meil rajasthan contractor supplier, jk lakshmi cement spares, kec international jaipur, montecarlo expressway contractor spares rajasthan',
                'canonical_url' => url('/projects'),
                'og_title' => 'Trusted by India\'s Infrastructure Leaders | DC Equipment Client Portfolio',
                'og_description' => 'Proven track record of supplying heavy concrete equipment spares and chemical admixtures for marquee projects across Rajasthan.',
            ],
            [
                'page_slug' => 'contact',
                'page_name' => 'Contact Us & Quote',
                'title' => 'Contact DC Equipment Jaipur | Request a Quote | Ajmer Road Office',
                'description' => 'Contact DC Equipment at Upasana 1st Avenue, Ajmer Road, Jaipur. Call +91 86969 62600 or submit an online request for equipment spares, DCP chemicals, or workshop service quotes.',
                'keywords' => 'dc equipment contact number, dulichand construction equipment ajmer road, construction spares jaipur contact, dcp chemicals supplier phone number jaipur',
                'canonical_url' => url('/contact'),
                'og_title' => 'Get in Touch with DC Equipment - Jaipur HQ & Workshop',
                'og_description' => 'Reach our technical sales and 24/7 emergency support team in Jaipur for fast quotations and site delivery.',
            ],
        ];

        foreach ($metas as $metaData) {
            SeoMeta::updateOrCreate(['page_slug' => $metaData['page_slug']], $metaData);
        }
    }
}
