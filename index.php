<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style/main.css">

    <title>Template</title>
</head>
<body>

    <header id="myHeader" class="header">
        <div class="nav-container nav-bar">
            <a href="index.php" class="logo">Logo</a>
            <nav class="nav">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#products">Products</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <side>
    <nav class="side_nav">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#products">Products</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
    </side>

    <main id="products">
        <div class="container">
            <div class="grid">
                <div class="grid-item"><img src="https://picsum.photos/id/237/400/400" alt="rand img"></div>
                <div class="grid-item"><img src="https://picsum.photos/id/256/400/400" alt="rand img"></div>
                <div class="grid-item"><img src="https://picsum.photos/id/600/400/400" alt="rand img"></div>
                <div class="grid-item"><img src="https://picsum.photos/id/213/400/400" alt="rand img"></div>
                <div class="grid-item"><img src="https://picsum.photos/id/278/400/400" alt="rand img"></div>
                <div class="grid-item"><img src="https://picsum.photos/id/265/400/400" alt="rand img"></div>

                <div class="grid-item"><img src="https://picsum.photos/id/288/400/400" alt="rand img"></div>
                <div class="grid-item"><img src="https://picsum.photos/id/266/400/400" alt="rand img"></div>
                <div class="grid-item"><img src="https://picsum.photos/id/900/400/400" alt="rand img"></div>
                <div class="grid-item"><img src="https://picsum.photos/id/300/400/400" alt="rand img"></div>
                <div class="grid-item"><img src="https://picsum.photos/id/567/400/400" alt="rand img"></div>
                <div class="grid-item"><img src="https://picsum.photos/id/568/400/400" alt="rand img"></div>

                <div class="grid-item"><img src="https://picsum.photos/id/212/400/400" alt="rand img"></div>
                <div class="grid-item"><img src="https://picsum.photos/id/216/400/400" alt="rand img"></div>
                <div class="grid-item"><img src="https://picsum.photos/id/236/400/400" alt="rand img"></div>
                <div class="grid-item"><img src="https://picsum.photos/id/290/400/400" alt="rand img"></div>
                <div class="grid-item"><img src="https://picsum.photos/id/291/400/400" alt="rand img"></div>
                <div class="grid-item"><img src="https://picsum.photos/id/292/400/400" alt="rand img"></div>
            </div>
        </div>
    </main>

    <section id="about" class="about">
        <div class="container">
            <div class="row">
                <h1>About Us</h1>
                <div class="col">
                    <h2>Quality Service</h2>
                    <p>For full colour printing on, Coasters, Paper Bags, Paper Bags with Handles, Wood Coasters, Boxes Jiffy Bags and more</p>
                </div>
                <div class="col">
                    <h2>Custom & High volume jobs</h2>
                    <p>We provide 1 off, batches or full variable data printing at over 3,600 per hour</p>
                </div>
                <div class="col">
                    <h2>Local business</h2>
                    <p>Your local solution or national supplier with quck turn round</p>
                </div>
            </div>
        </div>
    </section>

    <?php if(isset($_POST['cf_submit'])) {    
        $errors = array();
        $success = null;
        
        $required_fields['cf_name'] = 'You are required to enter your Name.';
        $required_fields['cf_email'] = 'You are required to enter your E-mail Address.';
        $required_fields['cf_subject'] = 'You are required to enter a Subject.';
        $required_fields['cf_message'] = 'You are required to enter a Message.';
                        
        foreach($_POST as $key => $value) {
            if(array_key_exists($key, $required_fields)) {
              if(trim($_POST[$key]) === '') {
                  $errors[$key] = $required_fields[$key];
                }
            }
          }
    
          if(empty($errors)) {
              $to = "sales@digitalprintltd.com";                 // change this to desired receiving email address
              $subject = $_POST['cf_subject'];
              $name_field = $_POST['cf_name'];
              $email_field = $_POST['cf_email'];
              $message = $_POST['cf_message'];
              $company = $_POST['cf_company'];
              
              $body = "From: $name_field\n Company: $company\n E-Mail: $email_field\n Message:\n $message";
              $success = mail($to, $subject, $body);
          }
          
          if($success) {
                    echo "<p><strong>Thank you for getting in touch. Expect to hear back from us soon.</strong></p>";
              } else {
                    echo "<strong>Error sending email! </strong>";
              }
          }
    
          if(!empty($errors)) {
              echo "<strong>Please check the following errors:</strong><br/><br/>";
              echo "<ul>";
              foreach($errors as $value) {         
                    echo "<li>$value</li>";      
              }
              echo "</ul>";
          } ?>
    
          <section id="contact" class="main_form">
            <div class="container">
              <div class="main_form_bg">
                <div>
                  <h1 class="form__title">Contact Us</h1>
                </div>
                <form action="" method="post">
                    <div class="form__row">
                      <input class="form__item form__name" name="cf_name" type="text" id="cf_name" class="cf_input" value="<?php if(isset($_POST['cf_name'])) echo $_POST['cf_name'];?>" placeholder="Name*">
                      <input class="form__item form__email" name="cf_email" type="email" id="cf_email" class="cf_input" value="<?php if(isset($_POST['cf_email'])) echo $_POST['cf_email'];?>" placeholder="Email*">
                    </div>
                    <div class="form__row">
                      <input class="form__item form__company" name="cf_company" type="text" id="cf_company" class="cf_input" value="<?php if(isset($_POST['cf_company'])) echo $_POST['cf_company'];?>" placeholder="Company*">
                      <input class="form__item form__subject" name="cf_subject" type="text" id="cf_subject"  class="cf_input" value="<?php if(isset($_POST['cf_subject'])) echo $_POST['cf_subject'];?>" placeholder="Subject*">
                    </div>
                    <textarea class="form__item form__message" name="cf_message" cols="45" rows="6" id="cf_message" value="<?php if(isset($_POST['cf_message'])) echo $_POST['cf_message'];?>" placeholder="Message*" class="cf_text"></textarea>
                    <div class="form__row">
                      <button class="form__item form__submit" type="submit" name="cf_submit">Send Message</button>
                    </div>
                </form>
              </div>
            </div>
        </section>

        <script>
            const header = document.querySelector('.header');
            const side_nav = document.querySelector('.side_nav');

            const navOptions = {
            };

            const navObserver = new IntersectionObserver
            (function(
                entries,
                sideNavObserver
            ) {
                entries.forEach(entry => {
                    console.log(entry.target);
                    if(!entry.isIntersecting) {
                        side_nav.classList.add("nav-scrolled");
                    } else {
                        side_nav.classList.remove("nav-scrolled")
                    }
                });
            },
            navOptions);

            navObserver.observe(header);

        </script>

</body>
</html>