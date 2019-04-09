<?php
/**
 * Created by PhpStorm.
 * User: marlamaedefensor
 * Date: 2019-03-15
 * Time: 13:03
 */

namespace Felis;


class HomeView extends View {
    /**
     * Constructor
     * Sets the page title and any other settings.
     */
    public function __construct() {
        $this->setTitle("Felis Investigations");
        $this->addLink("login.php", "Log in");
    }

    /**
     * Add content to the header
     * @return string Any additional comment to put in the header
     */
    protected function headerAdditional() {
        return <<<HTML
<p>Welcome to Felis Investigations!</p>
<p>Domestic, divorce, and carousing investigations conducted without publicity. People and cats shadowed
	and investigated by expert inspectors. Katnapped kittons located. Missing cats and witnesses located.
	Accidents, furniture damage, losses by theft, blackmail, and murder investigations.</p>
<p><a href="">Learn more</a></p>
HTML;
    }

    public function addTestimonial($testimonial, $name){
        $html = <<<HTML
<blockquote>
    <p>$testimonial</p>
    <cite>$name</cite>
</blockquote>
HTML;
        $this->testimonials[] = $html;
    }

    public function testimonials(){
        $html = <<<HTML
<section class="testimonials">
    <h2>TESTIMONIALS</h2>
    <div class="left">
HTML;
        for($i=0; $i<(sizeof($this->testimonials)/2); $i++){
            $html .= $this->testimonials[$i];
        }
        $html .= <<<HTML
    </div>
	<div class="right">
HTML;
        for($i=(sizeof($this->testimonials)/2); $i<sizeof($this->testimonials); $i++){
            $html .= $this->testimonials[$i];
        }
        $html .= <<<HTML
	</div>
</section>
HTML;
        return $html;

    }

    private $testimonials = [];

}