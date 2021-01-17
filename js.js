const count = document.querySelector('#count');

onLoadPost();

$('#block_sources_list').submit(function (ev) {
    ev.preventDefault();
    setCookie();
    submit();
    $('#block_sources_list').css('left', '100%');
    $('body').css('overflow', 'visible');
});

menuButtClick();
closeSelectorsButt();
// closeSelectorsOnResize();

reportButt();
 $('.reportForm').submit(function (ev) {
        ev.preventDefault();
        grecaptcha.ready(function() {
          grecaptcha.execute('6LeQWSkaAAAAAIOIcHW87SkfPkATUsU9qrRQS08O', {action: 'homepage'}).then(function(token) {
              let tokenval = document.querySelector('.g-recaptcha');
              tokenval.value=token;
              sendReport();
          });
        });
 });
closeReportWrapper();
closeReportButton();
closeThnksMessage();
bodyStopScrolling();







/////////////////////////////////
//functions
/////////////////////////////////    
function submit() {
    $.ajax({
            type: $('#block_sources_list').attr('method'),
            url: 'php/post.php',
            data: $('#block_sources_list').serialize(),
            success: function (response) {
                let result = $.parseJSON(response);
                    $('#block_sources_list').siblings().remove();
                for(let i = 0; i<result.length; i++){
                    let el = result[i][0];
                    $('#main').append(el);
                    $('.block' + i).append(result[i][1]);
                    $('.hide' + i).click(function () {
                        $('.source' + i).siblings().fadeToggle("fast");
                    });
                };
                mainColumns();
                if(count.value<3){
                    $('.piece_of_news').hide();
                    $('.piece_of_news').fadeIn(500);
                }else{
                    $('.block_news').hide();
                    $('.block_news').fadeIn(500);
                    };
            }
        });
};

function onLoadPost() {
    $.ajax({
            url: 'php/onLoadPost.php',
            success: function (response) {
                let result = $.parseJSON(response);
                    $('#block_sources_list').siblings().remove();
                for(let i = 0; i<result.length; i++){
                    let el = result[i][0];
                    $('#main').append(el);
                    $('.block' + i).append(result[i][1]);
                    $('.hide' + i).click(function () {
                        $('.source' + i).siblings().fadeToggle("fast");
                    });
                };
                mainColumns();
                 if(count.value<3){
                    $('.piece_of_news').hide();
                    $('.piece_of_news').fadeIn(500);
                }else{
                    $('.block_news').hide();
                    $('.block_news').fadeIn(500);
                    };
            }
        });
};

function menuButtClick (){
    $('.menu_butt').click(function () {
        $('.menu_butt').css('opacity', '1');
        setTimeout(function (){
            $('.menu_butt').css('opacity', '0.5');
        }, 50);
        $('#block_sources_list').css('left', '0');
        $('body').css('overflow', 'hidden');
    });
};

function mainColumns () {
    if (count.value<3 && window.matchMedia('(orientation: landscape)').matches) {
        $('#main').css('grid-template-columns', 'repeat(3, 1fr)');
    } else if(count.value<3 && window.matchMedia('(orientation: portrait)').matches) {
        $('#main').css('grid-template-columns', 'repeat(2, 1fr)');
    } else {
        $('#main').css('grid-template-columns', 'auto');
    };
};

function setCookie(){
    let country = $('.country').val();
    let region = $('.region').val();
    let category = $('.category').val();
    let count = $('.count').val();
    $.cookie('country', country, { expires: 7 });
    $.cookie('region', region, { expires: 7 });
    $.cookie('category', category, { expires: 7 });
    $.cookie('count', count, { expires: 7 });
};

function bodyStopScrolling () {
 $(window).resize(function(){
     if(window.matchMedia('(orientation: portrait)').matches && $('#block_sources_list').css('left') == '0px' || $('.formWrapper').css('display') == 'grid') {
        $('body').css('overflow', 'hidden');
    } else {
        $('body').css('overflow', 'visible');
    };
 });
};

// function closeSelectorsOnResize (){
//  $(window).resize(function(){
// if(window.matchMedia('(orientation: landscape)').matches){
//         $('#block_sources_list').css('left', '100%');
//         $('body').css('overflow', 'visible');
//     };
//  }); 
// };

function closeSelectorsButt () {
    $('.close').click(function(){
        $('#block_sources_list').css('left', '100%');
        $('body').css('overflow', 'visible');
    });
};

function reportButt () {
    $('.reportButt').click(function () {
        $('.formWrapper').fadeIn('slow');
        $('.formWrapper').css('display', 'grid');
        $('body').css('overflow', 'hidden');
    });
};

function closeReportWrapper () {
    $('.formWrapper').click(function(ev) {
        if (ev.target == this){
            $('.formWrapper').fadeOut('slow');
            $('body').css('overflow', 'visible');
        };
    });
};


function closeReportButton (){
    $('.closeReport').click(function () {
        $('.formWrapper').fadeOut('slow');
        $('body').css('overflow', 'visible');
    });
};


function sendReport() {
    $.ajax({
            type: $('.reportForm').attr('method'),
            url: 'php/send_report/send_mail.php',
            data: $('.reportForm').serialize(),
            success: function (response){
                var sent = response;
                if(sent == 1){
                $('.formWrapper').fadeOut('slow');
                $('.thnks').fadeIn('slow');
              };
            }
    });
};

function closeThnksMessage () {
    $('html').click(function () {
        if($('.thnks').css('display')=='block'){
            $('.thnks').fadeOut('fast');
            $('body').css('overflow', 'visible');
        };
    });
};