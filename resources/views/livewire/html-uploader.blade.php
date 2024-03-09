<form wire:submit="handleFileUpload">
    <input type="file" wire:model="file">
    <x-primary-button>アップロード</x-primary-button>
</form>

@script
    <script>
        $wire.on('file-uploaded', () => {
            console.log(@this.get('blocks'));
            // editor.data = JSON.stringify(blocks);
        })
    </script>
@endscript
