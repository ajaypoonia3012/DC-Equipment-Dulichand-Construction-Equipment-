<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoryAndProductSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Equipment Categories
        $equipmentCategories = [
            [
                'name' => 'Batching Plants & Spares',
                'slug' => 'batching-plants',
                'type' => 'equipment',
                'description' => 'Heavy-duty replacement spares, mixing arms, wear plates, twin-shaft blades, and pneumatic automation parts for all major batching plants.',
                'icon' => 'cog',
                'sort_order' => 1,
            ],
            [
                'name' => 'Concrete Pumps & Spares',
                'slug' => 'concrete-pumps',
                'type' => 'equipment',
                'description' => 'Stationary and trailer concrete pump components including tungsten carbide wear plates, cutting rings, S-tube valves, and delivery pipelines.',
                'icon' => 'arrow-trending-up',
                'sort_order' => 2,
            ],
            [
                'name' => 'Boom Pumps & Placing Booms',
                'slug' => 'boom-pumps',
                'type' => 'equipment',
                'description' => 'Specialized boom pump hydraulics, slewing gears, high-pressure elbows, flexible end hoses, and proportional radio remote controllers.',
                'icon' => 'cube-transparent',
                'sort_order' => 3,
            ],
            [
                'name' => 'Transit Mixers & Rebuilds',
                'slug' => 'transit-mixers',
                'type' => 'equipment',
                'description' => 'Mixer drum shells, anti-wear spiral flight blades, roller track assemblies, reduction gearboxes, and hydraulic drive pumps.',
                'icon' => 'truck',
                'sort_order' => 4,
            ],
            [
                'name' => 'Hydraulic Systems & Automation',
                'slug' => 'hydraulic-systems',
                'type' => 'equipment',
                'description' => 'Variable displacement axial piston pumps, hydraulic motors, proportional valves, high-pressure filters, and PLC control modules.',
                'icon' => 'wrench-screwdriver',
                'sort_order' => 5,
            ],
        ];

        // 2. Chemical Categories (DCP Dealership)
        $chemicalCategories = [
            [
                'name' => 'Plasticisers & Retarders',
                'slug' => 'plasticisers-retarders',
                'type' => 'chemicals',
                'description' => 'Lignosulfonate and naphthalene-based water reducers engineered for improved concrete workability, pumpability, and controlled setting times in hot climates.',
                'icon' => 'beaker',
                'sort_order' => 10,
            ],
            [
                'name' => 'Hyperplasticisers (PCE Based)',
                'slug' => 'hyperplasticisers-pce',
                'type' => 'chemicals',
                'description' => 'Advanced polycarboxylate ether (PCE) superplasticisers tailored for self-compacting concrete (SCC), high-early-strength precast, and M60+ ready-mix designs.',
                'icon' => 'sparkles',
                'sort_order' => 11,
            ],
            [
                'name' => 'Waterproofing Solutions',
                'slug' => 'waterproofing',
                'type' => 'chemicals',
                'description' => 'Integral waterproofing liquid admixtures, crystalline waterproofing coatings, elastomeric acrylic membranes, and heavy-duty polyurethane elastomeric systems.',
                'icon' => 'shield-check',
                'sort_order' => 12,
            ],
            [
                'name' => 'Precision Non-Shrink Grouts',
                'slug' => 'grouts-anchors',
                'type' => 'chemicals',
                'description' => 'High-strength cementitious and epoxy precision non-shrink grouting compounds for heavy machinery baseplates, bridge bearings, and structural anchor bolts.',
                'icon' => 'bars-3-bottom-left',
                'sort_order' => 13,
            ],
            [
                'name' => 'Structural Repair & Mortars',
                'slug' => 'repair-mortars',
                'type' => 'chemicals',
                'description' => 'Polymer-modified repair mortars, rust inhibitors, fairing coats, and structural epoxy injection resins designed for concrete restoration.',
                'icon' => 'wrench',
                'sort_order' => 14,
            ],
            [
                'name' => 'Industrial Flooring Systems',
                'slug' => 'flooring-systems',
                'type' => 'chemicals',
                'description' => 'Non-metallic and metallic mineral dry-shake floor hardeners, heavy-duty epoxy self-leveling toppings, and polyurethane screeds for industrial floors.',
                'icon' => 'squares-2x2',
                'sort_order' => 15,
            ],
            [
                'name' => 'Construction Sealants & Adhesives',
                'slug' => 'sealants-adhesives',
                'type' => 'chemicals',
                'description' => 'High-performance polysulphide and polyurethane elastomeric joint sealants for expansion joints, runway pavements, and water-retaining structures.',
                'icon' => 'paint-brush',
                'sort_order' => 16,
            ],
        ];

        foreach (array_merge($equipmentCategories, $chemicalCategories) as $catData) {
            $cat = Category::updateOrCreate(['slug' => $catData['slug']], $catData);
        }

        // 3. Populate Concrete Equipment Products
        $batchingCat = Category::where('slug', 'batching-plants')->first();
        $concretePumpCat = Category::where('slug', 'concrete-pumps')->first();
        $boomPumpCat = Category::where('slug', 'boom-pumps')->first();
        $transitMixerCat = Category::where('slug', 'transit-mixers')->first();
        $hydraulicCat = Category::where('slug', 'hydraulic-systems')->first();

        // 4. Populate DCP Chemical Products
        $plasticisersCat = Category::where('slug', 'plasticisers-retarders')->first();
        $hyperplasticisersCat = Category::where('slug', 'hyperplasticisers-pce')->first();
        $waterproofingCat = Category::where('slug', 'waterproofing')->first();
        $groutsCat = Category::where('slug', 'grouts-anchors')->first();
        $repairCat = Category::where('slug', 'repair-mortars')->first();
        $flooringCat = Category::where('slug', 'flooring-systems')->first();
        $sealantsCat = Category::where('slug', 'sealants-adhesives')->first();

        $products = [
            // Batching Plant Products
            [
                'category_id' => $batchingCat->id,
                'name' => 'Twin Shaft Mixer Wear Liners & Blades',
                'slug' => 'twin-shaft-mixer-wear-liners-blades',
                'brand' => 'DC Equipment OEM Spec',
                'sku' => 'DCE-BP-001',
                'short_description' => 'High-chromium alloy Ni-Hard wear tiles and cast steel mixing arms for BHS, Sicoma, and Schwing Stetter compatible twin-shaft mixers.',
                'description' => 'Engineered from ultra-hard Ni-Hard and Chromium-rich white iron alloys (hardness 60-65 HRC), DC Equipment mixing tiles and blades provide 2.5x longer lifespan in harsh abrasive aggregate environments. Precision-cast to exact OEM tolerances for instant drop-in fitment.',
                'specifications' => [
                    'Hardness' => '60 - 65 HRC',
                    'Material Grade' => 'High Chromium Cast Iron (Cr26 / Ni-Hard 4)',
                    'Compatibility' => 'Sicoma MAO/MSO, BHS Sonthofen DKX, Schwing Stetter, Macons',
                    'Bolt Hole Pattern' => 'Countersunk precision CNC machined',
                    'Wear Life' => 'Over 80,000 m³ of abrasive concrete mixing',
                ],
                'features' => [
                    'Reinforced leading edge for high impact resistance',
                    'Zero clearance blade-to-liner adjustment capability',
                    'Complete assembly kit with high-tensile 10.9 grade countersunk fasteners',
                    'Resistant to aggressive crushed stone sand (M-Sand) abrasion',
                ],
                'applications' => 'Ready-Mix Concrete (RMC) plants, precast beam yards, dam construction batching setups.',
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'category_id' => $batchingCat->id,
                'name' => 'Heavy-Duty Cement Screw Conveyor & Valves',
                'slug' => 'cement-screw-conveyor-valves',
                'brand' => 'DC Equipment Industrial',
                'sku' => 'DCE-BP-002',
                'short_description' => 'Continuous flight cement and fly-ash tubular screw feeders with electric gear motor drive and pneumatic butterfly shut-off valves.',
                'description' => 'DC Equipment tubular screw feeders deliver smooth, consistent delivery of cementitious powders from silos to weighing hoppers. Equipped with maintenance-free intermediate hanger bearings and heavy wall structural pipe.',
                'specifications' => [
                    'Diameter Range' => '168mm, 219mm, 273mm, 323mm',
                    'Throughput Capacity' => '30 to 120 Tonnes / hour',
                    'Drive System' => 'Direct coupled bevel-helical gear motor (IP55)',
                    'Inlet / Outlet Angle' => 'Universal ball-joint adjustable or fixed flange',
                ],
                'features' => [
                    'Splined shaft couplings for rapid servicing',
                    'Double lip grease purge seals on end bearing assemblies',
                    'Integrated inspection hatches under each intermediate hanger',
                ],
                'applications' => 'Cement silos, fly-ash conveying, GGBS feeding in concrete production plants.',
                'is_featured' => false,
                'sort_order' => 2,
            ],

            // Concrete Pump Products
            [
                'category_id' => $concretePumpCat->id,
                'name' => 'Tungsten Carbide Spectacle Wear Plate & Cutting Ring',
                'slug' => 'tungsten-carbide-spectacle-wear-plate-cutting-ring',
                'brand' => 'DC Equipment Premium',
                'sku' => 'DCE-CP-101',
                'short_description' => 'Hardfaced Tungsten Carbide insert spectacle plates and auto-adjusting cutting rings for high-pressure stationary and trailer concrete pumps.',
                'description' => 'Manufactured with high-purity Tungsten Carbide inlay strips brazed to quenched structural steel base plates. Designed to withstand continuous operating pressures up to 130 bar without chipping or micro-cracking.',
                'specifications' => [
                    'Hardfacing Alloy' => 'Cobalt-bonded Tungsten Carbide (WC-Co)',
                    'Plate Base Steel' => 'Hardened 42CrMo Alloy Steel',
                    'Working Pressure Rating' => 'Up to 130 bar concrete pressure',
                    'Compatibility' => 'Putzmeister BSA/BRF series, Schwing SP/BP series, Sany, Zoomlion',
                    'Expected Service Life' => '35,000 - 55,000 m³ depending on aggregate abrasive index',
                ],
                'features' => [
                    'Tungsten carbide hardness reaches 88-90 HRA',
                    'Double-sided reversible design on selected models',
                    'Precision polished mating surface for air-tight seal against slurry leakage',
                    'Direct replacement without modifying hopper swing lever linkage',
                ],
                'applications' => 'High-rise tower pumping, deep basement raft concreting, long-distance infrastructure pipelines.',
                'is_featured' => true,
                'sort_order' => 3,
            ],
            [
                'category_id' => $concretePumpCat->id,
                'name' => 'Heavy-Wall Induction Hardened Delivery Pipeline & Clamps',
                'slug' => 'induction-hardened-delivery-pipeline-clamps',
                'brand' => 'DC Equipment Heavy Line',
                'sku' => 'DCE-CP-102',
                'short_description' => 'Twin-wall and single-wall 125mm (5-inch) induction hardened concrete delivery pipes, 90° elbows, snap clamps, and metric rubber O-rings.',
                'description' => 'Inner wall hardened to 60-65 HRC through computer-controlled medium-frequency induction heat treatment, while outer wall retains exceptional ductile elasticity to prevent catastrophic bursting under pressure surges.',
                'specifications' => [
                    'Diameter' => 'DN125 (5.5" collar / SK / ZX connection)',
                    'Wall Thickness' => '4.5mm single wall / 2.5mm + 2.0mm twin wall',
                    'Flange Type' => 'Forged induction hardened 148mm weld-on flanges',
                    'Burst Pressure' => 'Over 220 bar',
                ],
                'features' => [
                    'Standard 3-meter pipe sections and custom short lengths',
                    'Heavy-duty drop-forged snap clamp couplings with safety locking pins',
                    'Oil & abrasion resistant high-density polyurethane sealing gaskets',
                ],
                'applications' => 'Bridge deck concreting, metro viaduct casting, high-rise pipeline riser lines.',
                'is_featured' => true,
                'sort_order' => 4,
            ],

            // Boom Pump Products
            [
                'category_id' => $boomPumpCat->id,
                'name' => 'High-Pressure Slewing Ring & Proportional Hydraulic Valves',
                'slug' => 'slewing-ring-proportional-valves-boom-pump',
                'brand' => 'DC Equipment Precision',
                'sku' => 'DCE-BM-201',
                'short_description' => 'Zero-backlash internal gear slewing bearings and HAWE / Rexroth proportional control valves for 36m to 52m concrete boom pumps.',
                'description' => 'Precision-ground induction hardened gear teeth with high dynamic load ratings ensure rock-solid stability for long placing booms under heavy windy site conditions.',
                'specifications' => [
                    'Gear Tooth Hardening' => 'Induction contour hardened 55-60 HRC',
                    'Hydraulic Control' => 'HAWE PSL / Rexroth M4 proportional spool blocks',
                    'Radio Interface' => 'CAN-bus compatible wireless joystick transmitter',
                ],
                'features' => [
                    'Sealed roller raceways with synthetic EP grease filling',
                    'Smooth micro-metering boom arm control',
                    'Factory calibrated emergency manual override levers',
                ],
                'applications' => 'Truck-mounted boom pumps, stationary placing booms on high-rise central cores.',
                'is_featured' => false,
                'sort_order' => 5,
            ],

            // Transit Mixer Products
            [
                'category_id' => $transitMixerCat->id,
                'name' => 'Transit Mixer Replacement Drum & Hardox Spiral Flight Blades',
                'slug' => 'transit-mixer-replacement-drum-spiral-blades',
                'brand' => 'DC Equipment Fabrication',
                'sku' => 'DCE-TM-301',
                'short_description' => 'Complete replacement mixer drum shells (6m³, 7m³, 8m³, 9m³) rolled from 4.5mm high-yield wear plate with Hardox spiral edge protection.',
                'description' => 'Fabricated at our specialized Jaipur workshop using automated submerged arc welding (SAW) and high-tensile anti-abrasion steel. Complete with precision dual-logarithmic spiral flight blades for ultra-fast discharge without segregation.',
                'specifications' => [
                    'Drum Capacity' => '6 m³, 7 m³, 8 m³, 9 m³ geometric volumes',
                    'Drum Shell Material' => 'Q345B / Hardox 400 wear-resistant steel (4.5mm thickness)',
                    'Blade Edge' => 'Reinforced with 6mm thick anti-wear capping strip',
                    'Chassis Compatibility' => 'Tata Prima, Ashok Leyland, BharatBenz, Eicher, AMW',
                    'Discharge Speed' => 'Up to 1.8 m³ / minute for slump > 80mm',
                ],
                'features' => [
                    'Dynamic roller track ring forged in a single seamless piece without butt joints',
                    'Double log spiral blades minimize residual concrete build-up in drum bottom',
                    'Precision balanced on heavy lathe rollers before primer and poly-urethane finishing',
                ],
                'applications' => 'Ready-Mix concrete transit fleets, highway paving projects, commercial RMC logistics.',
                'is_featured' => true,
                'sort_order' => 6,
            ],
            [
                'category_id' => $transitMixerCat->id,
                'name' => 'Transit Mixer Planetary Speed Reducer (Gearbox)',
                'slug' => 'transit-mixer-planetary-speed-reducer-gearbox',
                'brand' => 'PMP / ZF / DC Equipment',
                'sku' => 'DCE-TM-302',
                'short_description' => 'Direct replacement heavy-duty planetary gearboxes (PMP PMB 6, ZF PLM 9, Sauer Danfoss 51.2) for transit mixer drum drives.',
                'description' => 'Heavy-duty multi-stage planetary gear reduction units capable of delivering peak torque up to 75,000 Nm with integrated heavy-duty spherical roller output bearings.',
                'specifications' => [
                    'Max Output Torque' => '65,000 - 75,000 Nm',
                    'Reduction Ratio' => '1:100 to 1:130',
                    'Flange Mounting' => 'Standard universal 4-bolt or 8-bolt drum flange',
                    'Oil Capacity' => '12.5 Liters EP 85W-140 synthetic gear oil',
                ],
                'features' => [
                    'High shock-load capacity carburized case-hardened planet gears',
                    'Integrated water-tight mechanical face seals',
                    'Includes oil level sight glass and magnetic drain plug',
                ],
                'applications' => 'RMC fleet maintenance, drum drive powertrain retrofits.',
                'is_featured' => false,
                'sort_order' => 7,
            ],

            // Hydraulic Systems Products
            [
                'category_id' => $hydraulicCat->id,
                'name' => 'Variable Displacement Axial Piston Pump A4VG / A11VLO',
                'slug' => 'variable-displacement-axial-piston-pump-a4vg-a11vlo',
                'brand' => 'Rexroth / Sauer / DC Equipment OEM',
                'sku' => 'DCE-HY-401',
                'short_description' => 'Closed-loop and open-loop swashplate axial piston pumps for transit mixer drum rotation and concrete pump main hydraulic circuits.',
                'description' => 'High pressure hydraulic pumps built for continuous 350 bar duty cycles with peak 400 bar intermittent rating. Equipped with mechanical or electrical displacement control.',
                'specifications' => [
                    'Displacement' => '71cc, 90cc, 125cc, 145cc, 190cc / rev',
                    'Max Operating Pressure' => '350 bar nominal / 420 bar peak',
                    'Input Speed' => 'Up to 2,600 RPM',
                    'Shaft Type' => 'Splined DIN 5480 or ANSI keyed shaft',
                ],
                'features' => [
                    'Integrated charge pump and high-pressure relief valves',
                    'Bi-directional flow control for smooth drum reversing',
                    'Heavy-duty tapered roller swashplate bearings for 15,000+ operating hours',
                ],
                'applications' => 'Concrete pump drive systems, transit mixer hydraulic circuits, batching plant aggregate bins.',
                'is_featured' => true,
                'sort_order' => 8,
            ],

            // DCP Construction Chemicals Products
            [
                'category_id' => $hyperplasticisersCat->id,
                'name' => 'DCP Structuro 335 - High Performance PCE Hyperplasticiser',
                'slug' => 'dcp-structuro-335-pce-hyperplasticiser',
                'brand' => 'DCP (Don Construction Products)',
                'sku' => 'DCP-HYP-01',
                'short_description' => 'Third-generation polycarboxylate ether (PCE) superplasticiser for high-early-strength, self-compacting, and ultra-high-grade concrete.',
                'description' => 'DCP Structuro 335 is an innovative high-range water-reducing admixture based on tailored comb-structure synthetic polymers. Enables up to 35% water reduction while maintaining extended slump retention for ready-mix concrete transported over long distances across Rajasthan summers.',
                'specifications' => [
                    'Chemical Base' => 'Modified Polycarboxylate Ether (PCE)',
                    'Appearance' => 'Light brown liquid',
                    'Specific Gravity' => '1.09 ± 0.02 at 25°C',
                    'Chloride Content' => 'Chloride-free to BS 5075 / EN 934-2 / IS 9103',
                    'Dosage Range' => '0.5 to 1.8 liters per 100 kg of cementitious material',
                ],
                'features' => [
                    'Drastically reduces water-cement ratio while enhancing workability',
                    'Improves early compressive strength (24-hour demoulding turnaround)',
                    'Superior cohesion preventing bleeding, segregation, and honeycombing',
                    'Fully compatible with fly ash, micro silica, and GGBS blended cements',
                ],
                'applications' => 'Precast segment manufacturing, metro viaduct girders, heavily reinforced columns, high-rise pumped concrete.',
                'is_featured' => true,
                'sort_order' => 9,
            ],
            [
                'category_id' => $hyperplasticisersCat->id,
                'name' => 'DCP Structuro 450 - Extended Slump Retention Admixture',
                'slug' => 'dcp-structuro-450-extended-slump',
                'brand' => 'DCP (Don Construction Products)',
                'sku' => 'DCP-HYP-02',
                'short_description' => 'Specialized PCE superplasticiser designed specifically for high ambient temperatures and transit times up to 3+ hours without slump loss.',
                'description' => 'Engineered for extreme desert and tropical temperatures, Structuro 450 prevents flash setting and preserves rheology in hot weather concreting across Rajasthan highway and industrial construction corridors.',
                'specifications' => [
                    'Form' => 'Liquid admixture',
                    'pH' => '6.0 - 8.0',
                    'Standards Compliance' => 'ASTM C494 Type F & G, IS 9103:1999',
                    'Slump Retention' => 'Retains 180mm+ slump for up to 180 minutes at 40°C',
                ],
                'features' => [
                    'Eliminates need for site re-tempering with water which degrades concrete strength',
                    'Smooth pumping through stationary lines exceeding 300 meters height',
                    'Provides flawless, void-free architectural concrete surface finish',
                ],
                'applications' => 'Ready-mix batching plants, highway pavements, airport runways, long-haul mixer deliveries.',
                'is_featured' => true,
                'sort_order' => 10,
            ],
            [
                'category_id' => $plasticisersCat->id,
                'name' => 'DCP Flocrete N & Flocrete SP - High-Range Water Reducer',
                'slug' => 'dcp-flocrete-water-reducing-plasticiser',
                'brand' => 'DCP (Don Construction Products)',
                'sku' => 'DCP-PLA-01',
                'short_description' => 'Economical modified lignosulfonate and naphthalene-based water reducing and retarding plasticisers for general site concrete.',
                'description' => 'Flocrete series provides consistent water reduction between 15% to 22%, increasing both 7-day and 28-day concrete strength while optimizing cement consumption per cubic meter.',
                'specifications' => [
                    'Base' => 'Refined Naphthalene Sulphonate Formaldehyde (SNF)',
                    'Specific Gravity' => '1.18 - 1.22 at 25°C',
                    'Color' => 'Dark brown aqueous solution',
                    'Dosage' => '0.6 - 1.5% by weight of cement',
                ],
                'features' => [
                    'Cost-effective solution for structural foundations and floor slabs',
                    'Reduces permeability and drying shrinkage cracking',
                    'Improves surface hardness and pumpability of standard M20 to M40 grades',
                ],
                'applications' => 'Commercial buildings, residential developments, canal lining, pavement works.',
                'is_featured' => false,
                'sort_order' => 11,
            ],
            [
                'category_id' => $waterproofingCat->id,
                'name' => 'DCP Aquathane PU - Single Component Polyurethane Membrane',
                'slug' => 'dcp-aquathane-pu-waterproofing-membrane',
                'brand' => 'DCP (Don Construction Products)',
                'sku' => 'DCP-WAT-01',
                'short_description' => 'Elastomeric pitch-free liquid applied moisture-cured pure polyurethane waterproofing membrane for terraces, podiums, and basements.',
                'description' => 'DCP Aquathane PU cures upon exposure to atmospheric moisture to form a tough, seamless, rubber-like elastomeric membrane with crack-bridging capability exceeding 2mm.',
                'specifications' => [
                    'Elongation at Break' => '> 600% (ASTM D412)',
                    'Tensile Strength' => '> 4.5 N/mm²',
                    'Shore A Hardness' => '65',
                    'Crack Bridging Ability' => 'Up to 2.5mm crack movement',
                    'Service Temperature' => '-20°C to +80°C',
                ],
                'features' => [
                    'Seamless continuous barrier with zero joints or laps',
                    'UV resistant formulation suitable for exposed roofs and planter boxes',
                    'Resistant to standing water and root penetration',
                    'Excellent adhesion to concrete, brick, mortar, and metal substrates',
                ],
                'applications' => 'Building terraces, podium parking decks, swimming pools, retaining walls, wet areas.',
                'is_featured' => true,
                'sort_order' => 12,
            ],
            [
                'category_id' => $waterproofingCat->id,
                'name' => 'DCP Cemence IWP - Integral Liquid Waterproofing Admixture',
                'slug' => 'dcp-cemence-iwp-integral-waterproofing',
                'brand' => 'DCP (Don Construction Products)',
                'sku' => 'DCP-WAT-02',
                'short_description' => 'Chloride-free water reducing and pore-blocking liquid admixture for plastering, structural concrete, and masonry mortars.',
                'description' => 'Penetrates the capillary matrix of concrete to block internal void networks, drastically reducing water absorption and preventing efflorescence and dampness.',
                'specifications' => [
                    'Standard' => 'IS 2645-2003 & IS 9103',
                    'Dosage' => '200ml per 50kg bag of cement',
                    'Chloride Content' => 'Nil',
                    'Permeability Reduction' => 'Over 60% compared to control mix',
                ],
                'features' => [
                    'Easy dispensing directly into batching mixing water',
                    'Reduces rebound loss during plaster application',
                    'Protects structural steel reinforcement from corrosion induced by chlorides',
                ],
                'applications' => 'Basement retaining walls, water tanks, roof screeds, external facade plasters.',
                'is_featured' => false,
                'sort_order' => 13,
            ],
            [
                'category_id' => $groutsCat->id,
                'name' => 'DCP Quickmast & Cemscreed Non-Shrink Precision Grouts',
                'slug' => 'dcp-precision-non-shrink-grout-cemscreed',
                'brand' => 'DCP (Don Construction Products)',
                'sku' => 'DCP-GRT-01',
                'short_description' => 'Free-flowing cementitious and heavy-duty three-component epoxy non-shrink grouts delivering up to 80 N/mm² ultimate strength.',
                'description' => 'Formulated with controlled positive expansion additives to eliminate plastic and drying shrinkage. Yields extreme early and ultimate compressive strength for heavy vibrating machinery and wind turbine foundations.',
                'specifications' => [
                    'Compressive Strength (1 Day)' => '> 25 N/mm²',
                    'Compressive Strength (28 Days)' => '> 75 - 85 N/mm²',
                    'Expansion' => '0.5% - 2.0% positive expansion',
                    'Flowability' => 'Effortless placement under 10mm to 100mm baseplate gaps',
                ],
                'features' => [
                    'Non-metallic, chloride-free, non-staining',
                    'Resistant to industrial oils, chemicals, and dynamic shock loads',
                    'Pre-packaged factory dry blend requiring only on-site clean water addition',
                ],
                'applications' => 'Generator beds, turbine mountings, crane rails, precast column grouting, bridge bearing pads.',
                'is_featured' => true,
                'sort_order' => 14,
            ],
            [
                'category_id' => $repairCat->id,
                'name' => 'DCP Cemrepair 25 / 40 - Structural Polymer Repair Mortar',
                'slug' => 'dcp-cemrepair-structural-repair-mortar',
                'brand' => 'DCP (Don Construction Products)',
                'sku' => 'DCP-REP-01',
                'short_description' => 'Fibre-reinforced polymer modified cementitious mortar for structural restoration of honeycombed, spalled, and carbonated concrete.',
                'description' => 'Contains synthetic polypropylene microfibres and active corrosion inhibitors. Excellent bond strength to prepared substrate, matching thermal expansion characteristics of high-strength concrete.',
                'specifications' => [
                    'Compressive Strength' => '> 45 N/mm² at 28 days',
                    'Flexural Strength' => '> 7.5 N/mm²',
                    'Application Thickness' => '10mm to 50mm in single vertical layer',
                    'Adhesion to Concrete' => '> 2.0 N/mm² (substrate failure)',
                ],
                'features' => [
                    'Zero sag on vertical and overhead applications',
                    'Extremely low permeability against CO2 and airborne chloride penetration',
                    'Pre-blended consistency ensures uniform site performance',
                ],
                'applications' => 'Bridge piers, damaged precast beams, marine structures, structural column retrofits.',
                'is_featured' => false,
                'sort_order' => 15,
            ],
            [
                'category_id' => $flooringCat->id,
                'name' => 'DCP Setseal & Strongcoat Heavy-Duty Industrial Floor Hardeners',
                'slug' => 'dcp-setseal-strongcoat-industrial-flooring',
                'brand' => 'DCP (Don Construction Products)',
                'sku' => 'DCP-FLR-01',
                'short_description' => 'Monolithic non-metallic quartz dry-shake floor surface hardeners and solvent-free epoxy resin floor coatings for logistics warehouses.',
                'description' => 'Sprinkled onto freshly floated concrete floors and machine power-trowelled to integrate seamlessly. Creates an abrasion-resistant, dustproof, spark-resistant surface capable of handling continuous forklift traffic.',
                'specifications' => [
                    'Abrasion Resistance' => '300% improvement over untreated M25 concrete (Böhme test)',
                    'Mohs Hardness' => '7 to 8',
                    'Colors Available' => 'Natural Concrete Grey, Tile Red, Light Green, Industrial Yellow',
                    'Application Rate' => '3.5 kg to 5.0 kg / m²',
                ],
                'features' => [
                    'Resistant to oils, fuels, grease, and industrial detergent washdowns',
                    'Prevents dusting and concrete surface breakdown under heavy wheel loads',
                    'Seamless finish with easy maintenance and light reflectivity',
                ],
                'applications' => 'Heavy engineering workshops, RMC batching control yards, pharmaceutical warehouses, aircraft hangars.',
                'is_featured' => true,
                'sort_order' => 16,
            ],
            [
                'category_id' => $sealantsCat->id,
                'name' => 'DCP Polyseal 1PU & 2PS - Polysulphide & PU Joint Sealants',
                'slug' => 'dcp-polyseal-elastomeric-joint-sealants',
                'brand' => 'DCP (Don Construction Products)',
                'sku' => 'DCP-SEA-01',
                'short_description' => 'High movement capability gun-grade and pourable elastomeric sealants for concrete expansion joints, roads, and water structures.',
                'description' => 'Accommodates cyclical thermal movement up to ±25% without loss of adhesion or tearing. High resistance to weathering, ozone, aircraft fuel spills, and microbiological attack.',
                'specifications' => [
                    'Movement Capability' => '±25% of joint width',
                    'Service Temperature' => '-30°C to +80°C',
                    'Chemical Resistance' => 'Resistant to dilute acids, alkalis, petrol, diesel, and hydraulic oils',
                    'Standard' => 'BS 4254, BS 5212 Type N, F & FB, ASTM C920',
                ],
                'features' => [
                    'Pourable grade for horizontal concrete pavement contraction joints',
                    'Gun-grade non-slump formulation for vertical building expansion joints',
                    'Maintains elasticity and elongation throughout multi-season thermal cycles',
                ],
                'applications' => 'Highway concrete pavements, bridge deck expansion joints, water treatment reservoirs, retaining walls.',
                'is_featured' => false,
                'sort_order' => 17,
            ],
        ];

        foreach ($products as $pData) {
            Product::updateOrCreate(['slug' => $pData['slug']], $pData);
        }
    }
}
