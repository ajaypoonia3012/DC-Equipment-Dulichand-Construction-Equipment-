<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Emergency Repair & On-Site Inspection',
                'slug' => 'repair-and-inspection',
                'short_description' => '24/7 mobile service engineering teams equipped for on-site diagnostic testing, hydraulic flow troubleshooting, and immediate breakdown repairs across Rajasthan.',
                'description' => 'Unplanned machinery downtime at an active pour is an expensive emergency. DC Equipment operates a dedicated fleet of mobile service vans based out of Jaipur, stocked with critical wear spares, hydraulic flow meters, high-pressure test gauges, and certified heavy-equipment mechanics. We respond rapidly to sites along the Jaipur-Delhi Highway, Ajmer Expressway, and major project corridors throughout Rajasthan.',
                'icon' => 'wrench-screwdriver',
                'features' => [
                    'Hydraulic circuit pressure and relief valve calibration',
                    'Laser alignment of mixer drum rollers and chassis brackets',
                    'Ultrasonic wall thickness measurement of high-pressure delivery pipes',
                    'On-site welding and hardfacing of worn hopper agitators and cutting rings',
                    'Complete multi-point pre-monsoon and project commissioning inspection audit',
                ],
                'benefits' => [
                    'Guaranteed under-4-hour response window for critical concrete batching projects in Greater Jaipur',
                    'Minimizes cold joints and batch waste caused by sudden equipment stalls',
                    'Extends component life through proactive preventative diagnosis',
                ],
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Sub-Assembly & Precision Rebuild Workshop',
                'slug' => 'sub-assembly-rebuild',
                'short_description' => 'Complete factory-standard teardown, honing, re-machining, and dyno-testing of rock valves, S-tubes, hydraulic pumps, and mixer gearboxes.',
                'description' => 'Instead of purchasing costly brand-new assemblies, our Jaipur engineering workshop restores worn core components to original OEM specifications at a fraction of replacement cost. We strip, inspect, replace all internal wear rings, bearings, and dynamic seals, and conduct full pressure-testing prior to redelivery.',
                'icon' => 'cog-6-tooth',
                'features' => [
                    'S-Tube and Rock Valve remanufacturing with tungsten carbide hard-banding',
                    'Hydraulic cylinder rod straightening, hard-chrome plating, and custom seal kits',
                    'Planetary mixer gearbox teardown, bearing pre-load adjustment, and tooth backlash calibration',
                    'Hydraulic axial piston pump (Rexroth / Sauer Danfoss) cartridge rebuild & bench test',
                ],
                'benefits' => [
                    'Saves up to 55% compared to purchasing brand new OEM sub-assemblies',
                    'Backed by DC Equipment 6-Month operational performance warranty',
                    'Fast turnaround using in-house CNC machining and balancing equipment',
                ],
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Mixer Drum Shell & Spiral Flight Re-Lining',
                'slug' => 'drum-and-spiral-work',
                'short_description' => 'Specialized transit mixer drum maintenance including shell patch welding, Hardox 400 wear edge replacement, and new drum fabrication.',
                'description' => 'Over years of hauling abrasive stone aggregate, transit mixer drums lose wall thickness and blade pitch, leading to slower discharge, material segregation, and eventual shell puncture. DC Equipment runs a dedicated drum fabrication bay in Jaipur with automated plate rolling, automated spiral blade pressing, and submerged arc welding.',
                'features' => [
                    'Precision cutting and replacement of worn spiral blades using Hardox 400 wear strips',
                    'Cone section replacement and outer shell relining with high-yield structural steel',
                    'Dynamic drum balancing and roller track trueing to eliminate chassis vibration',
                    'Sandblasting, epoxy primer treatment, and two-pack polyurethane fleet livery painting',
                ],
                'benefits' => [
                    'Restores original discharge speed and eliminates concrete carry-back accumulation',
                    'Prevents catastrophic drum rupture on the road with loaded concrete',
                    'Custom fabrication for all truck chassis (Tata, Ashok Leyland, BharatBenz, Eicher)',
                ],
                'is_featured' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Electrical, PLC & Hydraulic Automation',
                'slug' => 'electrical-hydraulic-automation',
                'short_description' => 'Upgrades, rewiring, and fault-finding for batching plant PLC panels, wireless radio remote controls, and proportional solenoid valves.',
                'description' => 'Modern batching plants and boom pumps rely heavily on integrated micro-controllers and proportional electro-hydraulics. Our automation engineers diagnose intermittent wiring glitches, faulty load cell signals, pneumatic valve manifold failures, and failed proportional amplifiers.',
                'features' => [
                    'Retrofitting and upgrading obsolete batching plant control software and weighing displays',
                    'Troubleshooting CAN-bus communication faults and radio remote transmitter sync',
                    'Calibration of aggregate, cement, water, and chemical admixture load cells',
                    'Dust-proof IP65 electrical enclosure fabrication with surge and spike protection',
                ],
                'benefits' => [
                    'Eliminates erratic batch weighing and ensures strict compliance with MoRTH / IS concrete codes',
                    'Safe, dependable wireless joystick operation for placing boom pump operators',
                ],
                'is_featured' => true,
                'sort_order' => 4,
            ],
            [
                'title' => 'Certified Refurbished Equipment Sales',
                'slug' => 'refurbished-equipment',
                'short_description' => 'Pre-owned stationary concrete pumps, mobile batching plants, and transit mixers rigorously rebuilt, quality-audited, and ready for immediate deployment.',
                'description' => 'When your project requires instant capacity without long OEM manufacturing lead times, DC Equipment offers thoroughly reconditioned machinery. Every unit undergoes complete mechanical, electrical, and hydraulic overhaul with brand new wear plates, hoses, and fluids before being certified.',
                'features' => [
                    '100-Point comprehensive mechanical and structural integrity inspection',
                    'New wear parts, pipelines, seals, hydraulic oils, and high-tensile fasteners fitted',
                    'Full wet concrete test pumping under maximum rated backpressure',
                    'Complete documentation, user manuals, and commissioning handover support',
                ],
                'benefits' => [
                    'Instant mobilization for fast-track highway and dam tenders',
                    'Capital expenditure savings of 40% - 60% with verified working reliability',
                    'Trade-in and buy-back options available for fleet modernization',
                ],
                'is_featured' => true,
                'sort_order' => 5,
            ],
            [
                'title' => 'Machinery Rental Support & Fleet Assistance',
                'slug' => 'rental-support-fleet-assistance',
                'short_description' => 'Short and long-term rental of stationary concrete pumps, pipeline accessories, and mobile transit mixers with skilled technical operators.',
                'description' => 'Need additional pumping capacity for a continuous mass pour or a temporary bridge deck project? DC Equipment provides well-maintained, high-pressure concrete pumps and experienced operators to keep your critical schedule on track across Rajasthan and surrounding states.',
                'features' => [
                    'Flexible rental contracts: daily, monthly, or project-based volume billing',
                    'Complete delivery pipe network packages with elbows, clamps, and rubber hoses',
                    'Certified and safety-trained operators and mechanics stationed on-site',
                    'Standby backup machine provision for uninterrupted monolithic pours',
                ],
                'benefits' => [
                    'Zero long-term capital lockup for single-phase construction contracts',
                    'Full maintenance responsibility handled directly by DC Equipment engineers',
                ],
                'is_featured' => true,
                'sort_order' => 6,
            ],
        ];

        foreach ($services as $srvData) {
            Service::updateOrCreate(['slug' => $srvData['slug']], $srvData);
        }
    }
}
