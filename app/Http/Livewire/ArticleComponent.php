<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use App\Models\Article;
use App\Models\Tag;
use App\Models\Category;
use App\Models\User;

class ArticleComponent extends Component
{
    use WithFileUploads;

    public $article;
    public $modalFormVisible = false;    
    public $deleteModalFormVisible = false;    
    public $image;

    /**
     * Shows the form modal 
     * of delete function
     * @return void
     */

    public function deleteShowModal()
    {
        $this->deleteModalFormVisible = true;
       
    }
    /**
     * Shows the form modal 
     * of edit function
     * @return void
     */

    public function editShowModal()
    {
        $this->modalFormVisible = true;
       
    }
    
    /**
     * Update article image 
     * 
     * @return void
     */

    public function updateImage()
    {
          
        // Upload image to the post_images directory

        $this->validate([
            'image' => 'image|max:4096', 
        ]);

        // Delete old image
        $oldImage = $this->article->image;
        File::delete(public_path('storage/'.$oldImage));
        
        $image_path = $this->image->store('post_images', 'public');
        
        $arrayToStore = ['image' => $image_path];
        
        // Update new image
        $this->article->update($arrayToStore);
        

        $this->modalFormVisible = true;
       
    }

    
    
    /**
     * The livewire render function.
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.article-component');
    }
}
