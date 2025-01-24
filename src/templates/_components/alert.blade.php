<div class="p-4 mb-4 text-white rounded-lg
    @if($type === 'success') bg-green-500
    @elseif($type === 'error') bg-red-500
    @elseif($type === 'warning') bg-yellow-500
    @endif">
    {{ $message }}
</div>
