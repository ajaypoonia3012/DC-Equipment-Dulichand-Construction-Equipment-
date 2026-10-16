<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            [
                'title' => 'Top 5 Concrete Pump Spare Parts to Prevent Site Downtime in Rajasthan Summers',
                'slug' => 'top-5-concrete-pump-spare-parts-prevent-site-downtime-rajasthan-summers',
                'excerpt' => 'When Rajasthan summer temperatures spike past 45°C, concrete pumps experience extreme thermal stress, rapid seal degradation, and accelerated pipe wear. Discover the 5 vital replacement parts your site needs.',
                'content' => '<h2>Overcoming Extreme Thermal Stress on Ready-Mix Pumping Lines</h2>
<p>Rajasthan summers regularly record ambient temperatures exceeding 45°C, with hot desert winds across Jaipur, Barmer, Jodhpur, and Bikaner accelerating concrete hydration. For infrastructure contractors executing continuous slab casting or bridge pier construction, equipment breakdown during peak ambient heat results in catastrophic cold joints and massive financial losses.</p>

<h3>1. Tungsten Carbide Cutting Rings and Spectacle Wear Plates</h3>
<p>Under soaring temperatures, the friction between high-slump concrete aggregates and the S-valve face escalates rapidly. Standard manganese plates lose hardness and warp, compromising the seal. We recommend high-grade tungsten carbide wear plates with brazed alloy rings. At DC Equipment, our hardened wear plates offer service lifespans exceeding 25,000 m³ under harsh Rajasthan river-sand conditions.</p>

<h3>2. Polyurethane Twin-Lip Ram Pistons</h3>
<p>Heat weakens low-grade rubber ram cups, allowing cement slurry to leak past the washbox into the hydraulic cylinders. Premium cast polyurethane pistons retain elasticity up to 90°C, ensuring tight pressure containment and preventing hydraulic contamination.</p>

<h3>3. Twin-Wall Hardened Delivery Pipes & Heavy-Duty Couplings</h3>
<p>Thermal expansion combined with abrasive M-sand creates high frictional resistance inside boom pipelines. Single-wall pipes often rupture under sudden pump surges. Twin-wall induction-hardened delivery pipes (hardness up to 62-65 HRC) eliminate blowout risks on high-rise and highway bridge projects.</p>

<h3>4. S-Valve Spline Shafts & Bronze Bushings</h3>
<p>Grease thins out in extreme summer heat, causing premature scoring on spline shafts and bronze sleeve bearings. Installing high-viscosity centralized greasing systems paired with machined phosphor-bronze bushings ensures frictionless valve shifting even during 12-hour continuous concrete pours.</p>

<h3>5. High-Pressure Hydraulic Filter Cartridges</h3>
<p>Thermal breakdown of hydraulic fluid generates micro-varnish and silt that clogs proportional valves. Regular replacement with 10-micron glass-fiber elements protects the main Rexroth or Kawasaki hydraulic pumps from catastrophic seizure.</p>

<blockquote><p><strong>Pro-Tip from DC Equipment Engineers:</strong> Always keep a complete emergency wear plate kit, piston ram set, and hydraulic seal pack at your batching plant or pump station to prevent downtime during hot afternoon shifts.</p></blockquote>',
                'image' => 'https://images.unsplash.com/photo-1513828583688-c52646db42da?auto=format&fit=crop&w=1200&q=80',
                'gallery' => [
                    'https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&w=800&q=80',
                    'https://images.unsplash.com/photo-1581093588401-fbb62a02f120?auto=format&fit=crop&w=800&q=80',
                ],
                'author' => 'Er. Jitender Singh | Senior Service Engineer',
                'meta_title' => 'Top 5 Concrete Pump Spare Parts in Rajasthan Summers | DC Equipment',
                'meta_description' => 'Prevent concrete pump breakdowns in Rajasthan summers. Essential guide on spectacle plates, polyurethane pistons, delivery pipelines, and S-valves in Jaipur.',
                'meta_keywords' => 'concrete pump spares jaipur, spectacle wear plate rajasthan, polyurethane piston ram, s valve spares, concrete pipeline ajmer road',
                'is_published' => true,
                'published_at' => now()->subDays(12),
            ],
            [
                'title' => 'Why Third-Generation PCE Hyperplasticisers Are Essential for Ready-Mix Concrete in Jaipur',
                'slug' => 'why-third-generation-pce-hyperplasticisers-essential-ready-mix-concrete-jaipur',
                'excerpt' => 'Extended transit mixer haulage times across Jaipur ring roads demand superior slump retention without excessive water-cement ratios. Discover why DCP polycarboxylate ether admixtures are revolutionizing RMC.',
                'content' => '<h2>The Science of Extended Slump Retention in Arid Climates</h2>
<p>Ready-Mix Concrete (RMC) producers across the Jaipur urban agglomeration—from Sitapura Industrial Area to Bagru, Mahindra SEZ, and Vishwakarma (VKIA)—face major logistics hurdles. Heavy highway traffic, coupled with soaring daytime heat, causes un-admixed concrete to lose up to 50% of its initial workability within 30 minutes of batching.</p>

<h3>Limitations of Traditional SNF Admixtures</h3>
<p>First and second-generation admixtures based on Sulfonated Naphthalene Formaldehyde (SNF) rely purely on electrostatic repulsion to disperse cement grains. While effective at the batching point, their dispersing effect drops drastically after 45 minutes, tempting drivers to add site-water, which drastically drops compressive strength and causes durability failures.</p>

<h3>The Steric Hindrance Advantage of DCP Flocrete PCE</h3>
<p>Third-generation Polycarboxylate Ether (PCE) hyperplasticisers utilize long polymer side-chains that generate powerful <em>steric hindrance</em>. This mechanism physically prevents cement particles from flocculating and agglomerating, delivering extraordinary benefits:</p>
<ul>
    <li><strong>Up to 35% Water Reduction:</strong> Achieve high-early compressive strengths (M40, M50, and M60 grades) while keeping water-binder ratios below 0.36.</li>
    <li><strong>Up to 120-Minute Workability Retention:</strong> Transit mixers can navigate Jaipur highway traffic and deliver self-compacting, flowing concrete without workability loss.</li>
    <li><strong>Exceptional Cohesion & Zero Segregation:</strong> Prevents bleeding and aggregate settlement during high-pressure pumping through boom placers.</li>
</ul>

<h3>Cost Optimization for Batching Plants</h3>
<p>By optimizing the dosage of DCP Flocrete PC series, commercial ready-mix operators can reduce total cement content by 15-20 kg/m³ while maintaining or exceeding 28-day target cube strengths. DC Equipment provides on-site laboratory trial mix testing and automated dispensing systems across Rajasthan.</p>',
                'image' => 'https://images.unsplash.com/photo-1532187863486-abf9dbad1b69?auto=format&fit=crop&w=1200&q=80',
                'gallery' => [
                    'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=800&q=80',
                ],
                'author' => 'Dr. R. K. Sharma | Concrete Technologist',
                'meta_title' => 'PCE Hyperplasticisers for RMC Concrete in Jaipur | DCP Rajasthan',
                'meta_description' => 'Learn how 3rd-generation PCE admixtures deliver 120-minute slump retention and 35% water reduction for RMC plants in Jaipur. Available at DC Equipment.',
                'meta_keywords' => 'pce hyperplasticiser jaipur, dcp flocrete rajasthan, ready mix concrete admixtures, slump retention admixture, concrete chemicals ajmer road',
                'is_published' => true,
                'published_at' => now()->subDays(6),
            ],
            [
                'title' => 'Transit Mixer Drum Refurbishment vs. Full Replacement: Cost & Lifespan Analysis',
                'slug' => 'transit-mixer-drum-refurbishment-vs-full-replacement-cost-lifespan-analysis',
                'excerpt' => 'When mixer drum spirals wear thin and internal mixing efficiency deteriorates, fleet managers face a crucial choice. Here is our engineering breakdown of re-blading vs. new barrel fabrication.',
                'content' => '<h2>Managing Transit Mixer Fleet Maintenance Costs in Rajasthan</h2>
<p>In heavy infrastructure and commercial batching operations, transit mixers undergo intense abrasive wear from coarse quartz aggregate and manufactured sand. Over 2 to 3 years of continuous operation, internal mixing blades and the drum shell wear down from an initial 4.5mm thickness to under 2mm, leading to poor batch uniformity, concrete hardening, and drum puncture.</p>

<h3>Option 1: Complete Drum Re-Blading & Shell Sectioning</h3>
<p>Refurbishment involves dismounting the drum, grit-blasting internal surfaces, plasma-cutting worn spiral blades, and welding new high-tensile wear-resistant flights (HARDOX 400 or equivalent manganese-silicon alloy) with continuous robot-grade seams.</p>
<ul>
    <li><strong>Turnaround Time:</strong> 3 to 5 days at our Jaipur workshop.</li>
    <li><strong>Capital Expenditure:</strong> Only 30% to 35% of the cost of a brand-new drum assembly.</li>
    <li><strong>Added Service Life:</strong> 18 to 24 months (approximately 15,000 m³ of concrete payload).</li>
</ul>

<h3>Option 2: Brand-New Drum Barrel Replacement</h3>
<p>When the main roller ring has developed micro-cracks, or the shell cone has distorted beyond factory concentricity limits, complete barrel replacement is required. DC Equipment stocks and fabricates complete 6m³, 7m³, and 8m³ mixer drums equipped with precision forged rings and gear reducer adaptors.</p>
<ul>
    <li><strong>Turnaround Time:</strong> Same-day dispatch from our Jaipur stockyard.</li>
    <li><strong>Capital Expenditure:</strong> 100% of standard unit cost.</li>
    <li><strong>Service Life:</strong> 4 to 6 years with OEM factory warranty.</li>
</ul>

<h3>Comparative Decision Matrix</h3>
<table style="width: 100%; border-collapse: collapse; margin-top: 1rem; margin-bottom: 1rem;">
    <thead>
        <tr style="background: #1e293b; color: #ffffff;">
            <th style="padding: 10px; border: 1px solid #334155;">Metric</th>
            <th style="padding: 10px; border: 1px solid #334155;">In-Shop Refurbishment</th>
            <th style="padding: 10px; border: 1px solid #334155;">Full Assembly Replacement</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="padding: 10px; border: 1px solid #e2e8f0;"><strong>Cost Factor</strong></td>
            <td style="padding: 10px; border: 1px solid #e2e8f0;">₹1.2L - ₹1.8L (Significant savings)</td>
            <td style="padding: 10px; border: 1px solid #e2e8f0;">₹4.2L - ₹5.5L (Full asset renewal)</td>
        </tr>
        <tr>
            <td style="padding: 10px; border: 1px solid #e2e8f0;"><strong>Down Time</strong></td>
            <td style="padding: 10px; border: 1px solid #e2e8f0;">3-5 Days</td>
            <td style="padding: 10px; border: 1px solid #e2e8f0;">1-2 Days (Direct drop-in)</td>
        </tr>
        <tr>
            <td style="padding: 10px; border: 1px solid #e2e8f0;"><strong>Mixing Efficiency</strong></td>
            <td style="padding: 10px; border: 1px solid #e2e8f0;">95% of OEM standard</td>
            <td style="padding: 10px; border: 1px solid #e2e8f0;">100% OEM standard</td>
        </tr>
    </tbody>
</table>

<p>Contact DC Equipment\'s specialized heavy machinery overhaul facility on Ajmer Road, Jaipur to schedule an on-site ultrasound shell thickness audit for your transit mixer fleet.</p>',
                'image' => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=1200&q=80',
                'gallery' => [
                    'https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&w=800&q=80',
                ],
                'author' => 'Technical Operations Desk | DC Equipment',
                'meta_title' => 'Transit Mixer Drum Refurbishment vs Replacement Jaipur | DC Equipment',
                'meta_description' => 'Cost and lifespan comparison between transit mixer drum re-blading and replacement in Rajasthan. Expert machinery overhaul at DC Equipment Jaipur.',
                'meta_keywords' => 'transit mixer drum refurbishment, mixer spiral blades jaipur, concrete transit mixer repair rajasthan, mixer roller ring replacement',
                'is_published' => true,
                'published_at' => now()->subDays(2),
            ],
        ];

        foreach ($posts as $post) {
            Blog::updateOrCreate(
                ['slug' => $post['slug']],
                $post
            );
        }
    }
}
