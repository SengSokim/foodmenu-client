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
                  <p>Setting up Telegram allowed you to receive notification from your customer's order.</p>
                </div>
              </div>
              <div class="col-md-6 pr-5">
                <h5>Create Telegram Group</h5>
                <p>You can create telegram group by click this link:<a href="https://web.telegram.org/" class="btn btn-link" target="_blank">Telegram <i class="fab fa-telegram"></i></a></p>
                <form @submit.prevent="submit" v-cloak>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="telgram_user">Telegram User</label>
                        <input type="text" class="form-control" name="telegram_user" v-model="data.telegram_user" placeholder="e.g. telegram_user">
                      </div>
                      <div class="form-group">
                        <label for="telgram_user">Telegram Group</label>
                        <input type="text" class="form-control" name="telegram_group" v-model="data.telegram_group"  placeholder="e.g. telegram_group">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-warning btn-sm rounded-pill" v-if="telegramData.telegram_user === null || telegramData.telegram_group === null">Save</button>
                    <button type="submit" class="btn btn-warning btn-sm rounded-pill" v-else>Save Changes</button>
                  </div>
                </form>
                <hr>
                <h5>Your Telegram</h5>
                <div>
                  <b>Telegram user &nbsp;&nbsp;&nbsp;:</b>
                  <a :href="'https://t.me/' + telegramData.telegram_user" style="color: #FFB300" target="_blank" v-if="telegramData.telegram_user">
                    <span>@{{ telegramData.telegram_user}}</span> 
                  </a> 
                  <span v-else class="text-muted">Not Set</span>
                  <br>
                  <b>Telegram group :</b> 
                  <a :href="'https://t.me/' + telegramData.telegram_group" style="color: #FFB300" target="_blank" v-if="telegramData.telegram_group">
                    <span>@{{ telegramData.telegram_group  ?? 'Not Set' }}</span> 
                  </a>
                   <span v-else class="text-muted">Not Set</span>
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