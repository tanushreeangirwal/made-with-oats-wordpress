<?php
/**
 * Template Name: FAQ Page
 *
 * @package Made_With_Oats
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="shop-hero-banner">
        <div class="container">
            <span class="eyebrow eyebrow-gold"><?php esc_html_e( 'COMMON QUESTIONS', 'made-with-oats' ); ?></span>
            <h1 class="page-title"><?php esc_html_e( 'Frequently Asked Questions', 'made-with-oats' ); ?></h1>
            <p><?php esc_html_e( 'Everything you need to know about our ingredients, storage, shipping, and ordering.', 'made-with-oats' ); ?></p>
        </div>
    </div>

    <div class="container container-narrow" style="padding-top: var(--space-3xl); padding-bottom: var(--space-4xl);">
        <div class="faq-accordion-group">
            <!-- FAQ 1 -->
            <div class="faq-item card">
                <h3 class="faq-question">What makes Made With Oats snacks better for me?</h3>
                <div class="faq-answer">
                    <p>We are a homegrown Indian brand focused on pure, honest snacking. We use 100% whole rolled oats, raw seeds (pumpkin, sunflower, flax), nuts, real dried fruits, and high-grade chocolate (including rich, indulgent dark chocolate for select recipes). We bake in small batches with zero artificial preservatives or hidden shortcuts.</p>
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="faq-item card">
                <h3 class="faq-question">How should I store my granolas, bites, and bars?</h3>
                <div class="faq-answer">
                    <ul>
                        <li><strong>Granolas &amp; Snack Bars:</strong> Store in a cool, dry place inside an airtight container away from direct sunlight. Shelf life is 30 days.</li>
                        <li><strong>Chocolate Rajgira Bites &amp; Bars:</strong> <em>Store in the refrigerator</em> to maintain their crisp, chocolatey crunch. Shelf life is 20 days.</li>
                    </ul>
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="faq-item card">
                <h3 class="faq-question">Is Cash on Delivery (COD) available?</h3>
                <div class="faq-answer">
                    <p>No. Cash on Delivery is <strong>NOT available</strong>. Because our snacks are freshly made to order in small artisanal batches, all orders must be prepaid through our secure online payment system (UPI, Cards, or NetBanking).</p>
                </div>
            </div>

            <!-- FAQ 4 -->
            <div class="faq-item card">
                <h3 class="faq-question">What are your shipping rates and delivery timelines?</h3>
                <div class="faq-answer">
                    <p>We deliver nationwide through our trusted courier partners:</p>
                    <ul>
                        <li><strong>Maharashtra Deliveries:</strong> Flat ₹80 per order.</li>
                        <li><strong>Outside Maharashtra / Rest of India:</strong> Flat ₹100 per order.</li>
                        <li><strong>Free Shipping:</strong> Automatically applied on all orders of <strong>₹1299 or more</strong>.</li>
                        <li><strong>Timelines:</strong> Maharashtra deliveries typically arrive within ~5&ndash;7 business days. Deliveries outside Maharashtra take approximately 7&ndash;10 business days.</li>
                    </ul>
                </div>
            </div>

            <!-- FAQ 5 -->
            <div class="faq-item card">
                <h3 class="faq-question">How does the Diwali Gift Hamper selection work?</h3>
                <div class="faq-answer">
                    <p>Our Diwali Hamper (₹750) comes in a luxury collapsible fancy gift box holding 3 reusable 100g glass jars. You can select any 3 of your favourite granola flavours (Dark Chocolate Blueberry &amp; Cranberry, Peanut Butter &amp; Dark Chocolate, or Almond Raisin) to tailor your gift.</p>
                </div>
            </div>

            <!-- FAQ 6 -->
            <div class="faq-item card">
                <h3 class="faq-question">Do your products contain allergens?</h3>
                <div class="faq-answer">
                    <p>Several of our products contain tree nuts (such as almonds) and peanuts. Products containing chocolate bites and bars note: <em>&ldquo;made in space with Nuts&rdquo;</em>. Please check the individual product page for specific ingredient lists prior to purchase.</p>
                </div>
            </div>
        </div>

        <div class="faq-footer-callout">
            <h3>Still have a question?</h3>
            <p>Our kitchen team is always happy to help you pick the right snack.</p>
            <div class="faq-btn-group">
                <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn-primary">Contact Us</a>
                <a href="https://wa.me/918355869270" class="btn btn-outline" target="_blank" rel="noopener">WhatsApp Support</a>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
