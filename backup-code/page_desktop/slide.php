<?php echo "url_link = ".$url_link; ?>
<header class="header">
      <div class="row">
        <div class="large-12 columns">
          <div class="brand left">
            <h3>
              <a href="/OwlCarousel2/">owl.carousel.js</a> 
            </h3>
          </div>
          <a id="toggle-nav" class="right">
            <span></span> <span></span> <span></span> 
          </a> 
          <div class="nav-bar">
            <ul class="clearfix">
              <li> <a href="/OwlCarousel2/index.html">Home</a>  </li>
              <li class="active">
                <a href="/OwlCarousel2/demos/demos.html">Demos</a> 
              </li>
              <li> <a href="/OwlCarousel2/docs/started-welcome.html">Docs</a>  </li>
              <li>
                <a href="https://github.com/OwlCarousel2/OwlCarousel2/archive/2.3.4.zip">Download</a> 
                <span class="download"></span> 
              </li>
            </ul>
          </div>
        </div>
      </div>
    </header>

    <!-- title -->
    <section class="title">
      <div class="row">
        <div class="large-12 columns">
          <h1>Basic</h1>
        </div>
      </div>
    </section>

    <!--  Demos -->
    <section id="demos">
      <div class="row">
        <div class="large-12 columns">
          <div class="owl-carousel owl-theme">
            <div class="item">
              <h4>1</h4>
            </div>
            <div class="item">
              <h4>2</h4>
            </div>
            <div class="item">
              <h4>3</h4>
            </div>
            <div class="item">
              <h4>4</h4>
            </div>
            <div class="item">
              <h4>5</h4>
            </div>
            <div class="item">
              <h4>6</h4>
            </div>
            <div class="item">
              <h4>7</h4>
            </div>
            <div class="item">
              <h4>8</h4>
            </div>
            <div class="item">
              <h4>9</h4>
            </div>
            <div class="item">
              <h4>10</h4>
            </div>
            <div class="item">
              <h4>11</h4>
            </div>
            <div class="item">
              <h4>12</h4>
            </div>
          </div>
          <h3 id="overview">Overview</h3>
          <p>Basic usage of Owl Carousel. I used <code>loop:true</code> and <code>margin:10</code>. The structure works with any kind of DOM element. In all of my examples i used <code>&lt;div class=&quot;item&quot;&gt;...&lt;/div&gt;</code> but you could
            put any other element <code>div/span/a/img...</code></p>
          <h3 id="setup">Setup</h3>
          <pre><code>$(&#39;.owl-carousel&#39;).owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})</code></pre>
          <h3 id="html">html</h3>
          <pre><code>&lt;div class=&quot;owl-carousel owl-theme&quot;&gt;
    &lt;div class=&quot;item&quot;&gt;&lt;h4&gt;1&lt;/h4&gt;&lt;/div&gt;
    &lt;div class=&quot;item&quot;&gt;&lt;h4&gt;2&lt;/h4&gt;&lt;/div&gt;
    &lt;div class=&quot;item&quot;&gt;&lt;h4&gt;3&lt;/h4&gt;&lt;/div&gt;
    &lt;div class=&quot;item&quot;&gt;&lt;h4&gt;4&lt;/h4&gt;&lt;/div&gt;
    &lt;div class=&quot;item&quot;&gt;&lt;h4&gt;5&lt;/h4&gt;&lt;/div&gt;
    &lt;div class=&quot;item&quot;&gt;&lt;h4&gt;6&lt;/h4&gt;&lt;/div&gt;
    &lt;div class=&quot;item&quot;&gt;&lt;h4&gt;7&lt;/h4&gt;&lt;/div&gt;
    &lt;div class=&quot;item&quot;&gt;&lt;h4&gt;8&lt;/h4&gt;&lt;/div&gt;
    &lt;div class=&quot;item&quot;&gt;&lt;h4&gt;9&lt;/h4&gt;&lt;/div&gt;
    &lt;div class=&quot;item&quot;&gt;&lt;h4&gt;10&lt;/h4&gt;&lt;/div&gt;
    &lt;div class=&quot;item&quot;&gt;&lt;h4&gt;11&lt;/h4&gt;&lt;/div&gt;
    &lt;div class=&quot;item&quot;&gt;&lt;h4&gt;12&lt;/h4&gt;&lt;/div&gt;
&lt;/div&gt;</code></pre>
          <script>
            $(document).ready(function() {
              var owl = $('.owl-carousel');
              owl.owlCarousel({
                margin: 10,
                nav: true,
                loop: true,
                responsive: {
                  0: {
                    items: 1
                  },
                  600: {
                    items: 3
                  },
                  1000: {
                    items: 5
                  }
                }
              })
            })
          </script>
        </div>
      </div>
    </section>

    <!-- footer -->
    <footer class="footer">
      <div class="row">
        <div class="large-12 columns">
          <h5>
            <a href="/OwlCarousel2/docs/support-contact.html">David Deutsch</a> 
            <a id="custom-tweet-button" href="https://twitter.com/share?url=https://github.com/OwlCarousel2/OwlCarousel2&text=Owl Carousel - This is so awesome! " target="_blank"></a> 
          </h5>
        </div>
      </div>
    </footer>

    <!-- vendors -->
    <!-- <script src="../assets/vendors/highlight.js"></script>
    <script src="../assets/js/app.js"></script> -->