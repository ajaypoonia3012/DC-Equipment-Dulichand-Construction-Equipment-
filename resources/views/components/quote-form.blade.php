@props([
    'title' => 'Request an Instant Quotation & Technical Proposal',
    'subtitle' => 'Our technical sales desk in Jaipur responds with specs, availability, and competitive rates within 2 business hours.',
    'defaultType' => 'equipment',
    'defaultProduct' => '',
])

<div x-data="{
    loading: false,
    submitted: false,
    successMessage: '',
    errorMessage: '',
    formData: {
        name: '',
        company_name: '',
        email: '',
        phone: '',
        location: '',
        inquiry_type: '{{ $defaultType }}',
        product_or_service_interest: '{{ $defaultProduct }}',
        message: ''
    },
    async submitForm() {
        this.loading = true;
        this.errorMessage = '';
        try {
            const response = await fetch('{{ route('enquiry.store') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name=\'csrf-token\']').getAttribute('content')
                },
                body: JSON.stringify(this.formData)
            });
            const data = await response.json();
            if (response.ok && data.success) {
                this.submitted = true;
                this.successMessage = data.message;
            } else {
                this.errorMessage = data.message || 'Please check the required fields and try again.';
            }
        } catch (e) {
            this.errorMessage = 'Network error. Please call our Jaipur desk directly at +91 86969 62600.';
        } finally {
            this.loading = false;
        }
    }
}" id="quote-form" class="bg-white rounded-2xl shadow-xl border border-slate-200/80 p-6 sm:p-8 lg:p-10 relative overflow-hidden">

    <!-- Top Accent Bar -->
    <div class="absolute top-0 left-0 right-0 h-2 bg-gradient-to-r from-blue-700 via-amber-500 to-blue-600"></div>

    <div class="mb-6">
        <div class="inline-flex items-center space-x-1.5 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-blue-50 text-blue-700 mb-2">
            <span class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></span>
            <span>Fast-Track Engineering Quote</span>
        </div>
        <h3 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">{{ $title }}</h3>
        <p class="text-slate-600 text-sm mt-1.5 leading-relaxed">{{ $subtitle }}</p>
    </div>

    <!-- Success View -->
    <div x-show="submitted" x-cloak class="py-12 text-center space-y-4">
        <div class="w-16 h-16 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mx-auto shadow-inner">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
        </div>
        <h4 class="text-2xl font-bold text-slate-900">Quotation Request Dispatched!</h4>
        <p class="text-slate-600 max-w-lg mx-auto text-sm leading-relaxed" x-text="successMessage"></p>
        <div class="pt-4 flex flex-wrap justify-center gap-3">
            <a href="tel:+918696962600" class="inline-flex items-center px-5 py-2.5 rounded-lg text-sm font-bold bg-amber-500 text-slate-950 hover:bg-amber-400 shadow-sm transition">
                Call Emergency Desk: +91 86969 62600
            </a>
            <button @click="submitted = false; formData.message = '';" type="button" class="inline-flex items-center px-4 py-2 rounded-lg text-sm font-medium text-slate-700 bg-slate-100 hover:bg-slate-200 transition">
                Submit Another Request
            </button>
        </div>
    </div>

    <!-- Input Form -->
    <form x-show="!submitted" @submit.prevent="submitForm()" class="space-y-4">
        <div x-show="errorMessage" x-cloak class="p-3.5 rounded-lg bg-red-50 text-red-700 border border-red-200 text-xs font-semibold" x-text="errorMessage"></div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Your Full Name <span class="text-red-500">*</span></label>
                <input type="text" x-model="formData.name" required placeholder="e.g. Rajesh Sharma" class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-blue-600 focus:border-transparent text-sm text-slate-900 font-medium placeholder-slate-400 bg-white dark:bg-slate-800 dark:text-white">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Company / Contractor Name</label>
                <input type="text" x-model="formData.company_name" placeholder="e.g. MEIL / RMC Plant / Precast Yard" class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-blue-600 focus:border-transparent text-sm text-slate-900 font-medium placeholder-slate-400 bg-white dark:bg-slate-800 dark:text-white">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Phone / WhatsApp Number <span class="text-red-500">*</span></label>
                <input type="tel" x-model="formData.phone" required placeholder="+91 98765 43210" class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-blue-600 focus:border-transparent text-sm text-slate-900 font-medium placeholder-slate-400 bg-white dark:bg-slate-800 dark:text-white">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Email Address <span class="text-red-500">*</span></label>
                <input type="email" x-model="formData.email" required placeholder="rajesh@example.com" class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-blue-600 focus:border-transparent text-sm text-slate-900 font-medium placeholder-slate-400 bg-white dark:bg-slate-800 dark:text-white">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Division / Category <span class="text-red-500">*</span></label>
                <select x-model="formData.inquiry_type" required class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-blue-600 focus:border-transparent text-sm font-semibold text-slate-900 bg-white dark:bg-slate-800 dark:text-white cursor-pointer shadow-xs">
                    <option value="equipment" class="text-slate-900 bg-white dark:bg-slate-800 dark:text-white font-bold py-2">Concrete Equipment & Spares (Pumps, Mixers, Plants)</option>
                    <option value="chemicals" class="text-slate-900 bg-white dark:bg-slate-800 dark:text-white font-bold py-2">DCP Construction Chemicals (PCE, Waterproofing, Grouts)</option>
                    <option value="repair_service" class="text-slate-900 bg-white dark:bg-slate-800 dark:text-white font-bold py-2">Workshop Rebuild & Field Repair (Drum, S-Valve)</option>
                    <option value="rental" class="text-slate-900 bg-white dark:bg-slate-800 dark:text-white font-bold py-2">Machinery Rental Support (Pumps & Fleet)</option>
                    <option value="general" class="text-slate-900 bg-white dark:bg-slate-800 dark:text-white font-bold py-2">General Corporate Inquiry</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Site / Project Location</label>
                <input type="text" x-model="formData.location" placeholder="e.g. Jaipur, Ajmer, Kota, Udaipur" class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-blue-600 focus:border-transparent text-sm text-slate-900 font-medium placeholder-slate-400 bg-white dark:bg-slate-800 dark:text-white">
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Item / Model / Product of Interest</label>
            <input type="text" x-model="formData.product_or_service_interest" placeholder="e.g. Ni-Hard Wear Blades / DCP Structuro 335 / Mixer Drum Shell" class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-blue-600 focus:border-transparent text-sm text-slate-900 font-medium placeholder-slate-400 bg-white dark:bg-slate-800 dark:text-white">
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Project Requirements / Quantity / Notes <span class="text-red-500">*</span></label>
            <textarea x-model="formData.message" rows="3" required placeholder="Describe your required parts, aggregate volume, chemical dosage requirements, or urgency..." class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-blue-600 focus:border-transparent text-sm text-slate-900 font-medium placeholder-slate-400 bg-white dark:bg-slate-800 dark:text-white"></textarea>
        </div>

        <div class="pt-2">
            <button type="submit" :disabled="loading" class="w-full py-3.5 px-6 rounded-xl font-extrabold text-white bg-gradient-to-r from-blue-700 to-blue-600 hover:from-blue-800 hover:to-blue-700 focus:ring-4 focus:ring-blue-300 shadow-lg hover:shadow-xl transition flex items-center justify-center space-x-2 disabled:opacity-70">
                <span x-show="!loading" class="flex items-center space-x-2">
                    <span>Submit Request to Jaipur Technical Desk</span>
                    <svg class="w-4 h-4 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </span>
                <span x-show="loading" x-cloak class="flex items-center space-x-2">
                    <svg class="animate-spin w-5 h-5 text-white" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path></svg>
                    <span>Transmitting Proposal Request...</span>
                </span>
            </button>
            <p class="text-[11px] text-slate-500 text-center mt-2">
                🔒 Privacy guaranteed. Your contact details are strictly used to coordinate technical specifications.
            </p>
        </div>
    </form>
</div>
