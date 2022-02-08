

<form  enctype="multipart/form-data" wire:submit.prevent  >

    <div wire:loading>
        Loading......
    </div>
    <div wire:offline>
        You are now offline.....
    </div>

    <div class="mt-4">
        <textarea name="" id="" cols="40" rows="10">{{ $value }}</textarea>

    </div>
    <div class="mt-4">
        <x-jet-label for="email"   value="{{ __('input  email and audio file you want to transcribe') }}" />

    </div>

    <div class="mt-4">
        <x-jet-label for="email" value="{{ __('email') }}" />
        <x-jet-input id="email"  class="block mt-1 w-full" type="email"   name="email" required autocomplete="new-password" />
    </div>
    <div
    x-data="{ isUploading: false, progress: 0 }"
    x-on:livewire-upload-start="isUploading = true"
    x-on:livewire-upload-finish="isUploading = false"
    x-on:livewire-upload-error="isUploading = false"
    x-on:livewire-upload-progress="progress = $event.detail.progress"
>
<div x-show="isUploading">
    <progress max="100" x-bind:value="progress" class="p-5 w-1/2 bg-slate-900 "></progress>
</div>
    <div class="mt-4">
        <x-jet-label for="audio" value="{{ __('Input audio file') }}" />
        <x-jet-input id="audio" class="block mt-1 w-full" accept="audio/*" type="file" wire:model="audio"   required  />
        @error('audio') <span class="error">{{ $message }}</span> @enderror
    </div>




    <div class="flex items-center justify-end mt-4">

<x-jet-button wire:click="submit"> submit</x-jet-button>
    </div>
    <div class="flex items-center justify-end mt-4">

<x-jet-button wire:click="recieve">recieve past jobs</x-jet-button>
    </div>


</form>

