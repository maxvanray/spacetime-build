<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Image;

class ImagesComposer
{
    /**
     * The image repository implementation.
     *
     * @var App/Image
     */
    protected $images;

    /**
     * Create a new profile composer.
     *
     * @param  Image  $images
     * @return void
     */
    public function __construct(Image $images)
    {
        // Dependencies automatically resolved by service container...
        $this->images = Image::all();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('images', $this->images->toArray());
    }
}