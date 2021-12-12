<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;

class PostComponent extends Component
{
    use WithPagination;

    public $title, $body;
    public $view = 'create';

    public function render()
    {
        return view('livewire.post-component', [
            'posts'=> Post::orderBy('id', 'desc')->paginate(8),
        ]);
    }

    public function store()
    {
        $this->validate(['title' => 'required', 'body' => 'required']);

        $post = Post::create([
            'title'=> $this->title,
            'body'=> $this->body,
        ]);

        $this->edit($post->id);
    }

    public function edit($id)
    {
        $post = Post::find($id);

        $this->title = $post->title;
        $this->body = $post->body;

        $this->view = 'edit';
    }

    public function destroy($id)
    {
        Post::destroy($id);
    }

    public function default()
    {
        $this->title = '';
        $this->body = '';

        $this->view = 'create';
    }
}
