@extends('layouts.master')
@section('content-header')
{!! generateContentHeader(__('app.setting.setting'), __('app.setting.setting')) !!}
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h5 style="font-weight: 600">{{ __('app.setting.setting-up-telegram') }}</h5>
      </div>
      <div class="card-body" id="telegram"  v-cloak>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <h5>Telegram</h5>
              <p>{{ __('app.setting.objective-setup-telegram') }}</p>
            </div>
            <div class="col-md-12" style="width: 80%">
              <p>{{ __('app.setting.setting-up-telegram-with-papa-emenu') }}<a href="https://www.youtube.com/watch?v=KYHOm7V2H5Q&t=5s" target="_blank">  {{ __('app.setting.click-here')}}</a>
                 <i class="far fa-hand-point-down"></i>.
              </p>
              <iframe width="100%" height="315px" src="https://www.youtube.com/embed/KYHOm7V2H5Q" title="Video Tutorial" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-md-6 pr-5">
            <h5>{{ __('app.setting.create-telegram-group') }}</h5>
            <p>{{ __('app.setting.you-can-create-telegram-group-by-click-this-link') }}:<a href="https://web.telegram.org/" class="btn btn-link" target="_blank">Telegram <i class="fab fa-telegram"></i></a></p>
            <form @submit.prevent="submit" v-cloak>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="telgram_user">{{ __('app.setting.telegram-user') }}</label>
                    <div class="input-group">
                      <input type="text" class="form-control" name="telegram_user" v-model="restaurant.telegram_user" placeholder="e.g. telegram_user">
                      <div class="input-group-append" title="Preview">
                        <span class="input-group-text bg-transparent" @click="preview('user')" style="cursor: pointer"><i class="fas fa-eye"></i></span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="telgram_user">{{ __('app.setting.telegram-group') }}</label>
                    <div class="input-group">
                      <input type="text" class="form-control" name="telegram_group" v-model="restaurant.telegram_group"  placeholder="e.g. telegram_group">
                      <div class="input-group-append" title="Preview">
                        <span class="input-group-text bg-transparent" @click="preview('group')" style="cursor: pointer"><i class="fas fa-eye"></i></span>
                      </div>
                    </div>
                  </div>
                  <div style="margin-top: 10px; margin-bottom: 10px; " >
                    <input type="checkbox" v-model="restaurant.is_allow_location" style="cursor: pointer"> {{ __('app.setting.ask-customers-location') }}
                  </div>
                  <button type="submit" class="btn btn-warning btn-sm rounded-pill px-5" v-if="telegramData.telegram_user === null && telegramData.telegram_group === null">{{ __('app.global.save') }}</button>
                  <button type="submit" class="btn btn-warning btn-sm rounded-pill px-3" v-else>{{ __('app.global.save-change') }}</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('footer-content')
  <script>
    const restaurant = @json($restaurant);
  </script>
  <script src="{{ mix('dist/js/setting/telegram.js') }}"></script>
@endsection