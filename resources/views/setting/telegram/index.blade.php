@extends('layouts.master')
@section('content-header')
{!! generateContentHeader('Setting', 'Setting') !!}
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        Setting up Telegram
      </div>
      <div class="card-body" id="telegram">
          <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <h5>Telegram</h5>
                  <p>{{ __('app.setting.objective-setup-telegram') }}</p>
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
                        <input type="text" class="form-control" name="telegram_user" v-model="data.telegram_user" placeholder="e.g. telegram_user">
                      </div>
                      <div class="form-group">
                        <label for="telgram_user">{{ __('app.setting.telegram-group') }}</label>
                        <input type="text" class="form-control" name="telegram_group" v-model="data.telegram_group"  placeholder="e.g. telegram_group">
                      </div>
                      <button type="submit" class="btn btn-warning btn-sm rounded-pill" v-if="telegramData.telegram_user === null && telegramData.telegram_group === null">{{ __('app.global.save') }}</button>
                      <button type="submit" class="btn btn-warning btn-sm rounded-pill" v-else>{{ __('app.global.save-changes') }}</button>
                    </div>
                  </div>
                </form>
                <hr>
                <h5>{{ __('app.setting.your-telegram') }}</h5>
                <div>
                  <b>{{ __('app.setting.telegram-user') }} &nbsp;&nbsp;&nbsp;:</b>
                  <a :href="'https://t.me/' + telegramData.telegram_user" style="color: #FFB300" target="_blank" v-if="telegramData.telegram_user">
                    <span>@{{ telegramData.telegram_user}}</span> 
                  </a> 
                  <span v-else class="text-muted">{{ __('app.setting.not-set') }}</span>
                  <br>
                  <b>{{ __('app.setting.telegram-group') }} :</b> 
                  <a :href="'https://t.me/' + telegramData.telegram_group" style="color: #FFB300" target="_blank" v-if="telegramData.telegram_group">
                    <span>@{{ telegramData.telegram_group  ?? 'Not Set' }}</span> 
                  </a>
                   <span v-else class="text-muted">{{ __('app.setting.not-set') }}</span>
                </div>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('footer-content')
  <script src="{{ mix('dist/js/setting/telegram.js') }}"></script>
@endsection