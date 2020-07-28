<?php
    include("header.php")
?>

<!-- breadcrumb begin breadcrumb-about-->
<div class="breadcrumb-todas ">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8">
                <div class="breadcrumb-content">
                    <h2 class="title">FAQ</h2>
                    <ul>
                        <li>
                            <a href="index.php">
                                Home
                            </a>
                        </li>
                        <li id="current-page">FAQ</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb end -->

<!-- faq begin -->
<div class="faq faq-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-9 col-lg-9">
                <div class="section-title">
                    <span class="subtitle">All Answers In One PLace</span>
                    <h2>Frequently Asked Questions</h2>
                    <p>Get answers to our most commonly asked questions about Todas.You can find the 
                        answers for the most common questions asked by our customers.
                        Please check this guide before contacting us.</p>
                </div>
            </div>
        </div>
 
        <div class="row justify-content-center">
            <div class="searchBar">
                <form>
                    <input type="text" name="search_text" id="search_text" placeholder="Your search text">
                    <button>
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="faq-content">
                    <div class="accordion" id="accordionExample">
                        <div id="result"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- faq end -->

<?php
    include("footer.php")
?>