<!-- <h1>hello</h1> -->
<div class="card">
    <div class="card-header mx-6 ">
        <h1 class="font-semibold text-2xl underline">Edit Post</h1>
    </div>
    <div class="card-body">
        <form class="bg-white shadow-sm rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label class="block text-gray-700 text-md font-bold mb-2" for="title">
                    Title
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  wire:model="title" name="title" id="title" type="text" placeholder="Title">
                @error('title')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                    Description
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model="description" name="description" id="description" type="text" placeholder="Description">
                @error('description')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
            <div class="flex items-center justify-between">
            <button wire:click.prevent="updatePost" class="bg-blue-400 rounded-md p-3">Update</button>
            </div>
        </form>
    </div>
</div>