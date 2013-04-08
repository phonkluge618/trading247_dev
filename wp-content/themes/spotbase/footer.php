<?php wp_footer();?>

       
<div id="Footer">
     <div id="footerIPernet"></div>
        	
     <div id="home-footerMenu-global" class=" footerMenu-global">
            <div  class="listContainer">
                <h4><?php _e('Langz','spot');?></h4>
                <?php wp_nav_menu( array( 'theme_location' => 'first-footer-menu', 'menu_class' => 'footer-links-menu' ) ); ?>
            </div>
            <div  class="listContainer">
                <h4><?php _e('Information','spot');?></h4>
                <?php wp_nav_menu( array( 'theme_location' => 'second-footer-menu', 'menu_class' => 'footer-links-menu' ) ); ?>
            </div>
         <div  class="listContainer">
                <h4><?php _e('Analyst Review','spot');?></h4>
                <?php wp_nav_menu( array( 'theme_location' => 'third-footer-menu', 'menu_class' => 'footer-links-menu' ) ); ?>
            </div>
         <div  class="listContainer">
                <h4><?php _e('Partners','spot');?></h4>
                <?php wp_nav_menu( array( 'theme_location' => 'forth-footer-menu', 'menu_class' => 'footer-links-menu' ) ); ?>
            </div>
         <div  class="listContainer">
                 <h4><?php _e('Privacy Policy','spot');?></h4>
                <?php wp_nav_menu( array( 'theme_location' => 'fifth-footer-menu', 'menu_class' => 'footer-links-menu' ) ); ?>
            </div>
            <div class="cb"></div>
     </div>
     
     <div class="footerBottom">
	 <div class="logobar"></div>
     </div>
        
    <div class="powered">
        <a href="http://www.spotoption.com" title="Spotoption"> 
	<div id="spotLogo"></div>
        </a>
    </div>
     <div class="GEdit disclaimerText"><?php _e('
         Trading digital options has some risks of partial or full funds loss.
         This fact should be taken into consideration by any trader who is planning to make profits by option trading.
         langz advises its clients to read our terms and conditions carefully before opening positions on our platform.
         Digital options quotes displayed on the langz platform are indicative rates that the company is prepared to sell options at
         <br>and may not correspond to either live market quotations or quoted rates at the point of sale.
         <font style="color: rgb(0, 0, 0); " size="2"></font><br style="color: rgb(250, 246, 245);">','spot'); ?>
     </div>
</div>
            

</body>
</html>