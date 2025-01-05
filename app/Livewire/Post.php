<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post as Posts;

class Post extends Component
{

    public $posts, $title, $description, $postId, $updatePost = false, $addPost = false;

    // protected $listeners = [
    //     'deletePostListener' => 'deletePost'
    // ];

    protected $rules = [
        'title' => 'required',
        'description' => 'required'
    ];

    public function resetFields()
    {
        $this->title = '';
        $this->description = '';
    }

    public function render()
    {
        $this->posts = Posts::select('id', 'title', 'description')->get();
        return view('livewire.post');
    }

    public function addPost()
    {
        $this->resetFields();
        $this->addPost = true;
        $this->updatePost = false;
    }

    public function storePost()
    {
        $this->validate();
        try {
            Posts::create([
                'title' => $this->title,
                'description' => $this->description,
            ]);
            session()->flash('success', 'Post Created Successfully!!');
            $this->resetFields();
            $this->addPost = false;
        } catch (\Exception $ex) {
            session()->flash('error', 'Something goes wrong');
        }
    }

    /**
     * update the post data
     * @return void
     */
    // public function updatePost()
    // {
    //     $this->validate();
    //     try {
    //         Posts::whereId($this->postId)->update([
    //             'title' => $this->title,
    //             'description' => $this->description
    //         ]);
    //         session()->flash('success', 'Post Updated Successfully!!');
    //         $this->resetFields();
    //         $this->updatePost = false;
    //     } catch (\Exception $ex) {
    //         session()->flash('success', 'Something goes wrong!!');
    //     }
    // }

    /**
     * Cancel Add/Edit form and redirect to post listing page
     * @return void
     */
    public function cancelPost()
    {
        $this->addPost = false;
        $this->updatePost = false;
        $this->resetFields();
    }

    /**
     * delete specific post data from the posts table
     * @param mixed $id
     * @return void
     */
    // public function deletePost($id)
    // {
    //     try {
    //         Posts::find($id)->delete();
    //         session()->flash('success', "Post Deleted Successfully!!");
    //     } catch (\Exception $e) {
    //         session()->flash('error', "Something goes wrong!!");
    //     }
    // }
}
