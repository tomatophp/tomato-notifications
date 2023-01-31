<x-splade-modal>
    <h1 class="text-2xl font-bold mb-4">{{trans('tomato-admin::global.crud.view')}} UserNotification #{{$model->id}}</h1>

    <div class="flex flex-col space-y-4">


          <div class="flex justify-between">
              <div>
                  <h3 class="text-lg font-bold">
                      {{trans('tomato-notifications::global.notifications.model_type')}}
                  </h3>
              </div>
              <div>
                  <h3 class="text-lg">
                      {{ $model->model ? $model->model->name : null}}
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
                      {{trans('tomato-notifications::global.templates.body')}}
                  </h3>
              </div>
              <div>
                  <h3 class="text-lg">
                      {{ $model->description}}
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
                      {{trans('tomato-notifications::global.notifications.privacy')}}
                  </h3>
              </div>
              <div>
                  <h3 class="text-lg">
                      {{ $model->privacy}}
                  </h3>
              </div>
          </div>

    </div>
</x-splade-modal>
