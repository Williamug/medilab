<div>
    <div class="fixed inset-0 bg-slate-900 bg-opacity-30 z-50 transition-opacity py-12  duration-150 ease-in-out  top-0 right-0 bottom-0 left-0 overflow-y-auto min-h-screen"
        id="modal">
        <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-lg">
            <div class="relative py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">
                <div>
                    <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4">
                        {{ $title }}
                    </h1>
                    <hr />
                    <div class="mb-4"></div>
                </div>

                <div>
                    {{ $content }}
                </div>

                <div class="flex items-center justify-start w-full">
                    {{ $footer }}
                </div>
            </div>
        </div>
    </div>
</div>
