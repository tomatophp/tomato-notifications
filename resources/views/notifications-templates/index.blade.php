<x-tomato-admin-layout>
    <x-slot:header>
        {{ trans('tomato-notifications::global.templates.title') }}
    </x-slot:header>
    <x-slot:buttons>
        <x-tomato-admin-button :modal="true" href="/admin/notifications-templates/create" type="link">
            {{trans('tomato-admin::global.crud.create-new')}} {{ trans('tomato-notifications::global.templates.single') }}
        </x-tomato-admin-button>
    </x-slot:buttons>

    <div class="pb-12">
            <x-splade-table :for="$table" striped>
                <x-splade-cell actions>
                    <div class="flex justify-start">
                        <x-splade-link href="/admin/notifications-templates/{{ $item->id }}/send" class="px-2
                        text-green-500" confirm>
                            <div class="flex justify-start space-x-2">
                                <x-heroicon-s-paper-airplane class="h-4 w-4 ltr:mr-2 rtl:ml-2"/>
                                {{ __('Send') }}
                            </div>
                        </x-splade-link>


                        <x-tomato-admin-button success type="icon" title="{{trans('tomato-admin::global.crud.view')}}" modal :href="route('admin.notifications-templates.show', $item->id)">
                            <x-heroicon-s-eye class="h-4 w-4 ltr:mr-2 rtl:ml-2"/>
                        </x-tomato-admin-button>

                        <x-tomato-admin-button warning type="icon" title="{{trans('tomato-admin::global.crud.edit')}}" modal :href="route('admin.notifications-templates.edit', $item->id)">
                            <x-heroicon-s-pencil class="h-4 w-4 ltr:mr-2 rtl:ml-2"/>
                        </x-tomato-admin-button>

                        <x-splade-link href="/admin/notifications-templates/{{ $item->id }}"
                              confirm="{{trans('tomato-admin::global.crud.delete-confirm')}}"
                              confirm-text="{{trans('tomato-admin::global.crud.delete-confirm-text')}}"
                              confirm-button="{{trans('tomato-admin::global.crud.delete-confirm-button')}}"
                              cancel-button="{{trans('tomato-admin::global.crud.delete-confirm-cancel-button')}}"
                              class="px-2 text-red-500"
                              method="delete"

                        >
                            <div class="flex justify-start space-x-2">
                                <x-heroicon-s-trash class="h-4 w-4 ltr:mr-2 rtl:ml-2"/>
                            </div>
                        </x-splade-link>
                    </div>
                </x-splade-cell>
            </x-splade-table>
        </div>
</x-tomato-admin-layout>
