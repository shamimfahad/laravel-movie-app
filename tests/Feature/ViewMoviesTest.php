<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewMoviesTests extends TestCase
{
    public function the_main_page_shows_correct_info() 
    {
      $response = $this->get(route('movies.index'));

      $response->assertSuccessful();
    }
}
