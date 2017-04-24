<?php

$sql = $conn->query("SELECT * FROM blog_posts ");
$blogPosts = $sql->fetch();

foreach ($blogPosts as $post) {
  ?>
  <li class="blog_post">
    blog post
  </li>
  <?php
}
