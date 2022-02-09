<div class="table-responsive">
  <table class="table table-striped table-hover table-bordered">
    <thead>
      <tr class="text-center">
          <th class="text-center" style="width: 30px">#</th>
          <th class="text-center"><i class="fa fa-image"></i></th>
          <th class="text-center">{{ __('app.find_driver.driver_name') }}</th>
          <th class="text-center">{{ __('app.find_driver.gender') }}</th>
          <th class="text-center">{{ __('app.find_driver.phone_number') }}</th>
          <th class="text-center">{{ __('app.find_driver.district (Khan)') }}</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($data as $index => $list)
      <tr>
        <td class="text-center">{{ $data->firstItem() + $index }}</td>
        <td class="text-center">
            <img src="{{ $list->image->url ?? url('adminlte/img/deliver-icon.png') }}" alt="Product Image" class="thumbnail" style=" height: 50px; margin-bottom:0px">
        </td>
        <td class="text-center">
          @if($list->status == 'verified')
            {{ $list->name }} <span style="color: blue" title="Verified"><i class="fas fa-check-circle"></i></span>
          @else
            {{$list->name}}
          @endif
        </td>
        <td class="text-center" style="text-transform: capitalize">{{ $list->gender }}</td>
        <td class="text-center">{{ $list->phone_number}}</td>
        <td class="text-center">{{ $list->district}}</td>
      </tr>
      @empty
        <tr>
          <td colspan="99" class="text-center"><p>No Record</p></td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>
