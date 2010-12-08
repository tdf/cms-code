<?php
/**
 * Test Call for Faqs Module
 * @author Rui Godinho
 *
 */
class FaqsPageTest extends SapphireTest {
	static $fixture_file = 'faqs/tests/FaqsPageTest.yml';

	/**
	 * Testing the two pages defined at yml file
	 * @return void
	 */
    function testGetAllFaqsPages() {
        $faqspage = $this->fixture->objFromFixture('FaqsPage', 'faq1');
        $this->assertContains('Faq Number 1', $faqspage->Title);
        
        $faqspage = $this->fixture->objFromFixture('FaqsPage', 'faq2');
        $this->assertContains('Faq Number 2', $faqspage->Title);        
    }
}
