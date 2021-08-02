<div>
    <div class="w-full rounded-lg shadow-xs bg-white dark:text-gray-400 dark:bg-gray-800 mb-5">
        <div class="w-full px-5 py-5">
            <x-form action="{{ route('admin.payment.saveSetting') }}" method="post" has-file>
                <div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
                    <x-inputs.number min="0" :label="__('crud.payment.daily_target')" name="payment_daily_target"
                        value="{{ config('constants.payment_daily_target', '') }}"></x-inputs.number>
    
                    <x-inputs.number min="0" label="{{__('crud.payment.tax_percent')}} (%)" name="tax_percentage"
                        value="{{ config('constants.tax_percentage', '') }}"></x-inputs.number>
    
                    <x-inputs.number min="0" label="{{__('crud.inputs.commission')}} (%)" name="commission_percentage"
                        value="{{ config('constants.commission_percentage', '') }}"></x-inputs.number>
    
                    <x-inputs.number min="0"
                        label="{{__('crud.admin.providers.name')}} {{__('crud.inputs.commission')}} (%)"
                        name="agent_commission_percentage"
                        value="{{ config('constants.agent_commission_percentage', '') }}"></x-inputs.number>
    
                    <x-inputs.number min="0"
                        label="{{__('crud.admin.peakHours.name')}} {{__('crud.inputs.commission')}} (%)"
                        name="peak_percentage"
                        value="{{ config('constants.peak_percentage', '') }}"></x-inputs.number>
    
                    <x-inputs.number max="0" :label="__('crud.payment.payment_mini_negative_bal')" name="minimum_negative_balance" value="{{ config('constants.minimum_negative_balance', '') }}"></x-inputs.number>

                        <x-inputs.number min="0" :label="__('crud.payment.cancel_charge')" name="cancel_charge" value="{{ config('constants.cancel_charge', '') }}"></x-inputs.number>

                        
                    <x-inputs.number min="0" max="100" :label="__('crud.payment.agent_commission')" name="agent_commission_percentage" value="{{ config('constants.agent_commission_percentage', '') }}"></x-inputs.number>
                </div>
    
                <div class="flex justify-end">
                    <button type="submit"
                        class="right-0 inline-block py-1 px-4 leading-loose bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg transition duration-200 text-sm"
                        type="submit">{{ __('crud.general.update') }}</button>
                </div>
            </x-form>
        </div>
    </div>
    {{-- {{config('constants.cash_payment')}} <br> {{config('constants.online_payment')}} <br>
    {{config('constants.stripe_payment')}} --}}
    <div class="w-full rounded-lg shadow-xs bg-white dark:text-gray-400 dark:bg-gray-800 mb-5">
        <div class="w-full px-5 py-5">
            <x-form action="{{ route('admin.payment.savePaymentMethodSetting') }}" method="post" has-file>
                <div class="grid grid-wrap grid-cols-2 -mx-4 -mb-4 md:mb-0">
                    {{-- Cash Payment --}}
                    
                    <div class="w-full px-4 mb-4 md:mb-0">
                        <div class="mb-6">
                            <x-inputs.checkbox
                                id="cash_payment"
                                name="cash_payment"
                                label="{{__('crud.admin.settings.cash_payment')}}"
                                value="{{ config('constants.cash_payment') == '1' ? true : false }}"
                                :checked="config('constants.cash_payment') == '1' ? true : false"
                                :add-hidden-value="false"
                            ></x-inputs.checkbox>
                        </div>
                    </div>
                    <div class="w-full px-4 mb-4 md:mb-0">
                        <div class="mb-6">
                            <x-inputs.checkbox
                                id="online_payment"
                                name="online_payment"
                                label="{{__('crud.admin.settings.online_payment')}}"
                                value="{{ config('constants.online_payment') == '1' ? true : false }}"
                                :checked="config('constants.online_payment') == '1' ? true : false"
                                :add-hidden-value="false"
                            ></x-inputs.checkbox>
                        </div>
                    </div>
    
                    {{-- Stripe Payment --}}
                    <div class="w-full px-4 mb-4 md:mb-0">
                        <div class="mb-6">
                            <x-inputs.checkbox
                                id="stripe_payment"
                                name="stripe_payment"
                                label="{{__('crud.inputs.stripe_payment')}}"
                                value="{{ config('constants.stripe_payment') == '1' ? true : false }}"
                                :checked="config('constants.stripe_payment') == '1' ? true : false"
                                :add-hidden-value="false"
                            ></x-inputs.checkbox>
        
                        </div>
                    </div>
                    
                    <x-inputs.text space="md:w-1/2" :label="__('crud.inputs.stripe_publishable_key')"
                        name="stripe_publishable_key"
                        value="{{ config('constants.stripe_publishable_key') ?? '' }}">
                    </x-inputs.text>
                    <x-inputs.password space="md:w-1/2" :label="__('crud.inputs.stripe_secret_key')"
                        name="stripe_secret_key" value="{{ config('constants.stripe_secret_key') ?? '' }}">
                    </x-inputs.password>
    
                    <x-inputs.select :label="__('crud.admin.settings.currency')" name="currency" space="md:w-1/2">
                        <option @if(config('constants.currency')=="RM" ) selected @endif value="RM">
                            Malaysian ringgit (RM)</option>
                        <option @if(config('constants.currency')=="R" ) selected @endif value="R">
                            South African rand (ZAR)</option>
                        <option @if(config('constants.currency')=="₦" ) selected @endif value="₦">
                            Nigerian naira (NGN)</option>
                        <option @if(config('constants.currency')=="$" ) selected @endif value="$">US
                            Dollar (USD)</option>
                        <option @if(config('constants.currency')=="₹" ) selected @endif value="₹">
                            Indian Rupee (INR)</option>
                        <option @if(config('constants.currency')=="د.ك" ) selected @endif value="د.ك">
                            Kuwaiti Dinar (KWD)</option>
                        <option @if(config('constants.currency')=="د.ب" ) selected @endif value="د.ب">
                            Bahraini Dinar (BHD)</option>
                        <option @if(config('constants.currency')=="﷼" ) selected @endif value="﷼">
                            Omani Rial (OMR)</option>
                        <option @if(config('constants.currency')=="£" ) selected @endif value="£">
                            British Pound (GBP)</option>
                        <option @if(config('constants.currency')=="€" ) selected @endif value="€">
                            Euro (EUR)</option>
                        <option @if(config('constants.currency')=="CHF" ) selected @endif value="CHF">Swiss
                            Franc (CHF)</option>
                        <option @if(config('constants.currency')=="ل.د" ) selected @endif value="ل.د">Libyan
                            Dinar (LYD)</option>
                        <option @if(config('constants.currency')=="B$" ) selected @endif value="B$">
                            Bruneian Dollar (BND)</option>
                        <option @if(config('constants.currency')=="S$" ) selected @endif value="S$">
                            Singapore Dollar (SGD)</option>
                        <option @if(config('constants.currency')=="C$" ) selected @endif value="C$">
                            Canadian dollar (CAD)</option>
                        <option @if(config('constants.currency')=="AU$" ) selected @endif value="AU$">
                            Australian Dollar (AUD)</option>
                    </x-inputs.select>
    
                    <span class="col-span-2 text-sm dark:text-red-400 text-red-600 font-semibold px-4">
                        ** Note: Only One Of the `Online` Or `Stripe` Payment Method Can Be Selected At Once. If you selected Both the values Will Not Be Updated. **
                    </span>

                    <div class="col-span-2 px-4 mb-4 md:mb-0">
                        <div class="mb-6">
                            <div class="flex justify-end">
                                <button type="submit"
                                    class="right-0 inline-block py-1 px-4 leading-loose bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg transition duration-200 text-sm"
                                    type="submit">{{ __('crud.general.update') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </x-form>
        </div>
    </div>
</div>
