<x-app-layout>
    <div class="flex flex-row max-w-3xl gap-8 mx-auto">
        {{-- Left Side --}}
            <div class="w-[30rem] mx-auto lg:w-[95rem]">
                @forelse ($posts as $post)
                <x-post :post="$post" class="mb-8"/>
                @empty
                    <div class="max-w-2xl gap-8 mx-auto">
                        {{ __('Start Following Your Friends and Enjoy.') }}
                    </div>
                @endforelse
            </div>
        {{-- Right Side --}}
        <div class="hidden w-[60rem] lg:flex lg:flex-col pt-4">
            <div class="flex flex-row text-sm">
                <div class="ltr:mr-5 rtl:ml-5">
                    <a href="/{{ auth()->user()->name }}">
                        <img src="{{ auth()->user()->image }}" alt=""
                             class="border border-gray-300 rounded-full h-12 w-12 object-cover">
                    </a>
                </div>
                <div class="flex flex-col">
                    <a href="/{{ auth()->user()->name }}" class="font-bold">
                        {{ auth()->user()->name }}
                    </a>
                    <div class="text-gray-500 text-sm">{{ auth()->user()->name }}</div>
                </div>
            </div>

            {{-- Suggested Users --}}

        </div>
    </div>
</x-app-layout>
