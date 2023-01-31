<x-splade-modal class="font-main">
    <h1 class="text-2xl font-bold mb-4">{{trans('tomato-admin::global.crud.create')}} {{ trans('tomato-notifications::global.templates.single') }}</h1>

    <x-splade-form :default="[
        'action' => 'system',
        'type' => config('tomato-notifications.types')[0]['id']
    ]" class="flex flex-col space-y-4" action="{{route('admin.notifications-templates.store')}}" method="post">

        <x-splade-file name="image"  filepond />
        <x-splade-input name="name" type="text"  :placeholder="trans('tomato-notifications::global.templates.name')" :label="trans('tomato-notifications::global.templates.name')" required/>
          <x-splade-input name="key" type="text"  :placeholder="trans('tomato-notifications::global.templates.key')" :label="trans('tomato-notifications::global.templates.key')" required/>
        @foreach(config('tomato-notifications.lang') as $key=>$lang)
            <x-splade-input name="title[{{$key}}]" type="text"  placeholder="{{trans('tomato-notifications::global.templates.from_title')}} {{trans('tomato-notifications::global.lang.' . $lang)}}" label="{{trans('tomato-notifications::global.templates.from_title')}} {{trans('tomato-notifications::global.lang.' . $lang)}}" required/>
        @endforeach
        @foreach(config('tomato-notifications.lang') as $key=>$lang)
            <x-splade-textarea name="body[{{$key}}]" type="text"  placeholder="{{trans('tomato-notifications::global.templates.body')}} {{trans('tomato-notifications::global.lang.' . $lang)}}" label="{{trans('tomato-notifications::global.templates.body')}} {{trans('tomato-notifications::global.lang.' . $lang)}}" required/>
        @endforeach
          <x-splade-input name="url" type="text" label="{{trans('tomato-notifications::global.templates.url')}}"  placeholder="{{trans('tomato-notifications::global.templates.url')}}" required/>
        <x-splade-select name="type" label="{{trans('tomato-notifications::global.templates.type')}}" required choices>
            @foreach(config('tomato-notifications.types') as $type)
                <option value="{{$type['id']}}">{{trans('tomato-notifications::global.templates.types.' . $type['id'])}}</option>
            @endforeach
        </x-splade-select>
          <x-splade-select name="providers[]" label="{{trans('tomato-notifications::global.templates.providers')}}"   required multiple choices>
              @foreach(config('tomato-notifications.providers') as $provider)
              <option value="{{$provider['id']}}">{{trans('tomato-notifications::global.templates.provider.' . $provider['id'])}}</option>
              @endforeach
          </x-splade-select>

        <x-splade-select name="action" type="text" label="{{trans('tomato-notifications::global.templates.action')}}"  placeholder="{{trans('tomato-notifications::global.templates.action')}}" required choices default="system">
            <option value="system" selected>{{trans('tomato-notifications::global.templates.system')}}</option>
            <option value="manual">{{trans('tomato-notifications::global.templates.manual')}}</option>
        </x-splade-select>


        <x-splade-submit label="{{trans('tomato-admin::global.crud.create-new')}}  {{ trans('tomato-notifications::global.templates.single') }}" :spinner="true" />
    </x-splade-form>
</x-splade-modal>
