<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.view')}} UserNotification #{{$model->id}}">
    <a href="{{$model->url}}" target="_blank">
        <div class="flex flex-col gap-4 rounded-lg @if(!$model->isRead(auth('web')->user()->id)) bg-zinc-200 dark:bg-zinc-700 @else bg-zinc-50 dark:bg-zinc-900 @endif  px-4 py-4">
            <div
                class="filament-notifications-notification pointer-events-auto invisible flex gap-3 w-full transition duration-300"
                style="display: flex; visibility: visible;">

                @if($model->image && $model->image!==url('images/default.png'))
                    <div class="flex flex-col items-center justify-center">
                        <div style="background-image: url('{{$model->image}}')" class="rounded-lg h-16 w-16 bg-center bg-cover">

                        </div>
                    </div>
                @else
                    <div class="rounded-lg h-16 w-16 flex flex-col border border-zinc-200 dark:border-zinc-700 justify-center items-center">
                        <div>
                            <i class="{{ $model->icon }} text-2xl"></i>
                        </div>
                    </div>
                @endif

                <div class="grid flex-1">
                    <div class="filament-notifications-title flex h-6 items-center text-sm font-medium text-zinc-900 dark:text-zinc-100">
                        <p>{{$model->title}}</p>
                    </div>

                    <p class="filament-notifications-date text-xs text-zinc-500 dark:text-zinc-300">
                        {{$model->created_at->diffForHumans()}}
                    </p>

                    <div class="filament-notifications-body mt-1 text-sm text-zinc-500 dark:text-zinc-300">
                        <p><strong>{{$model->description}}</strong></p>
                    </div>
                </div>

                <x-splade-link method="delete" :href="route('admin.user-notifications.destroy', $model->id)" confirm>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="filament-notifications-close-button h-4 w-4 cursor-pointer text-zinc-400">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </x-splade-link>
            </div>
        </div>
    </a>

    <div class="flex justify-start gap-2 pt-3">
        <x-tomato-admin-button danger :href="route('admin.notifications.destroy', $model->id)"
                               confirm="{{trans('tomato-admin::global.crud.delete-confirm')}}"
                               confirm-text="{{trans('tomato-admin::global.crud.delete-confirm-text')}}"
                               confirm-button="{{trans('tomato-admin::global.crud.delete-confirm-button')}}"
                               cancel-button="{{trans('tomato-admin::global.crud.delete-confirm-cancel-button')}}"
                               method="delete"  label="{{__('Delete')}}" />
        <x-tomato-admin-button secondary :href="route('admin.notifications.index')" label="{{__('Cancel')}}"/>
    </div>
</x-tomato-admin-container>
