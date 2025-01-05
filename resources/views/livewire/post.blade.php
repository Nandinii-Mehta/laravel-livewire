<div>
    <h1>Hello</h1>

    @if ($updatePost)
        @include('livewire.update')
    @endif

    @if (!$addPost)
        <button wire:click="addPost()" class="btn btn-primary btn-sm">Add New Post</button>
    @endif

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($posts) > 0)
                    @foreach ($posts as $post)
                        <tr>
                            <td>
                                {{ $post->title }}
                            </td>
                            <td>
                                {{ $post->description }}
                            </td>
                            <td>
                                <button wire:click="editPost({{ $post->id }})"
                                    class="btn btn-primary btn-sm">Edit</button>
                                {{-- <button onclick="deletePost({{ $post->id }})" --}}
                                    {{-- class="btn btn-danger btn-sm">Delete</button> --}}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3" align="center">
                            No Posts Found.
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

</div>
