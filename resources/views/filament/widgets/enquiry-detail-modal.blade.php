<div class="space-y-4 text-sm">
    <div class="grid grid-cols-2 gap-4 pb-3 border-b border-gray-200 dark:border-gray-700">
        <div>
            <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider block">Full Name</span>
            <span class="font-medium text-gray-900 dark:text-white">{{ $record->name }}</span>
        </div>
        <div>
            <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider block">Company</span>
            <span class="font-medium text-gray-900 dark:text-white">{{ $record->company_name ?: 'Not specified' }}</span>
        </div>
        <div>
            <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider block">Email Address</span>
            <a href="mailto:{{ $record->email }}" class="text-primary-600 hover:underline">{{ $record->email }}</a>
        </div>
        <div>
            <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider block">Phone Number</span>
            <a href="tel:{{ $record->phone }}" class="text-primary-600 font-semibold">{{ $record->phone }}</a>
        </div>
        <div>
            <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider block">Location / City</span>
            <span class="font-medium text-gray-900 dark:text-white">{{ $record->location ?: 'Jaipur / Rajasthan' }}</span>
        </div>
        <div>
            <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider block">Requirement Type</span>
            <span class="capitalize px-2 py-0.5 rounded text-xs font-semibold bg-gray-100 dark:bg-gray-800">{{ str_replace('_', ' ', $record->inquiry_type) }}</span>
        </div>
    </div>

    <div>
        <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider block mb-1">Product / Service of Interest</span>
        <div class="p-2.5 rounded bg-gray-50 dark:bg-gray-800/60 font-mono text-xs text-gray-800 dark:text-gray-200">
            {{ $record->product_or_service_interest ?: 'General Enquiry' }}
        </div>
    </div>

    <div>
        <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider block mb-1">Message / Project Requirements</span>
        <div class="p-3 rounded-lg bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-gray-800 dark:text-gray-200 whitespace-pre-wrap leading-relaxed">
            {{ $record->message }}
        </div>
    </div>
</div>
