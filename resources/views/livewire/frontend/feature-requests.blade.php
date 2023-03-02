<section class="max-w-6xl mx-auto">
    <div>
        <h2 class="text-5xl font-semibold">Feature Request </h2>
        <p class="my-5">Use the following code to show simple previous and next elements with icons.</p>

        @if (!$showSubmitForm)
            <button wire:click.prevent="$toggle('showSubmitForm')" type="button" class="flex justify-center border border-transparent bg-blue-600 py-2 px-4 text-md font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-full">Submit idea</button>
        @endif

        @if ($showSubmitForm)
            <form wire:submit.prevent="submitRequest">
                <div class="mt-1">
                    <input wire:model.defer="title" id="title" type="text"  class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm @error('title') border-red-500 @enderror" placeholder="Your Awesome Idea">
                    @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="mt-3">
                    <textarea wire:model.defer="description" rows="8" id="description" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm placeholder-gray-400 @error('description') border-red-500 @enderror" placeholder="Describe your awesome idea"></textarea>
                    @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="mt-3 flex gap-3">
                    <button wire:loading.attr="disabled" type="submit" class="flex justify-center border border-transparent bg-blue-600 py-2 px-6 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-full">Submit</button>
                    <button type="button" wire:click.prevent="$toggle('showSubmitForm')">Cancel</button>
                </div>
            </form>
        @endif

        <div class="border-b border-gray-200 flex justify-end mt-5">
            <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                <button wire:click.prevent="changeStatus('all')" type="button" class="whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm focus:outline-none {{ $status == 'all' || !$status ? 'border-blue-500 text-blue-600':'border-transparent text-gray-500' }}">
                    All
                    <span class="hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block" class="bg-blue-100 text-blue-600">
                        {{ $counts['all'] }}
                    </span>
                </button>

                <button wire:click.prevent="changeStatus('pending')" type="button" class="whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm focus:outline-none {{ $status == 'pending' ? 'border-blue-500 text-blue-600':'border-transparent text-gray-500' }}">
                   Pending
                    <span class="hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block" class="bg-blue-100 text-blue-600">
                        {{ $counts['pending'] }}
                    </span>
                </button>
                <button wire:click.prevent="changeStatus('inprogress')" type="button" class="whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm focus:outline-none {{ $status == 'inprogress' ? 'border-blue-500 text-blue-600':'border-transparent text-gray-500' }}">
                   In Progress
                    <span class="hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block" class="bg-blue-100 text-blue-600">
                        {{ $counts['inprogress'] }}
                    </span>
                </button>
                <button wire:click.prevent="changeStatus('complete')" type="button" class="whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm focus:outline-none {{ $status == 'complete' ? 'border-blue-500 text-blue-600':'border-transparent text-gray-500' }}">
                   Completed
                    <span class="hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block" class="bg-blue-100 text-blue-600">
                        {{ $counts['complete'] }}
                    </span>
                </button>
            </nav>
        </div>

        <div>
            @foreach ($features_requests as $feature)
                <div class="flex p-10">
                    <div class="px-3">
                        <div class="flex gap-3">
                            <svg wire:click.prevent="upVote({{ $feature->id }})" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-green-500 cursor-pointer">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            <svg wire:click.prevent="downVote({{ $feature->id }})" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 cursor-pointer">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                            </svg>
                        </div>
                        <span class="mt-3 text-gray-500">
                            {{ $feature->vote }} votes
                        </span>
                    </div>
                    <div class="border-l-2 border-gray-200 px-5">
                        <div class="flex gap-2">
                            <h3 class="text-lg font-semibold">
                                {{ $feature->title }}
                            </h3>
                            @php
                                $status = $feature->status;
                            @endphp

                            <span @class([
                                'bg-red-500' => $status == 'pending',
                                'bg-yellow-500' => $status == 'inprogress',
                                'bg-green-500' => $status == 'complete',
                                'text-white font-medium mr-2 px-2 py-1 rounded-full'
                            ])>
                                {{ ucfirst($feature->status) }}
                            </span>
                        </div>
                        <p class="mt-2">
                            {{ $feature->description }}
                        </p>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
</section>
