<form wire:submit="handleFolderUpload">
    {{-- <input type="file" wire:model="file"> --}}
    <input type="file" wire:model="folder" directory webkitdirectory mozdirectory multiple>
    <x-primary-button>アップロード</x-primary-button>
</form>
