<!-- NAVBAR
    ================================================== -->
    
  <div class="navbar-wrapper">

    <nav class="navbar navbar-fixed-top" role="navigation"> 

      <div class="navbar-header">

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>               
             
      </div>
             <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav" id="menu-custom-menu">
                <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Home' ) ) ); ?>">Home</a></li>
                <li class="link-spoof" id="one">Bio</li>
                <li class="link-spoof" id="two">Artist Statement</li>          
                <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Contact' ) ) ); ?>">Contact</a></li>
              </ul>
            </div> 
            
       
    </nav><!-- navbar -->
  </div>

  <div class="bio hide" id="bio-one">
    <p><?php the_field('bio', 'option'); ?></p>
    <i class="fa fa-times closer"></i>
  </div>

  <div class="bio hide" id="bio-two">
    <p><?php the_field('mission', 'option'); ?></p>
    <i class="fa fa-times closer"></i>
  </div>



















