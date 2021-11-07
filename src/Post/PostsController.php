<?php

namespace App\Post;

use App\Core\AbstractController;

class PostsController extends AbstractController
{
  public function __construct(PostsRepository $postsRepository)
  {
      $this->postsRepository = $postsRepository;
  }

  public function index()
  {
      $posts = $this->postsRepository->fetchPosts();

      $this->render("post/index", [
        'posts' => $posts
      ]);
  }

  public function show()
  {
      $id = $_GET['id'];
      $post = $this->postsRepository->fetchPost($id);

      $this->render("post/show", [
        'post' => $post
      ]);
  }
}

 ?>
