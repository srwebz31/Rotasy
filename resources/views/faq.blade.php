@extends('layout.app')

@section('title')
    {{ __('crud.general.faq') }}
@endsection

@section('content')
    
<section class="relative py-20">
    <div class="container px-4 mx-auto">
        <div class="max-w-2xl mx-auto mb-10 text-center">
            <h2 class="mt-8 text-4xl font-semibold font-heading">
                {{ __('crud.general.faq') }}
            </h2>
        </div>
        <style>
            details>summary {
                list-style: none;
            }
            summary::-webkit-details-marker {
                display: none
            }
            summary::after {
                content: ' ►';
            }
            details[open] summary:after {
                content: " ▼";
            }
        </style>
        <div class="max-w-4xl mx-auto">
            <ul class="space-y-4">
                @forelse ($faqs as $faq)
                    <li class="p-12 border rounded-lg">
                        <details>
                            <summary class="my-1 w-full flex justify-between items-center text-left font-semibold font-heading focus:outline-none">
                                <span class="cursor-pointer text-2xl font-semibold font-heading">{{ $faq->question }}</span>
                            </summary>

                            <span class="max-w-2xl text-gray-500 leading-loose">
                                {{ $faq->answer }}
                            </span>
                        </details>
                    </li>
                @empty
                    No FAQs
                @endforelse
            </ul>
        </div>
    </div>
</section>
@endsection