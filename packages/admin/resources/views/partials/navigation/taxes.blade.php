<nav class="flex space-x-4" aria-label="Tabs">
  <a href="{{ route('hub.taxes.index') }}"
    @class([
      'px-3 py-2 text-sm font-medium rounded-md' => true,
      'bg-white shadow' => request()->route()->getName() == 'hub.taxes.index',
      'hover:text-gray-700 text-gray-500' =>  request()->route()->getName() != 'hub.taxes.index'
    ])
  >
  @lang('adminhub::menu.settings.taxes.zone')
  </a>

  <a href="{{ route('hub.taxes.tax-classes.index') }}"
    @class([
      'px-3 py-2 text-sm font-medium rounded-md' => true,
      'bg-white shadow' => request()->route()->getName() == 'hub.taxes.tax-classes.index',
      'hover:text-gray-700 text-gray-500' =>  request()->route()->getName() != 'hub.taxes.tax-classes.index'
    ])
  >
  @lang('adminhub::menu.settings.taxes.class')
  </a>
</nav>
