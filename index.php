<?php get_header(); ?>
<!-- About -->

<section name="About">
<div class="content">
  <div class="container">
    <h3 class="title">About</h3>
    <div class="row">
      <div class="col-md-6">
    <div class="bio">
    <p>I am a self-taught front end developer with a degree in public relations. When I'm not writing code I am probably playing around on Sketch practicing UI design. <br>
I am currently learning: <em style="color: #afaded">iOS development</em>. </p>
       <div class="social">
      <ul>
        <li>
          <a href="mailto:smith.carmen7@gmail.com">
            <i class="fa fa-lg fa-envelope" aria-hidden="true">
          </i>
          </a>
        </li>
        <li>
          <a href="https://www.linkedin.com/in/carmendsmith" target="blank">
            <i class="fa fa-lg fa-linkedin">
           </i>
          </a>
        </li>
        <li>
          <a href="https://github.com/heyitscarms" target="blank">
            <i class="fa fa-lg fa-github">
          </i>
          </a>
        </li>
         <li>
          <a href="https://codepen.io/HeyitsCarms/" target="blank">
            <i class="fa fa-codepen">
          </i>
          </a>
        </li>
        <li>
          <a href="https://www.behance.net/irokwitrok6b5b" target="blank">
            <i class="fa fa-behance">
          </i>
          </a>
        </li>
      </ul>
    </div>
        </div>
      </div>
        <div class="bio skills col-md-3">
          Skills
          <ul class="skills">
            <li>HTML</li>
            <li>CSS</li>
            <li>JavaScipt</li>
            <li>jQuery</li>
            <li>Adobe Creative Suite</li>
          </ul>
      </div>
          <div class="bio skills col-md-3">
            <ul class="skills">
            <li>Social Media</li>
            <li>Writing</li>
            <li>Photography</li>
            <li>Videography</li>
            </ul>
      </div>
  </div>
        </div>
  </div>
  <!--end of About -->
  <div class="container">
     <div class="content portfolio">
       <a name="Portfolio"></a>
       <h3 class="title"> Work </h3>
  <?php
    $args=array(
       'post_type' => 'post',
       'post_status' => 'publish',
       'posts_per_page' => 4
      );

    $my_query = null;
    $my_query = new WP_Query($args);

    if( $my_query->have_posts() ) {

      $i = 0;
      while ($my_query->have_posts()) : $my_query->the_post();
    if($i % 4 == 0) { ?>

    <div class="row">

    <?php
    }
    ?>

      <div class="col-md-4">
        <div class="my-inner">
          <div class="hover">
            <?php the_post_thumbnail(); ?>
            <div class="overlay">
              <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
                <?php the_title(); ?></a></h2>
              </div>
            </div>
          </div>
        </div>
        <?php $i++;
        if($i != 0 && $i % 3 == 0) { ?>
          </div><!--/.row-->
          <div class="clearfix"></div>

        <?php
         } ?>

        <?php
          endwhile;
          }
          wp_reset_query();
          ?>
</div><!--/.container-->
       </div>
  <!-- Contact & Social -->
  <div class= "container" id="primary">
    <div id="content" role="main" class="contact">
      <h3 class="title">Contact</h3>
      <p>
        Does your business need a website? Are you looking to gain a following through social media? Do you have an idea for a mobile app but need a design that attracts users? Fill out the form below and I will get back with you ASAP.
      </p>
      <font color="#FF0000">
      <?php if(isset($_POST['submit']))
      {
         $flag=1; if($_POST['yourname']=='') { $flag=0; echo "Please Enter Your Name<br>";
         } else if(!preg_match('/[a-zA-Z_x7f-xff][a-zA-Z0-9_x7f-xff]*/',$_POST['yourname'])) {
       $flag=0; echo "Please Enter Valid Name<br>";
     }
     if($_POST['email']=='')
     {
       $flag=0; echo "Please Enter E-mail<br>";
     } else if(!eregi("^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$", $_POST['email'])) { $flag=0; echo "Please Enter Valid E-Mail<br>"; } if($_POST['subject']=='')
      {
         $flag=0; echo "Please Enter Subject<br>";
       } if($_POST['message']=='')
      { $flag=0; echo "Please Enter Message";
    }
      if ( empty($_POST) ) { print 'Sorry, your nonce did not verify.'; exit;
    }
      else {
        if($flag==1)
      {
        wp_mail(get_option("admin_email"),trim($_POST[yourname])." sent you a message from ".get_option("blogname"),stripslashes(trim($_POST[message])),"From: ".trim($_POST[yourname])." <".trim($_POST[email]).">rnReply-To:".trim($_POST[email])); echo "Mail Successfully Sent";
      }
     }
    }
      ?>
    </font>
      <form method="post" id="contactForm">
        Your Name:<input type="text" name="yourname" id="yourname" rows="1" value="" />
      <br /><br />
      Your Email:<input type="text" name="email" id="email" rows="1" value="" />
      <br /><br />
       Subject:<input type="text" name="subject" id="subject" rows="1" value=""></p>
       <br /><br />
       Message:<textarea name="message" id="message" >
       </textarea>
       <br /><br />
        <input type="button" name="submit" id="submit" value="Send"/>
     </form>
    </div><!-- #content -->
  </div><!-- #primary -->
<?php get_footer(); ?>
