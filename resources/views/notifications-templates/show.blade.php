<x-splade-modal class="font-main">
    <h1 class="text-2xl font-bold mb-4">{{trans('tomato-admin::global.crud.view')}} {{ trans('tomato-notifications::global.templates.single') }} #{{$model->id}}</h1>

    <div class="flex flex-col space-y-4">

        <div class="flex justify-between">
            <div>
                <h3 class="text-lg font-bold">
                    {{trans('tomato-notifications::global.templates.image')}}
                </h3>
            </div>
            <div>
                <h3 class="text-lg">
                    <div class="bg-cover w-8 h-8" style="background-image: url('{{$model->getMedia('image')->first() ? $model->getMedia('image')->first()->getUrl() : url("placeholder.webp") }}')"></div>
                </h3>
            </div>
        </div>
          <div class="flex justify-between">
              <div>
                  <h3 class="text-lg font-bold">
                      {{trans('tomato-notifications::global.templates.name')}}
                  </h3>
              </div>
              <div>
                  <h3 class="text-lg">
                      {{ $model->name}}
                  </h3>
              </div>
          </div>

          <div class="flex justify-between">
              <div>
                  <h3 class="text-lg font-bold">
                      {{trans('tomato-notifications::global.templates.key')}}
                  </h3>
              </div>
              <div>
                  <h3 class="text-lg">
                      {{ $model->key}}
                  </h3>
              </div>
          </div>

          <div class="flex justify-between">
              <div>
                  <h3 class="text-lg font-bold">
                      {{trans('tomato-notifications::global.templates.body')}}
                  </h3>
              </div>
              <div>
                  <h3 class="text-lg">
                      {{ $model->body}}
                  </h3>
              </div>
          </div>

          <div class="flex justify-between">
              <div>
                  <h3 class="text-lg font-bold">
                      {{trans('tomato-notifications::global.templates.title')}}
                  </h3>
              </div>
              <div>
                  <h3 class="text-lg">
                      {{ $model->title}}
                  </h3>
              </div>
          </div>

          <div class="flex justify-between">
              <div>
                  <h3 class="text-lg font-bold">
                      {{trans('tomato-notifications::global.templates.url')}}
                  </h3>
              </div>
              <div>
                  <h3 class="text-lg">
                      {{ $model->url}}
                  </h3>
              </div>
          </div>


          <div class="flex justify-between">
              <div>
                  <h3 class="text-lg font-bold">
                      {{trans('tomato-notifications::global.templates.type')}}
                  </h3>
              </div>
              <div>
                  <h3 class="text-lg">
                      {{ $model->type}}
                  </h3>
              </div>
          </div>


          <div class="flex justify-between">
              <div>
                  <h3 class="text-lg font-bold">
                      {{trans('tomato-notifications::global.templates.action')}}
                  </h3>
              </div>
              <div>
                  <h3 class="text-lg">
                      {{ $model->action}}
                  </h3>
              </div>
          </div>

    </div>
</x-splade-modal>
