

function change_active(div) {
    var image_id = div.getAttribute('data-image_id');
    console.log(image_id);
    $.ajax({
        method: 'post',
        url: active_change_url,
        data: {image_id: image_id, _token:token},

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
        data: {'ClubImage_id': image_id, _token:token}
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
$(function () {



   $('#image').on('change', function () {
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