

<form  enctype="multipart/form-data" wire:submit.prevent="submit"  >

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

    <div class="mt-4">
        <x-jet-label for="audio" value="{{ __('Input audio file') }}" />
        <input id="audio" class="block mt-1 w-full"  type="file" wire:model="audio"   required  />
{{ $audio }}
    </div>




    <div class="flex items-center justify-end mt-4">

<x-jet-button wire:click="submit"> submit</x-jet-button>
    </div>
    <div class="flex items-center justify-end mt-4">

<x-jet-button wire:click="recieve">recieve past jobs</x-jet-button>
    </div>


</form>

