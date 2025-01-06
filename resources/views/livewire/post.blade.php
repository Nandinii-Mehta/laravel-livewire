<div class="container relative overflow-x-auto p-4">

    @if($addPost)
    @include('livewire.create')
    @endif

    @if($edit)
    @include('livewire.edit')
    @endif

    <h2 class="font-bold text-2xl py-2 p-4">Posts List</h2>

    @if(session()->has('success'))
    <div class="text-green-500" role="alert">
        {{ session()->get('success') }}
    </div>
    @endif

    @if(session()->has('error'))
    <div class="text-red-500" role="alert">
        {{ session()->get('error') }}
    </div>
    @endif

    @if(!$addPost)
    <button wire:click="createPost" class="p-2 m-3 bg-blue-300 rounded-md font-semibold">
        Add Post
    </button>
    @endif

    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Id
                </th>
                <th scope="col" class="px-6 py-3">
                    Title
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @if (count($posts) > 0)
            @foreach ($posts as $post)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    {{$post->id}}
                </td>
                <td class="px-6 py-4">
                    {{$post->title}}
                </td>
                <td class="px-6 py-4">
                    {{$post->description}}
                </td>
                <td class="px-6 py-4">
                    <button wire:click="editPost({{$post->id}})" class="p-2 bg-blue-400 rounded-md text-white">Edit</button>
                    <button onclick="" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="3" class="px-6 py-4">
                    No Posts Found.
                </td>
            </tr>
            @endif
        </tbody>
    </table>
</div>