<div class="mt-10 sm:mt-0">
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1 flex justify-between">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium text-gray-900">Billing</h3>

                <p class="mt-1 text-sm text-gray-600">
                    Make changes to your billing setup.
                </p>
            </div>
        </div>

        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg">
                <h3 class="text-lg font-medium text-gray-900">
                    Billing Settings
                </h3>

                @if($user->subscribed())
                    <div class="mt-3 max-w-xl text-sm text-gray-600">
                        <p>
                            Change payment details, switch plans or should you wish, cancel your subscription.
                        </p>
                    </div>

                    <div class="mt-3 max-w-xl text-sm text-gray-600 flex space-x-4">
                        <p><strong>Type:</strong> {{ Str::ucfirst($user->pm_type) }}</p>
                        <p><strong>Last Card:</strong> **** **** **** {{ $user->pm_last_four }}</p>
                    </div>

                    <div class="mt-5">
                        <a
                            href="{{ route('billing-portal') }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150"
                        >
                            Visit Billing Portal
                        </a>
                    </div>
                @else
                    <div class="mt-3 max-w-xl text-sm text-gray-600">
                        <p>
                            You are not currently subscribed.
                        </p>
                    </div>

                    <div class="mt-5">
                        <a
                            href="{{ route('create-subscription') }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150"
                        >
                            Subscribe
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
