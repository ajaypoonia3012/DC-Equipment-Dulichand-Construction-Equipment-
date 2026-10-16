<?php

namespace Database\Seeders;

use App\Models\ClientReference;
use Illuminate\Database\Seeder;

class ClientReferenceSeeder extends Seeder
{
    public function run(): void
    {
        $clients = [
            [
                'name' => 'MEIL - Rajasthan Water Grid & Lift Irrigation Projects',
                'client_name' => 'MEIL (Megha Engineering & Infrastructures Ltd)',
                'sector' => 'Water & Infrastructure',
                'location' => 'Jaipur & Western Rajasthan',
                'scope_supplied' => 'High-pressure concrete pump spares, 125mm delivery lines, and DCP non-shrink precision grouts for heavy turbine pump baseplates.',
                'testimonial' => 'DC Equipment has been our reliable partner for critical pump line accessories and grouting solutions across multi-district water transmission projects in Rajasthan. Their rapid dispatch from Jaipur keeps our shifts running without downtime.',
                'testimonial_author' => 'Project Infrastructure Head, MEIL Rajasthan',
                'logo' => null,
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'JK Lakshmi Cement - Plant Expansion & Raw Material Conveying',
                'client_name' => 'JK Lakshmi Cement',
                'sector' => 'Cement & Heavy Manufacturing',
                'location' => 'Sirohi & Jaipur, Rajasthan',
                'scope_supplied' => 'Twin-shaft wear resistant Ni-Hard blades, heavy-duty screw conveyors, and high-temperature elastomeric expansion joint sealants.',
                'testimonial' => 'Their wear components provide outstanding abrasion resistance under high-velocity clinker and fly-ash handling. DC Equipment’s technical depth in equipment engineering is commendable.',
                'testimonial_author' => 'Chief Maintenance Engineer, JK Lakshmi Cement Works',
                'logo' => null,
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'KEC International - Railway Electrification & Transmission Towers',
                'client_name' => 'KEC International',
                'sector' => 'Power Transmission & Railways',
                'location' => 'Jaipur, Ajmer, & Kota Hubs',
                'scope_supplied' => 'Mobile batching plant weighing load cells, pneumatic valves, and DCP Structuro high-early-strength PCE admixtures for foundation casting.',
                'testimonial' => 'We rely on DC Equipment for both chemical admixtures that deliver 24-hour target strengths and dependable batching plant spare parts.',
                'testimonial_author' => 'Senior Materials Manager, KEC International Ltd',
                'logo' => null,
                'is_featured' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'ZIP Enterprises - Urban Infrastructure & Commercial Developments',
                'client_name' => 'ZIP Enterprises',
                'sector' => 'Commercial Construction & Real Estate',
                'location' => 'Jaipur Metro Zone, Rajasthan',
                'scope_supplied' => 'Transit mixer drum spiral rebuilds, hydraulic motors, and DCP Aquathane polyurethane waterproofing membranes for podium slabs.',
                'testimonial' => 'Excellent service and genuine quality. The drum rebuild workshop in Jaipur saved us substantial budget while delivering brand new performance.',
                'testimonial_author' => 'Director of Projects, ZIP Enterprises',
                'logo' => null,
                'is_featured' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'AG Infra Ventures India - Industrial Flooring & Logistics Parks',
                'client_name' => 'AG Infra Ventures India',
                'sector' => 'Industrial Warehousing & Flooring',
                'location' => 'Jaipur-Delhi Highway Corridor',
                'scope_supplied' => 'DCP Setseal metallic floor hardeners, heavy-duty laser screed equipment parts, and polysulphide joint sealing solutions.',
                'testimonial' => 'For laser-screed floor slabs, DC Equipment provided timely supplies of high-grade dry-shake hardeners and saw-cut joint sealants.',
                'testimonial_author' => 'Project Lead, AG Infra Ventures India',
                'logo' => null,
                'is_featured' => true,
                'sort_order' => 5,
            ],
            [
                'name' => 'OM Metals Infraprojects - Hydroelectric Gates & Dam Works',
                'client_name' => 'OM Metals Infraprojects',
                'sector' => 'Hydro Power & Heavy Fabrication',
                'location' => 'Kota & Southern Rajasthan',
                'scope_supplied' => 'Heavy-duty hydraulic cylinder rebuilding, high-pressure directional control valves, and structural micro-concrete repair mortars.',
                'testimonial' => 'The precision overhaul on our hydraulic cylinders met rigorous hydro engineering safety standards. A trusted Jaipur partner.',
                'testimonial_author' => 'VP Technical, OM Metals Infraprojects',
                'logo' => null,
                'is_featured' => true,
                'sort_order' => 6,
            ],
            [
                'name' => 'Ayoki Fabricon - Heavy Precast Yards & EPC Structures',
                'client_name' => 'Ayoki Fabricon',
                'sector' => 'Industrial EPC & Precast Engineering',
                'location' => 'Rajasthan Industrial Clusters',
                'scope_supplied' => 'Stationary concrete pump wear plates, cutting rings, and DCP high-range superplasticisers for precast segment casting.',
                'testimonial' => 'Their prompt technical support and direct delivery of genuine OEM-compatible wear parts have reduced our unplanned downtimes significantly.',
                'testimonial_author' => 'Equipment Fleet Manager, Ayoki Fabricon',
                'logo' => null,
                'is_featured' => true,
                'sort_order' => 7,
            ],
            [
                'name' => 'Montecarlo Limited - Expressway & Highway Paving Corridors',
                'client_name' => 'Montecarlo Limited',
                'sector' => 'Expressways & Highways',
                'location' => 'Delhi-Mumbai Expressway (Rajasthan Section)',
                'scope_supplied' => 'Transit mixer wear flight blades, Rexroth hydraulic drive pumps, and concrete curing compounds.',
                'testimonial' => 'On fast-paced highway packages, reliability is everything. DC Equipment delivered replacement drums and hydraulic spares within hours of request.',
                'testimonial_author' => 'Regional Plant & Machinery In-Charge, Montecarlo Ltd',
                'logo' => null,
                'is_featured' => true,
                'sort_order' => 8,
            ],
        ];

        foreach ($clients as $clientData) {
            ClientReference::updateOrCreate(['name' => $clientData['name']], $clientData);
        }
    }
}
