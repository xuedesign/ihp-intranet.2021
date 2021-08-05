//menu by superfish v1.7.0
loadjs('https://cdn.jsdelivr.net/npm/superfish@1.7.10/dist/js/superfish.min.js', function() {
    jQuery(document).ready(function() {
        jQuery('ul.sf-menu').superfish({
          cssArrows: false,
          delay: 0,
        });
      });
});

//menu fixed top
loadjs("https://xuedesign.github.io/ihp.2020/script/lib/fixed.js");

//banner by flickity v2.2.2
loadjs('https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js', function() {
    $('.main-carousel').flickity({
        // options
        cellAlign: 'left',
        contain: 'true',
        autoPlay: '2000',
        pauseAutoPlayOnHover: 'false',
        accessibility: 'true',
        draggable: 'true',
        wrapAround: 'true',
        imagesLoaded: 'true',
        });  
});

//abgne-carousel
loadjs("https://xuedesign.github.io/ihp.2020/script/lib/abgne-carousel.js");


//lazyload v1.6.0
loadjs('https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js', function() {
    const observer = lozad();
    observer.observe();
});

//PrintArea v2.4.1
loadjs('https://cdnjs.cloudflare.com/ajax/libs/PrintArea/2.4.1/jquery.PrintArea.min.js', function() {
    $("#print_button").click(function(){
        $("#myPrintArea").printArea();
      });
});

//Font+ v1.0
loadjs(['https://xuedesign.github.io/ihp.2020/script/lib/jquery.cookie.js', 'https://xuedesign.github.io/ihp.2020/script/lib/jquery.textresizer.js'], function() {
    jQuery(document).ready( function() {
        jQuery( "#box-fontsize a" ).textresizer({
           target: "#page-main",
           type: "fontSize",
           sizes: [ "1.6rem", "1.8rem", "2rem" ],
           selectedIndex: 1
        });
    });

});

//tableRwd v2.0.2(https://cdn.jsdelivr.net/npm/basictable/basictable.css)
loadjs('https://cdn.jsdelivr.net/npm/basictable/jquery.basictable.min.js', function() {
    $(document).ready(function() {
        $('#table-two-axis').basictable({
            breakpoint: 880
        });
        $('#catlogtable').basictable({
            breakpoint: 768
        });
    });  
});

//lightbox v3.5.7
loadjs(['https://cdn.jsdelivr.net/gh/fancyapps/fancybox/dist/jquery.fancybox.min.css', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox/dist/jquery.fancybox.min.js'], function() {
    
});
