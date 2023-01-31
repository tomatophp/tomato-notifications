<x-splade-modal class="font-main">
    @if(count($notifications))
    <div class="space-y-2">
        <div class="filament-modal-header py-2">
            <h2 class="filament-modal-heading text-xl font-bold tracking-tight relative">
                <span>
                    Notifications
                </span>
            </h2>
        </div>

        <div aria-hidden="true" class="filament-hr border-t dark:border-gray-700"></div>

        <div class="filament-modal-content space-y-2">
            <div class="px-4 py-2 space-y-4">
                <div class="mt-[calc(-1rem-1px)]">
                    <div class="-mx-6 border-b border-t dark:border-gray-800">
                        <div class="py-2 pl-4 pr-2 bg-gray-50 -mb-px dark:bg-gray-700">
                            @foreach($notifications as $notification)
                                <div
                                    class="filament-notifications-notification pointer-events-auto invisible flex gap-3 w-full transition duration-300"
                                    style="display: flex; visibility: visible;">

                                    @if($notification->image)
                                        <div style="background-image: url('{{$notification->image}}')" class="h-6 w-6 bg-cover">

                                        </div>
                                    @else
                                        <svg class="filament-notifications-icon h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                    </svg>
                                    @endif

                                    <div class="grid flex-1">
                                        <div class="filament-notifications-title flex h-6 items-center text-sm font-medium text-gray-900 dark:text-gray-100">
                                            <p>{{$notification->title}}</p>
                                        </div>

                                        <p class="filament-notifications-date text-xs text-gray-500 dark:text-gray-300">
                                            {{$notification->created_at->diffForHumans()}}
                                        </p>

                                        <div class="filament-notifications-body mt-1 text-sm text-gray-500 dark:text-gray-300">
                                            <p><strong>{{$notification->description}}</strong></p>
                                        </div>

                                        <div class="filament-notifications-actions mt-2 flex gap-3">
                                            <a href="{{$notification->url}}" target="_blank" class="filament-link inline-flex items-center justify-center gap-0.5 font-medium hover:underline focus:outline-none focus:underline text-sm text-primary-600 hover:text-primary-500 dark:text-primary-500 dark:hover:text-primary-400 filament-notifications-link-action">
                                                View
                                            </a>

                                        </div>
                                    </div>

                                    <Link method="delete" href="/admin/user-notifications/{{$notification->id}}" confirm>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="filament-notifications-close-button h-4 w-4 cursor-pointer text-gray-400">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    </Link>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div aria-hidden="true" class="filament-hr border-t dark:border-gray-700"></div>
            <div>
                <div class="mt-2 text-sm flex justify-between">
                    <Link
                        confirm
                        method="delete"
                        href="/admin/notifications/clear"
                        class="filament-link text-red-600 hover:text-red-400 inline-flex items-center justify-center font-medium hover:underline focus:outline-none focus:underline "
                        tabindex="-1"
                    >
                        Clear
                    </Link>
                </div>
            </div>
        </div>

    </div>
    @else
    <div class="space-y-2" >


        <div class="filament-modal-content space-y-2">

            <div class="px-4 py-2 space-y-4">
                <div class="flex flex-col items-center justify-center mx-auto my-6 space-y-4 text-center bg-white dark:bg-gray-800">
                    <div class="flex items-center justify-center w-12 h-12 text-primary-500 rounded-full bg-primary-50 dark:bg-gray-700">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                        </svg>    </div>

                    <div class="max-w-md space-y-1">
                        <h2 class="text-lg font-bold tracking-tight dark:text-white">
                            No notifications here
                        </h2>

                        <p class="whitespace-normal text-sm font-medium text-gray-500 dark:text-gray-400">
                            Please check again later
                        </p>
                    </div>
                </div>
            </div>


        </div>


    </div>
        @endif
</x-splade-modal>
