<div class="space-y-4">
    <header class="flex items-center justify-between">
        <div>
            <strong>@lang('adminhub::components.discounts.amount-off.buy_x_get_y.qualify_products')</strong>
            <p class="text-sm text-gray-600">@lang('adminhub::components.discounts.amount-off.buy_x_get_y.select_the_products')</p>
        </div>
        <div>
            @livewire('hub.components.product-search', [
                'existing' => $this->conditions,
                'ref' => 'discount-conditions',
                'showBtn' => true,
            ])
        </div>
    </header>

    <div class="space-y-1">
        @if ($errors->first('selectedConditions'))
            <x-hub::alert level="danger">
                @lang('adminhub::components.discounts.amount-off.buy_x_get_y.you_must_select_at_least_1_qualifying_product')
            </x-hub::alert>
        @endif
        @if (!$this->purchasableConditions->count())
            <div class="text-sm text-gray-700 border p-4 rounded bg-gray-50">
                @lang('adminhub::components.discounts.amount-off.buy_x_get_y.no_products_currently_selected')
            </div>
        @endif

        @foreach ($this->purchasableConditions as $product)
            <div wire:key="condition_product_{{ $product->id }}" class="rounded border px-3 py-2 flex items-center">
                @if ($thumbnail = $product->thumbnail)
                    <div>
                        <img class="w-8 rounded" src="{{ $thumbnail->getUrl('small') }}">
                    </div>
                @endif
                <div class="grow ml-4">
                    {{ $product->translateAttribute('name') }}
                </div>
                <div>
                    <button type="button" wire:click="removeCondition({{ $product->id }})">
                        <x-hub::icon ref="trash" class="w-4 h-4" />
                    </button>
                </div>
            </div>
        @endforeach
    </div>

    <div class="grid grid-cols-2">
        <x-hub::input.group for="min_qty" :error="$errors->first('discount.data.min_qty')" 
            label="{{ __('adminhub::components.discounts.amount-off.buy_x_get_y.product_quantity') }}"
            instructions="{{ __('adminhub::components.discounts.amount-off.buy_x_get_y.set_how_many_of_the_above_products_are_required_to_qualify_for_a_reward') }}">
            <x-hub::input.text type="number" id="min_qty" wire:model="discount.data.min_qty" />
        </x-hub::input.group>
    </div>

    <header class="flex items-center justify-between">
        <div>
            <strong>@lang('adminhub::components.discounts.amount-off.buy_x_get_y.product_rewards')</strong>
            <p class="text-sm text-gray-600">@lang('adminhub::components.discounts.amount-off.buy_x_get_y.select_which_products_will_be_discounted')</p>
        </div>
        <div>
            @livewire('hub.components.product-search', [
                'existing' => $this->rewards,
                'ref' => 'discount-rewards',
                'showBtn' => true,
            ])
        </div>
    </header>

    @if ($errors->first('selectedRewards'))
        <x-hub::alert level="danger">
            @lang('adminhub::components.discounts.amount-off.buy_x_get_y.you_must_select_at_least_1_qualifying_product')
        </x-hub::alert>
    @endif

    @if (!$this->purchasableRewards->count())
        <div class="text-sm text-gray-600 border p-4 rounded bg-gray-50">
            @lang('adminhub::components.discounts.amount-off.buy_x_get_y.no_products_currently_selected')
        </div>
    @endif

    <div class="space-y-1">
        @foreach ($this->purchasableRewards as $product)
            <div wire:key="reward_product_{{ $product->id }}" class="rounded border px-3 py-2 flex items-center">
                @if ($thumbnail = $product->thumbnail)
                    <div>
                        <img class="w-8 rounded" src="{{ $thumbnail->getUrl('small') }}">
                    </div>
                @endif
                <div class="grow ml-4">
                    {{ $product->translateAttribute('name') }}
                </div>
                <div>
                    <button type="button" wire:click="removeReward({{ $product->id }})">
                        <x-hub::icon ref="trash" class="w-4 h-4" />
                    </button>
                </div>
            </div>
        @endforeach
    </div>

    <x-hub::alert>
        @lang('adminhub::components.discounts.amount-off.buy_x_get_y.if_one_or_more_items_are_in_the_cart')
    </x-hub::alert>

    <div class="grid grid-cols-2 gap-4">
        <x-hub::input.group for="reward_qty" :error="$errors->first('discount.data.reward_qty')"
            label="{{ __('adminhub::components.discounts.amount-off.buy_x_get_y.no_of_free_items') }}"
            instructions="{{ __('adminhub::components.discounts.amount-off.buy_x_get_y.how_many_of_each_item_are_discounted') }}">
            <x-hub::input.text type="number" wire:model="discount.data.reward_qty" />
        </x-hub::input.group>

        <x-hub::input.group for="max_reward_qty"
            label="{{ __('adminhub::components.discounts.amount-off.buy_x_get_y.maximum_reward_quantity') }}"
            :error="$errors->first('discount.data.max_reward_qty')"
            instructions="{{ __('adminhub::components.discounts.amount-off.buy_x_get_y.the_maximum_amount_of_products_which_can_be_discounted') }}">
            <x-hub::input.text type="number" wire:model="discount.data.max_reward_qty" />
        </x-hub::input.group>
    </div>
</div>
