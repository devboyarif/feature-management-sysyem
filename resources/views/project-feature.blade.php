<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Feature Request</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="mt-20  font-sans antialiased bg-gray-50"  x-data="{ showSubmitForm: false }">
    <section class="max-w-6xl mx-auto border-2 p-5 mb-10">
        <div>
            <h2 class="text-3xl font-semibold">Project: {{ $project->name }} </h2>
            <form action="{{ route('select.project') }}" method="post">
                @csrf
               <div class="flex justify-between items-center gap-4 mt-2">
                    <select class="w-full px-4 py-3 text-base text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" name="project">
                        @foreach ($projects as $single_project)
                            <option {{ $project->slug == $single_project->slug ? 'selected':'' }} value="{{ $single_project->slug }}">
                                {{ $single_project->name }} ({{ $single_project->feature_requests_count }} requests)
                            </option>
                        @endforeach
                    </select>
                    <div>
                        <button type="submit" class="border border-transparent bg-blue-600 py-2 px-6 text-md font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-full">Submit</button>
                    </div>
                </div>
                @error('project') <span class="text-red-500">{{ $message }}</span> @enderror
            </form>
        </div>
    </section>

    @livewire('frontend.feature-requests')

    @livewireScripts
</body>

</html>
