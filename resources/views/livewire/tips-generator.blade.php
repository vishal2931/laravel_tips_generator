<div
    class="bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 min-h-screen w-full flex items-center justify-center p-5 md:p-14">
    <div>
        <div class="bg-white p-5 m-auto sm:w-full md:w-2/3 rounded-xl" id="capture">
            @if ($tip)
                <h3 class="font-semibold text-2xl">{{ $tip['name'] }}</h3>
                <input type="hidden" id="tip_name" value="{{ Str::slug($tip['name'],'-') }}">
                <p class="font-normal text-black text-lg mt-3 leading-5">{{ $tip['description'] }}</p>
                <div class="flex justify-center">
                    <img src="{{ $tip['original_image'] }}" class="mt-4 rounded-2xl" width="600px" alt="tip-image">
                </div>
            @endif
        </div>
        <div class="text-center mt-3">
            <a href="#" class="relative inline-block text-lg group" id="capture-screenshot">
                <span
                    class="relative z-10 block px-5 py-3 overflow-hidden font-medium leading-tight text-gray-800 transition-colors duration-300 ease-out border-2 border-gray-900 rounded-lg group-hover:text-white">
                    <span class="absolute inset-0 w-full h-full px-5 py-3 rounded-lg bg-gray-50"></span>
                    <span
                        class="absolute left-0 w-48 h-48 -ml-2 transition-all duration-300 origin-top-right -rotate-90 -translate-x-full translate-y-12 bg-gray-900 group-hover:-rotate-180 ease"></span>
                    <span class="relative">{{ __('Download') }}</span>
                </span>
                <span
                    class="absolute bottom-0 right-0 w-full h-12 -mb-1 -mr-1 transition-all duration-200 ease-linear bg-gray-900 rounded-lg group-hover:mb-0 group-hover:mr-0"
                    data-rounded="rounded-lg"></span>
            </a>
            <a href="#" wire:click.prevent="regenerateTip" class="relative inline-block text-lg group ml-4" wire:loading.class="pointer-events-none opacity-50">
                <span
                    class="relative z-10 block px-5 py-3 overflow-hidden font-medium leading-tight text-gray-800 transition-colors duration-300 ease-out border-2 border-gray-900 rounded-lg group-hover:text-white">
                    <span class="absolute inset-0 w-full h-full px-5 py-3 rounded-lg bg-gray-50"></span>
                    <span
                        class="absolute left-0 w-48 h-48 -ml-2 transition-all duration-300 origin-top-right -rotate-90 -translate-x-full translate-y-12 bg-gray-900 group-hover:-rotate-180 ease"></span>
                    <span class="relative animate-spin"><i class="fa-solid fa-rotate" wire:loading.class="fa-spin"></i></span>
                </span>
                <span
                    class="absolute bottom-0 right-0 w-full h-12 -mb-1 -mr-1 transition-all duration-200 ease-linear bg-gray-900 rounded-lg group-hover:mb-0 group-hover:mr-0"
                    data-rounded="rounded-lg"></span>
            </a>
        </div>
    </div>
    @section('custom_javascript')
        <script>
            html2canvas(document.querySelector("#capture")).then(function(canvas) {
                var canvasWidth = canvas.width;
                var canvasHeight = canvas.height;
                var img = Canvas2Image.convertToImage(canvas, canvasWidth, canvasHeight);
                document.getElementById("capture-screenshot").addEventListener("click", function(e) {
                    e.preventDefault();
                    Canvas2Image.saveAsImage(canvas, canvasWidth, canvasHeight, 'png', document.getElementById('tip_name').value);
                });
            });
        </script>
    @endsection
</div>
