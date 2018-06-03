var tab = ['cos tam', 'dwa'];

function show_post() {
    $('#user-photo').addClass('.animate-to-left');
}

function change_active(div) {
    var image_id = div.getAttribute('data-image_id');
    console.log(image_id);
    $.ajax({
        method: 'post',
        url: active_change_url,
        data: {image_id: image_id, _token:token},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    }) .done(function (msg) {

    })
}

function change_main(div) {
    var image_id = div.getAttribute('data-image_id');
    console.log(image_id);
    $.ajax({
        method: 'post',
        url: main_change_url,
        data: {image_id: image_id, _token:token},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    }) .done(function (msg) {

    })
}

function check_if_empty(div) {
    if(div.hasChildNodes()){
        console.log('POSIADA DZIECI');
    }else{
        var p = document.createElement('p');
        p.className ='text-center';
        p.innerText = 'nie ma dodanych żadnych zdjęć';
        div.appendChild(p);
    }

}

function delete_club_image(link){
    var image_id = link.getAttribute('data-clubImageId');
    console.log(image_id);
    $.ajax({
        method: 'post',
        url: image_delete_url,
        data: {'ClubImage_id': image_id, _token:token},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
        .done(function (msg) {
            console.log('usunieto pomyslnie');
            var to_delete_div = link.parentNode.parentNode;
            var last_parent = link.parentNode.parentNode.parentNode;

            to_delete_div.remove();
            console.log(last_parent);
            console.log(last_parent.hasChildNodes());
            check_if_empty(last_parent);
        })

}
function loadGallery (img) {
    $('#photos').modal('show');
    var my_modal = document.getElementById('photos');
    var modal_photo = document.getElementById('modal-photo');
    modal_photo.setAttribute('src', img.getAttribute('src'));
}
function next_slide() {
    var cen_slide = document.getElementById('club-slide-center');
    var prev_slide = document.getElementById('club-slide-left');
    var next_slide = document.getElementById('club-slide-right');
    cen_slide.setAttribute('id', 'club-slide-right');
    prev_slide.setAttribute('id', 'club-slide-center');
    next_slide.setAttribute('id', 'club-slide-left');

}
function prev_slide() {
    var cen_slide = document.getElementById('club-slide-center');
    var prev_slide = document.getElementById('club-slide-left');
    var next_slide = document.getElementById('club-slide-right');
    cen_slide.setAttribute('id', 'club-slide-left');
    prev_slide.setAttribute('id', 'club-slide-right');
    next_slide.setAttribute('id', 'club-slide-center');

}
function showDiv(element) {

    $div = element.parentNode.childNodes[4];
    if($div.style.display.valueOf() == ''){
        $div.style.display = 'none';
        return
    }


    $div.style.display= '';
}

function next() {
    var current_slide = document.getElementsByClassName('club-center')[0];
    var next_slide = document.getElementsByClassName('club-next')[0];
    var prev_slide = document.getElementsByClassName('club-prev')[0];
    var prev_prev_slide = document.getElementById(prev_slide.getAttribute('prev-slide'));
    var next_next_slide = document.getElementById(next_slide.getAttribute('next-slide'));
    if(current_slide.classList.contains('club-prev-disable')) current_slide.classList.remove('club-prev-disable');
    if(current_slide.classList.contains('club-next-disable')) current_slide.classList.remove('club-next-disable');
    if(next_slide.classList.contains('club-prev-disable')) next_slide.classList.remove('club-prev-disable');
    if(next_slide.classList.contains('club-next-disable')) next_slide.classList.remove('club-next-disable');
    if(prev_slide.classList.contains('club-prev-disable')) prev_slide.classList.remove('club-prev-disable');
    if(prev_slide.classList.contains('club-next-disable')) prev_slide.classList.remove('club-next-disable');
    if(prev_prev_slide.classList.contains('club-prev-disable')) prev_prev_slide.classList.remove('club-prev-disable');
    if(prev_prev_slide.classList.contains('club-next-disable')) prev_prev_slide.classList.remove('club-next-disable');
    if(prev_prev_slide.classList.contains('club-disable')) prev_prev_slide.classList.remove('club-disable');




        prev_prev_slide.classList.add('club-prev-disable');
    console.log(prev_prev_slide);


    setTimeout(function(){
        current_slide.classList.remove('club-center');
        current_slide.classList.add('club-next');

        prev_slide.classList.remove('club-prev');
        prev_slide.classList.add('club-center');

        next_slide.classList.remove('club-next');
        next_slide.classList.add('club-next-disable');

        prev_prev_slide.classList.remove('club-prev-disable');
        prev_prev_slide.classList.add('club-prev');
    }, 100);








}
function prev() {
    var current_slide = document.getElementsByClassName('club-center')[0];
    var next_slide = document.getElementsByClassName('club-next')[0];
    var prev_slide = document.getElementsByClassName('club-prev')[0];
    var prev_prev_slide = document.getElementById(prev_slide.getAttribute('prev-slide'));
    var next_next_slide = document.getElementById(next_slide.getAttribute('next-slide'));

    if(current_slide.classList.contains('club-prev-disable')) current_slide.classList.remove('club-prev-disable');
    if(current_slide.classList.contains('club-next-disable')) current_slide.classList.remove('club-next-disable');
    if(next_slide.classList.contains('club-prev-disable')) next_slide.classList.remove('club-prev-disable');
    if(next_slide.classList.contains('club-next-disable')) next_slide.classList.remove('club-next-disable');
    if(prev_slide.classList.contains('club-prev-disable')) prev_slide.classList.remove('club-prev-disable');
    if(prev_slide.classList.contains('club-next-disable')) prev_slide.classList.remove('club-next-disable');
    if(next_next_slide.classList.contains('club-prev-disable')) next_next_slide.classList.remove('club-prev-disable');
    if(next_next_slide.classList.contains('club-next-disable')) next_next_slide.classList.remove('club-next-disable');
    if(next_next_slide.classList.contains('club-disable')) next_next_slide.classList.remove('club-disable');


    next_next_slide.classList.add('club-next-disable');



    setTimeout(function(){
        current_slide.classList.remove('club-center');
        current_slide.classList.add('club-prev');

        prev_slide.classList.remove('club-prev');
        prev_slide.classList.add('club-prev-disable');

        next_slide.classList.remove('club-next');
        next_slide.classList.add('club-center');

        next_next_slide.classList.remove('club-next-disable');
        next_next_slide.classList.remove('club-disable');
        next_next_slide.classList.add('club-next');
    }, 50);
}
$('.card-slider').onload = init_slider();

function init_slider() {

    var count = 1;
    var next = 0;
    var prev = 0;
    $('.card-slider').children('.card-slide').each(function () {




        next = count +1;
        prev = count - 1;
            this.setAttribute('prev-slide', prev.toString())
            this.setAttribute('next-slide', next.toString() );

        if(this.getAttribute('id') == $('.card-slider')[0].childElementCount){
            this.setAttribute('next-slide', '1');

        }
        if(this.getAttribute('id') == '1'){
            this.setAttribute('prev-slide', $('.card-slider')[0].childElementCount.toString());

        }
        count = count + 1;
    })

}

$(window).ready(function () {
    $("div").each(function () {
        if(this.hasAttribute('data-scroll')){
            $('html, body').animate({
                scrollTop: this.offsetTop-150
            },200);
            console.log(this.offsetTop)
        }
    })

})
$(function () {

    $(window).scroll(function () {
       if(window.scrollY == 0){
           $('.navbar').css('background-color', 'transparent');

       } else {
           $('.navbar').css('background-color', 'rgba(0,0,0,0.8)');
       }
    })
    $('#search-club').keyup( function () {
        $('#demo').carousel('cycle');
        if(this.value != ''){
            $('#demo').carousel('pause');
            return;
        }

    })
    $('#search-club').autocomplete({
        source: 'http://localhost/goparty/public/search/autocomplete',
        minLength: 1,
        select: function( event, ui ) {
            window.location.href = 'http://localhost/goparty/public/clubs/'+ ui.item.id;
        },


    })

        .data('ui-autocomplete')._renderItem = function (ul, item) {

        return $("<li class='ui-menu-item'>")

            .attr("data-value", item.id)

            .append(item.label)
            .append('<span class="pull-right">'+ item.voivodeship + '</span>')
            .appendTo(ul);
    };
    $('[data-toggle="tooltip"]').tooltip();

   $('#image').on('change', function () {
       console.log('AMIRNWFW');
       var image_place = $('#image-place');

        var club_id = this.dataset.clubid;
        var user_id = this.dataset.userid;


        var myformData = new FormData();
        myformData.append('image', this.files[0]);
        myformData.append('club_id', club_id);
        myformData.append('user_id', user_id);

       myformData.append('_token', token);

       $.ajax({
           method: 'POST',
           url: club_image_create_url,
           data: myformData,
           processData: false,
           contentType: false,
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }


       })
           .done(function (msg) {
                var errors = msg.responseJSON;
                console.log(errors);
               var main_input = document.createElement('input');


               var img_src = url +'/'+ user_id +'/'+ msg['image_path'];
               console.log(img_src);
               var div = document.createElement("div");
               div.className = 'image_div';
               var image = document.createElement("img");

               image.setAttribute('src', img_src);
               var place = document.getElementById('image-place');
               place.appendChild(div);
               div.appendChild(image);
               var new_div = document.createElement('div');
               new_div.className = 'button';
               div.appendChild(new_div);
               var delete_button = document.createElement('a');
               var refresh = document.createElement('a');
               refresh.setAttribute('href', '#');
               refresh.innerText = 'odswież';
               delete_button.setAttribute('onclick', 'delete_club_image(this)');

               delete_button.setAttribute('data-clubImageId', msg['id']);
               delete_button.innerText = 'usun';

               new_div.appendChild(delete_button);

               var child = image_place.children();
               if(child[0].tagName == 'P'){
                   child[0].remove();
               }




           })

   });


});

