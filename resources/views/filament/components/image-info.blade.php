<div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
    <div class="flex items-center gap-4">
        <img src="{{ $path }}" alt="Banner Preview" class="w-32 h-20 object-cover rounded-lg border border-gray-300">
        <div>
            <div class="text-sm font-medium text-gray-700">Image Details</div>
            <div class="text-sm text-gray-600">
                <span class="inline-block mr-4">Dimensions: <strong>{{ $width }}x{{ $height }}</strong></span>
                <span class="inline-block mr-4">Size: <strong>{{ $fileSize }} KB</strong></span>
                <span class="inline-block">
                    Quality: 
                    <span class="px-2 py-0.5 rounded-full text-xs font-semibold 
                        @if($quality == 'High') bg-green-100 text-green-800
                        @elseif($quality == 'Medium') bg-yellow-100 text-yellow-800
                        @else bg-red-100 text-red-800 @endif">
                        {{ $quality }}
                    </span>
                </span>
            </div>
            @if($width < 1080)
                <div class="mt-2 text-xs text-red-600">
                    ⚠️ Image is below recommended width (1080px). For best quality, use at least 1920px width.
                </div>
            @elseif($width < 1920)
                <div class="mt-2 text-xs text-yellow-600">
                    ℹ️ Image width is {{ $width }}px. For optimal quality, use 1920px or wider.
                </div>
            @else
                <div class="mt-2 text-xs text-green-600">
                    ✅ Image meets recommended dimensions (1920px+).
                </div>
            @endif
        </div>
    </div>
</div>
