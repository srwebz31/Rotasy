@extends('agent.layout.app')

@section('title', 'Agent Wallet Transfer')

@section('heading', "Valor de transferência  (".__('provider.current_balance') . ":" . currency($wallet_balance).")")

@section('content')

    <div class="w-full rounded-lg shadow-xs bg-white dark:text-gray-400 dark:bg-gray-800 mb-5">
        <div class="w-full px-5 py-5">
            {{-- {{route('fleet.requestamount')}} --}}
            <form class="profile-form" action="#" method="POST" role="form" id="requestform">
                <input type="hidden" name='type' value='agent'/>
                <x-inputs.number name="amount" step=".01" :label="__('crud.general.provider').' '.__('crud.inputs.amount')" space="md:w-full" value=""></x-inputs.number>
                {{ csrf_field() }}
                <div class="flex justify-end w-full px-4">
                    <button type="submit" class="ml-3 right-0 inline-block py-1 px-4 leading-loose bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-lg transition duration-200 text-sm">@lang('provider.transfer')</button>
                </div>
            </form>
        </div>
    </div>

    <div class="w-full overflow-hidden rounded-lg shadow-xs mb-6 mt-4">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap" id="table-4">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="text-center px-4 py-3">@lang('provider.sno')</th>
                        <th class="text-center px-4 py-3">@lang('provider.transaction_ref')</th>
                        <th class="text-center px-4 py-3">@lang('provider.datetime')</th>
                        <th class="text-center px-4 py-3">@lang('provider.amount')</th>
                        <th class="text-center px-4 py-3">@lang('provider.status')</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @php($total=0)
                    @foreach($pendingList as $index => $pending)
                        @php($total+=$pending->amount)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">{{$index+1}}</td>
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">{{$pending->alias_id}}</td>
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">{{$pending->created_at->diffForHumans()}}</td>
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">{{currency($pending->amount)}}</td>
                            <td class="text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                {{$pending->status == 0 ? 'Pending' : 'Approved'}}
                                <a class="btn btn-danger btn-block" href="{{ route('fleet.cancel') }}?id={{$pending->id}}">@lang('provider.cancel')</a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        @if($wallet_balance<=0)
            $("#requestform :input").prop("disabled", true);
        @elseif($total==$wallet_balance)
            $("#requestform :input").prop("disabled", true);
        @endif
    </script>
@endsection
