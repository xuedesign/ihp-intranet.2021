//menu
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

//banner
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


//lazyload
loadjs('https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js', function() {
    const observer = lozad();
    observer.observe();
});

//wow
//loadjs('https://cdn.rawgit.com/graingert/WOW/34712a3d/dist/wow.min.js', function() {
//    new WOW().init();
//});

//PrintArea
loadjs('https://cdnjs.cloudflare.com/ajax/libs/PrintArea/2.4.1/jquery.PrintArea.min.js', function() {
    $("#print_button").click(function(){
        $("#myPrintArea").printArea();
      });
});

//Font+ 
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

//tableRwd(https://cdn.jsdelivr.net/npm/basictable/basictable.css)
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

//tab-View
loadjs('https://xuedesign.github.io/ihp.2020/script/lib/jquery.tabslet.min.js', function() {
    $(function(){
        $('.mytabs').tabslet();
    });
});

//lightbox
loadjs(['https://cdn.jsdelivr.net/gh/fancyapps/fancybox/dist/jquery.fancybox.min.css', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox/dist/jquery.fancybox.min.js'], function() {
    
});

//allcheck
loadjs("https://xuedesign.github.io/ihp.2020/script/lib/checkall.js");
