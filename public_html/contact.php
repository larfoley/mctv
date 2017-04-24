<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/../inc/header.php';
$pageTitle = "Contact";
 ?>

   <div class="page-header white padding-vertical x2 black-text">
     <div class="container">
       <h2 class="margin-none big-title">Contact</h2>
     </div>
   </div>

   <div class="padding-vertical x4">

     <div class="container">
     <div class="grid">
       <div class="grid__col grid__col--7-of-12">
         <form class="form u-box"
               action="https://formspree.io/lar_x87@yahoo.com"
               method="POST">
               <h2>Leave a Message</h2>
           <div class="form__field">
             <input required class="form__input" type="text" name="first_name" value="" placeholder="First Name">
           </div>
           <div class="form__field">

             <input required class="form__input" type="text" name="last_name" value="" placeholder="Last Name">
           </div>
           <div class="form__field">
             <input required type="email" class="form__input" name="_replyto" value="" placeholder="Email Name">
           </div>
           <div class="form__field">
             <textarea required class="form__textarea"  placeholder="Leave a message" name="name" rows="8" cols="80"></textarea>
           </div>
           <div class="form__field">
             <input class="btn-primary" type="submit" value="Send Message">
           </div>
         </form>
       </div>
       <div class="grid__col grid__col--5-of-12">
         <div class="u-box">
           <h2>Contact Details</h2>
           <table class="contact-details">
             <tr>
               <th class="primary-color-text">Email</th>
               <td>info@mctv.ie</td>
             </tr>
             <tr>
               <th class="primary-color-text">Phone</th>
               <td>+353 185 198 87</td>
             </tr>
             <tr>
               <th class="primary-color-text">Address</th>
               <td>
                27 Cruise Street,
                Limerick,
                Ireland
               <td>
             </tr>
           </table>
         </div>
       </div>
     </div>
   </div>

   </div>

   <div class="black">
     <div class="container">

     </div>
   </div>
  </body>
</html>
