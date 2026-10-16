<?php

namespace Database\Seeders;

use App\Models\CompanySetting;
use Illuminate\Database\Seeder;

class CompanySettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // General Info
            ['key' => 'company_name', 'group' => 'general', 'label' => 'Company Name', 'value' => 'DC Equipment (Dulichand Construction Equipment)', 'type' => 'text'],
            ['key' => 'company_tagline', 'group' => 'general', 'label' => 'Tagline', 'value' => 'Reliable Heavy Machinery Spares & High-Performance DCP Construction Chemicals', 'type' => 'text'],
            ['key' => 'established_year', 'group' => 'general', 'label' => 'Established Year', 'value' => '2016', 'type' => 'text'],
            ['key' => 'director_name', 'group' => 'general', 'label' => 'Director Name', 'value' => 'Jitender Singh', 'type' => 'text'],
            ['key' => 'about_short', 'group' => 'general', 'label' => 'Short Bio', 'value' => 'Established in 2016 in Jaipur, Dulichand Construction Equipment (DC Equipment) is Rajasthan\'s premier distributor and service engineering partner for concrete machinery, transit mixer spares, hydraulic systems, and DCP high-performance construction chemicals.', 'type' => 'textarea'],
            
            // Contact & Local Business
            ['key' => 'address_line1', 'group' => 'contact', 'label' => 'Address Line 1', 'value' => 'Upasana 1st Avenue, Ajmer Road', 'type' => 'text'],
            ['key' => 'city', 'group' => 'contact', 'label' => 'City', 'value' => 'Jaipur', 'type' => 'text'],
            ['key' => 'state', 'group' => 'contact', 'label' => 'State', 'value' => 'Rajasthan', 'type' => 'text'],
            ['key' => 'pincode', 'group' => 'contact', 'label' => 'Pincode', 'value' => '302006', 'type' => 'text'],
            ['key' => 'country', 'group' => 'contact', 'label' => 'Country', 'value' => 'India', 'type' => 'text'],
            ['key' => 'phone_primary', 'group' => 'contact', 'label' => 'Primary Phone', 'value' => '+91 86969 62600', 'type' => 'phone'],
            ['key' => 'phone_secondary', 'group' => 'contact', 'label' => 'Secondary Phone / WhatsApp', 'value' => '+91 86969 62600', 'type' => 'phone'],
            ['key' => 'email_primary', 'group' => 'contact', 'label' => 'Primary Email', 'value' => 'info@dcequipment.in', 'type' => 'email'],
            ['key' => 'email_sales', 'group' => 'contact', 'label' => 'Sales Email', 'value' => 'sales@dcequipment.in', 'type' => 'email'],
            ['key' => 'google_maps_embed', 'group' => 'contact', 'label' => 'Google Maps Embed URL', 'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3558.4239824619!2d75.76018!3d26.88934!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396db4530263c915%3A0xc023c02d1a3c77eb!2sUpasana%201st%20Avenue%2C%20Ajmer%20Rd%2C%20Sodala%2C%20Jaipur%2C%20Rajasthan%20302006!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin', 'type' => 'text'],
            ['key' => 'google_maps_link', 'group' => 'contact', 'label' => 'Google Maps Link', 'value' => 'https://maps.google.com/?q=Upasana+1st+Avenue,+Ajmer+Road,+Sodala,+Jaipur,+Rajasthan+302006', 'type' => 'text'],
            
            // Statistics / Key Metrics
            ['key' => 'stat_experience_years', 'group' => 'stats', 'label' => 'Years of Operational Excellence', 'value' => '8+', 'type' => 'text'],
            ['key' => 'stat_clients_served', 'group' => 'stats', 'label' => 'Satisfied Enterprise Clients', 'value' => '250+', 'type' => 'text'],
            ['key' => 'stat_parts_stocked', 'group' => 'stats', 'label' => 'Ready OEM Spares in Stock', 'value' => '1,500+', 'type' => 'text'],
            ['key' => 'stat_pumps_serviced', 'group' => 'stats', 'label' => 'Concrete Pumps & Mixers Serviced', 'value' => '420+', 'type' => 'text'],

            // Partnership
            ['key' => 'partner_brand_name', 'group' => 'general', 'label' => 'Principal Chemical Partner', 'value' => 'DCP (Don Construction Products)', 'type' => 'text'],

            // Branding (Logo, Favicon)
            ['key' => 'site_logo_light', 'group' => 'branding', 'label' => 'Site Logo (Light Background - Header)', 'value' => null, 'type' => 'image'],
            ['key' => 'site_logo_dark', 'group' => 'branding', 'label' => 'Site Logo (Dark Background - Footer)', 'value' => null, 'type' => 'image'],
            ['key' => 'site_favicon', 'group' => 'branding', 'label' => 'Browser Favicon (.ico / .png)', 'value' => null, 'type' => 'image'],

            // Google Analytics 4 (GA4)
            ['key' => 'google_analytics_id', 'group' => 'analytics', 'label' => 'Google Analytics 4 Measurement ID', 'value' => 'G-DCEQUIPMENT', 'type' => 'text'],

            // Social Media API Credentials
            ['key' => 'gbp_location_id', 'group' => 'social_api', 'label' => 'Google Business Profile Location ID', 'value' => 'locations/1726354829103948', 'type' => 'text'],
            ['key' => 'gbp_access_token', 'group' => 'social_api', 'label' => 'Google Business Profile OAuth Token', 'value' => null, 'type' => 'textarea'],
            ['key' => 'facebook_page_id', 'group' => 'social_api', 'label' => 'Facebook Page ID', 'value' => '109283746501928', 'type' => 'text'],
            ['key' => 'facebook_access_token', 'group' => 'social_api', 'label' => 'Facebook Graph API Access Token', 'value' => null, 'type' => 'textarea'],
            ['key' => 'instagram_account_id', 'group' => 'social_api', 'label' => 'Instagram Business Account ID', 'value' => '17841400293847291', 'type' => 'text'],
            ['key' => 'instagram_access_token', 'group' => 'social_api', 'label' => 'Instagram Graph API Access Token', 'value' => null, 'type' => 'textarea'],
            ['key' => 'linkedin_organization_urn', 'group' => 'social_api', 'label' => 'LinkedIn Organization URN', 'value' => 'urn:li:organization:98234710', 'type' => 'text'],
            ['key' => 'linkedin_access_token', 'group' => 'social_api', 'label' => 'LinkedIn OAuth2 Access Token', 'value' => null, 'type' => 'textarea'],
        ];

        foreach ($settings as $setting) {
            CompanySetting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
