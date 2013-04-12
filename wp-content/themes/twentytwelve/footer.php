<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</div><!-- #main .wrapper -->
	 <section class="pre-footer clearfix _wrap">
        <div class="col5">
            <h3>Trading 247</h3>
            <ul>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Binary Option</a></li>
                <li><a href="#">One Touch Option</a></li>
                <li><a href="#">Option Builder</a></li>
                <li><a href="#">Buy Me Out</a></li>
                <li><a href="#">Asseet Index</a></li>
            </ul>
        </div>
        <div class="col5">
            <h3>Information</h3>
            <ul>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">How To Trade</a></li>
                <li><a href="#">Banking</a></li>
                <li><a href="#">Expired Rates</a></li>
                <li><a href="#">Glossary</a></li>
                <li><a href="#">Learn More</a></li>
                <li><a href="#">Why Trading247?</a></li>
            </ul>
        </div>
        <div class="col5">
            <h3>Anylyst Review</h3>
            <ul>
                <li><a href="#">Daily Review</a></li>
                <li><a href="#">Weekly Market Review</a></li>
            </ul>
        </div>
        <div class="col5">
            <h3>Partners</h3>
            <ul>
                <li><a href="#">Refer a Friend</a></li>
            </ul>
        </div>
        <div class="col5">
            <h3>Privacy and Policy</h3>
            <ul>
                <li><a href="#">Disclaimer</a></li>
                <li><a href="#">Expiry Rates Rules</a></li>
                <li><a href="#">Terms & Conditions</a></li>
                <li><a href="#">Privacy & Policy</a></li>
            </ul>
        </div>
    </section>
    <footer class="_wrap">
        <div class="cert-awards">
            <img src="<?php bloginfo('template_url'); ?>/images/cert-n-awards.png" alt="Trading247 Certificate and Awards" />
        </div>
        <article>
            <h4>Powered by ChargeXP</h4>
            <p>Important risk note: option trading involves significant risk. We strongly advise that you read carefully all our terms and conditions before making any investments. The levels we present on our site are the ones TRADING247 is willing to sell options at and are not the real time market levels.</p>
            <p>Customers must be aware of their individual capital gain tax liability in their country of residence Binary option trading on the TRADING247 platform offers a payout of 75% if an option expires in-the-money and a 10% return if the option expires out-of-the-money (you may lose 90% of your investment).</p>
            <?php dynamic_sidebar('iframe-tracking-widget'); ?>
        </article>
        <div class="cert-awards">
            <img src="<?php bloginfo('template_url'); ?>/images/logobar.png" alt="Accreditations"/>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>