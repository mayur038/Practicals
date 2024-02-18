$(document).ready(function(){
    var slides = $('.slides img');
    var totalSlides = slides.length;
    var currentSlide = 0;
    var slideWidth = slides.width();
    
    // Set total width for slides container
    $('.slides').css('width', slideWidth * totalSlides);
    
    // Next slide
    $('.next').click(function(){
        if (currentSlide < totalSlides - 1) {
            currentSlide++;
            $('.slides').css('transform', 'translateX(' + (-slideWidth * currentSlide) + 'px)');
        }
    });
    
    // Previous slide
    $('.prev').click(function(){
        if (currentSlide > 0) {
            currentSlide--;
            $('.slides').css('transform', 'translateX(' + (-slideWidth * currentSlide) + 'px)');
        }
    });
});
