<?php

namespace App\Livewire;

use App\Models\Post as Posts;
use Livewire\Component;

class Post extends Component
{
    public $posts, $title, $description, $postId;
    public $edit = false;
    public $addPost = false;

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

    //to return create page
    public function createPost()
    {
        $this->resetFields();
        $this->addPost = true;
        $this->edit = false;
    }

    //to store OR insert data that is submitted to form
    public function storePost()
    {

        $this->validate();
        try {
            Posts::create([
                'title' => $this->title,
                'description' => $this->description
            ]);
            session()->flash('success', 'Post Created Successfully!!');
            $this->addPost = false;
        } catch (\Exception $ex) {
            session()->flash('error', 'Something goes wrong!!');
        }
    }

    public function editPost($id)
    {
        try {
            $post = Posts::findOrFail($id);
            if (!$post) {
                session()->flash('error', 'Post not found');
            } else {
                $this->title = $post->title;
                $this->description = $post->description;
                $this->postId = $post->id;
                $this->edit = true;
                $this->addPost = false;
            }
        } catch (\Exception $ex) {
            session()->flash('error', 'Something goes wrong!!');
        }
    }

    public function updatePost()
    {
        $this->validate();
        try {
            Posts::whereId($this->postId)->update([
                'title' => $this->title,
                'description' => $this->description
            ]);
            session()->flash('success', 'Post Updated Successfully!!');
            $this->resetFields();
            $this->edit = false;
        } catch (\Exception $ex) {
            session()->flash('success', 'Something goes wrong!!');
        }
    }

    public function deletePost($id){
        try{
            Posts::find($id)->delete();
            session()->flash('success','Post Deleted Successfully');
        }catch(\Exception $ex){
            session()->flash('error','Something went wrong');
        }
    }
}
