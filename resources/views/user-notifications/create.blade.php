<x-splade-modal class="font-main">
    <h1 class="text-2xl font-bold mb-4">{{trans('tomato-admin::global.crud.create')}} {{ trans('tomato-notifications::global.notifications.single') }}</h1>

    <x-splade-form :default="[
        'privacy' => 'public',
        'model_type' => array_keys(config('tomato-notifications.models'))[0],
    ]" class="flex flex-col space-y-4" action="{{route('admin.user-notifications.store')}}" method="post">
        <x-splade-select :placeholder="trans('tomato-notifications::global.notifications.template_id')" name="template_id" :options="$templates" option-label="name" option-value="id" choices relation/>
        <x-splade-select name="model_type" type="text"  :placeholder=" trans('tomato-notifications::global.notifications.model_type')">
            @foreach(config('tomato-notifications.models') as $key=>$model)
                <option value="{{$key}}">{{trans('tomato-notifications::global.notifications.models.'.$key)}}</option>
            @endforeach
        </x-splade-select>
        <x-splade-select name="privacy" type="text"  :placeholder="trans('tomato-notifications::global.notifications.privacy')">
            <option value="public">{{trans('tomato-notifications::global.notifications.public')}}</option>
            <option value="private">{{trans('tomato-notifications::global.notifications.private')}}</option>
        </x-splade-select>
        <x-splade-select v-if="form.privacy === 'private'" name="model_id" type="text" :placeholder="trans('tomato-notifications::global.notifications.model_id')" method="post" remote-url="`/admin/user-notifications/get/${form.model_type}`" choices />

        <x-splade-submit label="{{trans('tomato-admin::global.crud.create-new')}} {{ trans('tomato-notifications::global.notifications.single') }}" :spinner="true" />
    </x-splade-form>
</x-splade-modal>
