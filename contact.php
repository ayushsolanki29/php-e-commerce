<!DOCTYPE html>
<html lang="en">

<head>
   <!--- primary meta tag-->
   <title>E Learning - The Best Program to Enroll for Exchange</title>
   <meta name="title" content="EduWeb - The Best Program to Enroll for Exchange">
   <meta name="description" content="This is an education html template made by codewithsadee">
   <?php include 'pages/header.php'?>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <style>
      @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600;700&display=swap');

      :root {
         --main-color: hsl(170, 75%, 41%);
         --red: #e74c3c;
         --orange: #f39c12;
         --light-color: #888;
         --light-bg: #eee;
         --black: #2c3e50;
         --white: #fff;
         --border: .1rem solid rgba(0, 0, 0, .2);
      }

      * {
         font-family: 'Nunito', sans-serif;
         margin: 0;
         padding: 0;
         box-sizing: border-box;
         outline: none;
         border: none;
         text-decoration: none;

      }

      body {
         background-color: #eee;
      }

      *::selection {
         background-color: var(--main-color);
         color: #fff;
      }

      html {
         font-size: 62.5%;
         overflow-x: hidden;
      }

      html::-webkit-scrollbar {
         width: 1rem;
         height: .5rem;
      }

      html::-webkit-scrollbar-track {
         background-color: transparent;
      }

      html::-webkit-scrollbar-thumb {
         background-color: var(--main-color);
      }

      section {
         padding: 2rem;
         margin: 0 auto;
         max-width: 1200px;
      }

      .contact .row {
         display: flex;
         align-items: center;
         flex-wrap: wrap;
         gap: 1.5rem;
         margin-top: 80px;
      }

      .contact .row .image {
         flex: 1 1 50rem;
      }

      .contact .row .image img {
         width: 100%;
      }

      .contact .row form {
         flex: 1 1 30rem;
         background-color: var(--white);
         padding: 2rem;
         text-align: center;
      }

      .contact .row form h3 {
         margin-bottom: 1rem;
         text-transform: capitalize;
         color: var(--black);
         font-size: 2.5rem;
      }

      .contact .row form .box {
         width: 100%;
         border-radius: .5rem;
         background-color: var(--light-bg);
         margin: 1rem 0;
         padding: 1.4rem;
         font-size: 1.8rem;
         color: var(--black);
      }

      .contact .row form textarea {
         height: 20rem;
         resize: none;
      }

      .contact .box-container {
         display: grid;
         grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
         gap: 1.5rem;
         justify-content: center;
         align-items: flex-start;
         margin-top: 3rem;
      }

      .contact .box-container .box {
         text-align: center;
         background-color: var(--white);
         border-radius: .5rem;
         padding: 3rem;
      }

      .contact .box-container .box i {
         font-size: 3rem;
         color: var(--main-color);
         margin-bottom: 1rem;
      }

      .contact .box-container .box h3 {
         font-size: 2rem;
         color: var(--black);
         margin: 1rem 0;
      }

      .contact .box-container .box a {
         display: block;
         padding-top: .5rem;
         font-size: 1.8rem;
         color: var(--light-color);
      }

      .contact .box-container .box a:hover {
         text-decoration: underline;
         color: var(--black);
      }
   </style>
</head>

<body id="top">

   <!-- 
    - #HEADER
  -->
   <?php include 'pages/navabar.php'?>
   <section class="contact">
      <div class="container">
         <div class="row">

            <div class="image">
               <img src="assets/images/contact-img.svg" alt="Contact Image" />
            </div>

            <form action="php/actions.php" method="post">
               <h3>get in touch</h3>
               <input type="text" placeholder="enter your name" name="name" required="" maxlength="50" class="box">
               <input type="email" placeholder="enter your email" name="email" required="" maxlength="50" class="box">
               <textarea name="msg" class="box" placeholder="enter your message" required="" maxlength="1000" cols="30"
                  rows="10"></textarea>
               <button type="submit" class="btn" name="contact">Send Message</button>
            </form>

         </div>

         <div class="box-container">

            <div class="box">
               <i class="fas fa-phone"></i>
               <h3>phone number</h3>
               <a href="tel:1234567890">123-456-7890</a>
               <a href="tel:1112223333">111-222-3333</a>
            </div>

            <div class="box">
               <i class="fas fa-envelope"></i>
               <h3>email address</h3>
               <a href="mailto:shaikhanas@gmail.com">shaikhanas@gmail.come</a>
               <a href="mailto:anasbhai@gmail.com">anasbhai@gmail.come</a>
            </div>

            <div class="box">
               <i class="fas fa-map-marker-alt"></i>
               <h3>office address</h3>
               <a href="#">flat no. 1, a-1 building, jogeshwari, mumbai, india - 400104</a>
            </div>

         </div>
      </div>
   </section>
   <?php include 'pages/footer.php'?>
</body>

</html>