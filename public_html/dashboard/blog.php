<?php

include_once $_SERVER["DOCUMENT_ROOT"] . '/../inc/dashboard-header.php';

?>

<div class="container">
  <h2>Create Blog Post</h2>
  <form class="form"
        method="POST">
    <div class="form__field">
      <input class="form__input" type="text" name="title" value="" placeholder="Author">
    </div>
    <div class="form__field">
      <input class="form__input" type="text" name="title" value="" placeholder="Title">
    </div>
    <div class="form__field">
      <textarea class="form__textarea"  placeholder="Enter blog post here" name="msg" rows="8" cols="80"></textarea>
    </div>
    <div class="form__field">
      <input class="btn-primary" type="submit" value="Send Newsletter">
    </div>
  </form>
</div>
