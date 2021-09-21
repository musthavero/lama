<!-- overlay -->
<div
    class=""
    style="background-color: rgba(0,0,0,0.2)"
    x-on:{{$hideTrigger}}.window="{{$controlVal}} = false"
    x-on:{{$showTrigger}}.window="{{$controlVal}} = true"
    x-show="{{$controlVal}}"
    :class="{ 'fixed inset-0 z-10 flex items-center justify-center': {{$controlVal}} }"
>
    <!-- Modal -->
    <div class="flex flex-col mx-auto object-center bg-gray-200 shadow shadow-2xl
            @if (isset($heightClass)) {{$heightClass}}
    @endif ">

            <div
                class="flex flex-row justify-between pt-3 pr-3 pl-3 pb-1 bg-white border-b border-gray-200">
                <p class="font-semibold text-gray-800">{{$title}}</p>
                <svg
                    class="w-6 h-6 cursor-pointer hover:rotate-90 transform transform duration-200"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                    @click="{{$controlVal}}=false; Livewire.emit('{{$hideTrigger}}');"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"
                    ></path>
                </svg>
            </div>
            <div class="flex flex-col px-6 py-5 bg-gray-50 h-full">
                {{$content}}
            </div>
    </div>
</div>
