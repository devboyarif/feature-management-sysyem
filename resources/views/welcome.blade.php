<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <script src="//unpkg.com/alpinejs" defer></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="relative mx-auto w-full max-w-container space-y-20 px-4 sm:px-6 lg:px-8" x-data="{ showSubmitForm: false }">
    <section class="page-hero">
        <div class="container-medium">
            <div class="section-wrapper">
                <h2 class="section-title_left">
                    Feature Request </h2>
                <article>

                    <p>On this page, you can suggest a new feature or vote for other feature requests. The suggestions
                        and<br>votes help me to determine the next features but are not binding.</p>
                    <p></p>
                    <p>Submissions will be kept for about 3 months. If they don’t get more than 50 votes, I might
                        remove<br>them.</p>
                </article>
                <div class="notification ar-hide">
                    <span class="icon-tick"></span>
                    <p class="notification-desc">
                        Thanks for the request submit, Your request is under admin review
                    </p>
                </div>
                <button type="submit" class="flex justify-center border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-full" @click="showSubmitForm = true" x-show="!showSubmitForm">Submit idea</button>


                <form x-show="showSubmitForm">
                    <div class="mt-1">
                      <input id="email" name="email" type="email" autocomplete="email" required="" class="block w-full appearance-none rounded-lg border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm" placeholder="Your Awesome Idea">
                    </div>
                    <div class="mt-3">
                        <textarea rows="8" name="comment" id="comment" class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm placeholder-gray-400" placeholder="Describe your awesome idea"></textarea>
                    </div>
                    <div class="mt-3 flex gap-3">
                        <button type="submit" class="flex justify-center border border-transparent bg-blue-600 py-2 px-6 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-full">Submit</button>
                        <button type="submit" @click="showSubmitForm = false">Cancel</button>
                    </div>
                </form>

                <div class="border-b border-gray-200 flex justify-end mt-5">
                    <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                        <button type="button" class="whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm focus:outline-none filterForm.status border-blue-500 text-blue-600':'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200">
                            All
                            <span class="hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block" class="bg-blue-100 text-blue-600 bg-gray-100 text-gray-900">
                                10
                            </span>
                        </button>

                        <button type="button" class="whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm focus:outline-none', filterForm.status border-blue-500 text-blue-600 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200">
                           Pending
                            <span class="hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block" class="bg-blue-100 text-blue-600 bg-gray-100 text-gray-900">
                               10
                            </span>
                        </button>

                        <button type="button" class="whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm focus:outline-none', filterForm.status border-blue-500 text-blue-600 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200">
                           Completed
                            <span class="hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block" class="bg-blue-100 text-blue-600 bg-gray-100 text-gray-900">
                               10
                            </span>
                        </button>
                    </nav>
                </div>

                <div class="m-5">
                    <div class="flex p-10">
                        <div class="px-3">
                            <div class="flex gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-green-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                  </svg>
                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                                  </svg>
                            </div>
                            <span class="mt-3 block text-gray-500">
                                9607 votes </span>
                        </div>
                        <div class="border-l-2 border-gray-200 px-3">
                            <div class="flex gap-2">
                                <h3 class="text-lg font-semibold">
                                    Button clicker
                                </h3>
                                <span class="bg-green-500 text-white font-medium mr-2 px-2 py-1 rounded-full  ">
                                    Approved
                                </span>
                            </div>
                            <p class="mt-2">
                                Some pages need an XHR refresh instead of a full refresh
                            </p>
                        </div>
                    </div>
                    <div class="flex p-10">
                        <div class="px-3">
                            <div class="flex gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-green-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                  </svg>
                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                                  </svg>
                            </div>
                            <span class="mt-3 block text-gray-500">
                                9607 votes </span>
                        </div>
                        <div class="border-l-2 border-gray-200 px-3">
                            <div class="flex gap-2">
                                <h3 class="text-lg font-semibold">
                                    Button clicker
                                </h3>
                                <span class="bg-green-500 text-white font-medium  px-2 py-1 rounded-full">
                                    Approved
                                </span>
                            </div>
                            <p class="mt-2">
                                Some pages need an XHR refresh instead of a full refresh
                            </p>
                        </div>
                    </div>
                </div>


                <ul id="pagin" class="pagination">
                    <li class="prev" style="display: none;">previous</li>
                    <li><a class="page-numbers current" href="#">1</a></li>
                    <li><a class="page-numbers" href="#">2</a></li>
                    <li><a class="page-numbers" href="#">3</a></li>
                    <li><a class="page-numbers" href="#">4</a></li>
                    <li><a class="page-numbers" href="#">5</a></li>
                    <li><a class="page-numbers" href="#">6</a></li>
                    <li style="display: none;"><a class="page-numbers" href="#">7</a></li>
                    <li style="display: none;"><a class="page-numbers" href="#">8</a></li>
                    <li style="display: none;"><a class="page-numbers" href="#">9</a></li>
                    <li class="next">next</li>
                </ul>
            </div>
        </div>
    </section>
</body>

</html>
