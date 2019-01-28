/* eslint-disable */
import consts from './consts';

const tab = ['cos tam', 'dwa'];

function show_post() {
  $('#user-photo').addClass('.animate-to-left');
}
function validateMessage(message) {
  $('#validate-error-content').empty();
  $('#validate-error-content').append(message);
  $('#validate-errors').show('blind', 200, callback());
  function callback() {
    setTimeout(() => {
      $('#validate-errors').hide('blind', 200);
    }, 3000);
  }
}
function change_active(div) {
  const image_id = div.getAttribute('data-image_id');
  console.log(image_id);
  $.ajax({
    method: 'post',
    url: active_change_url,
    data: { image_id, _token: token },
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },

  }).done((msg) => {

  });
}
function init_rate(fieldset, rate) {
  counter = 5;
  $(fieldset).children('label').each((index, element) => {
    counter -= 1;
    if (counter < rate) {
      element.style.color = 'rgb(239, 58, 177)';
    }
  });
}
function change_main(div) {
  const image_id = div.getAttribute('data-image_id');
  console.log(image_id);
  $.ajax({
    method: 'post',
    url: main_change_url,
    data: { image_id, _token: token },
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },

  }).done((msg) => {

  });
}

function check_if_empty(div) {
  if (div.hasChildNodes()) {
    console.log('POSIADA DZIECI');
  } else {
    const p = document.createElement('p');
    p.className = 'text-center';
    p.innerText = 'nie ma dodanych żadnych zdjęć';
    div.appendChild(p);
  }
}

function delete_club_image(link) {
  const image_id = link.getAttribute('data-clubImageId');
  $.ajax({
    method: 'post',
    url: image_delete_url,
    data: { ClubImage_id: image_id, _token: token },
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
  })
    .done((msg) => {
      const to_delete_div = link.parentNode.parentNode;
      const last_parent = link.parentNode.parentNode.parentNode;

      to_delete_div.remove();
      check_if_empty(last_parent);
    });
}
function loadGallery(img) {
  $('#photos').modal('show');
  const my_modal = document.getElementById('photos');
  const modal_photo = document.getElementById('modal-photo');
  modal_photo.setAttribute('src', img.getAttribute('src'));
}
function next_slide() {
  const cen_slide = document.getElementById('club-slide-center');
  const prev_slide = document.getElementById('club-slide-left');
  const next_slide = document.getElementById('club-slide-right');
  cen_slide.setAttribute('id', 'club-slide-right');
  prev_slide.setAttribute('id', 'club-slide-center');
  next_slide.setAttribute('id', 'club-slide-left');
}
function prev_slide() {
  const cen_slide = document.getElementById('club-slide-center');
  const prev_slide = document.getElementById('club-slide-left');
  const next_slide = document.getElementById('club-slide-right');
  cen_slide.setAttribute('id', 'club-slide-left');
  prev_slide.setAttribute('id', 'club-slide-right');
  next_slide.setAttribute('id', 'club-slide-center');
}
function showDiv(element) {
  $div = element.parentNode.childNodes[4];
  if ($div.style.display.valueOf() == '') {
    $div.style.display = 'none';
    return;
  }


  $div.style.display = '';
}

function next() {
  const current_slide = document.getElementsByClassName('club-center')[0];
  const next_slide = document.getElementsByClassName('club-next')[0];
  const prev_slide = document.getElementsByClassName('club-prev')[0];
  const prev_prev_slide = document.getElementById(prev_slide.getAttribute('prev-slide'));
  const next_next_slide = document.getElementById(next_slide.getAttribute('next-slide'));
  if (current_slide.classList.contains('club-prev-disable')) current_slide.classList.remove('club-prev-disable');
  if (current_slide.classList.contains('club-next-disable')) current_slide.classList.remove('club-next-disable');
  if (next_slide.classList.contains('club-prev-disable')) next_slide.classList.remove('club-prev-disable');
  if (next_slide.classList.contains('club-next-disable')) next_slide.classList.remove('club-next-disable');
  if (prev_slide.classList.contains('club-prev-disable')) prev_slide.classList.remove('club-prev-disable');
  if (prev_slide.classList.contains('club-next-disable')) prev_slide.classList.remove('club-next-disable');
  if (prev_prev_slide.classList.contains('club-prev-disable')) prev_prev_slide.classList.remove('club-prev-disable');
  if (prev_prev_slide.classList.contains('club-next-disable')) prev_prev_slide.classList.remove('club-next-disable');
  if (prev_prev_slide.classList.contains('club-disable')) prev_prev_slide.classList.remove('club-disable');


  prev_prev_slide.classList.add('club-prev-disable');



  setTimeout(() => {
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
  const current_slide = document.getElementsByClassName('club-center')[0];
  const next_slide = document.getElementsByClassName('club-next')[0];
  const prev_slide = document.getElementsByClassName('club-prev')[0];
  const prev_prev_slide = document.getElementById(prev_slide.getAttribute('prev-slide'));
  const next_next_slide = document.getElementById(next_slide.getAttribute('next-slide'));

  if (current_slide.classList.contains('club-prev-disable')) current_slide.classList.remove('club-prev-disable');
  if (current_slide.classList.contains('club-next-disable')) current_slide.classList.remove('club-next-disable');
  if (next_slide.classList.contains('club-prev-disable')) next_slide.classList.remove('club-prev-disable');
  if (next_slide.classList.contains('club-next-disable')) next_slide.classList.remove('club-next-disable');
  if (prev_slide.classList.contains('club-prev-disable')) prev_slide.classList.remove('club-prev-disable');
  if (prev_slide.classList.contains('club-next-disable')) prev_slide.classList.remove('club-next-disable');
  if (next_next_slide.classList.contains('club-prev-disable')) next_next_slide.classList.remove('club-prev-disable');
  if (next_next_slide.classList.contains('club-next-disable')) next_next_slide.classList.remove('club-next-disable');
  if (next_next_slide.classList.contains('club-disable')) next_next_slide.classList.remove('club-disable');


  next_next_slide.classList.add('club-next-disable');


  setTimeout(() => {
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
  let count = 1;
  let next = 0;
  let prev = 0;
  $('.card-slider').children('.card-slide').each(function () {
    next = count + 1;
    prev = count - 1;
    this.setAttribute('prev-slide', prev.toString());
    this.setAttribute('next-slide', next.toString());

    if (this.getAttribute('id') == $('.card-slider')[0].childElementCount) {
      this.setAttribute('next-slide', '1');
    }
    if (this.getAttribute('id') == '1') {
      this.setAttribute('prev-slide', $('.card-slider')[0].childElementCount.toString());
    }
    count += 1;
  });
}

$(window).ready(() => {
  $('div').each(function () {
    if (this.hasAttribute('data-scroll')) {
      $('html, body').animate({
        scrollTop: this.offsetTop - 150,
      }, 200);
    }
  });
});

$('fieldset').each(function () {
  if (this.hasAttribute('data-rate')) {
    init_rate(this, this.getAttribute('data-rate'));
  }
});
$(() => {
  if ((document.location.href.substr(document.location.href.lastIndexOf('/') + 1)) == 'photo') {
    $('html, body').animate({
      scrollTop: document.getElementById('clubImageDiv').offsetTop,
    }, 200);
  }

  $('#distance-slider').slider({

    range: true,
    min: 0,

    max: 200,
    step: 0.1,
    values: [parseFloat($('#distance-min-output').attr('value')), parseFloat($('#distance-max-output').attr('value'))],
    slide(event, ui) {
      $('#distance-min-output').empty();
      $('#distance-min-output').val(ui.values[0]);
      $('#distance-max-output').empty();
      $('#distance-max-output').val(ui.values[1]);
    },
  });
  $('#min_club_rate_slider').slider({
    min: 1,
    max: 5,
    animate: true,
    range: 'min',
    slide(event, ui) {
      $('#custom-handle').text(ui.value);
    },


  });


  jQuery.fn.reverse = [].reverse;
  $(window).scroll(() => {
    if (window.scrollY == 0) {
      $('.navbar').css('background-color', 'transparent');
    } else {
      $('.navbar').css('background-color', 'rgba(0,0,0,0.8)');
    }
    const banner = $('.banner')[0];
  });

  $('input.musicTypeCheckbox').on('click', function () {
    let checked = 0;
    $('input.musicTypeCheckbox').each((index, element) => {
      if (element.checked == true) {
        checked++;
      }
    });
    if (checked > 3) {
      this.checked = false;
      validateMessage('Możesz wybrać 3 główne rodzaje muzyki');
    }
  });

  $('.attendEvent').submit(function (event) {
    const tab = $(this).serializeArray();
    const myForm = new FormData();
    const thisForm = this;
    $.each(tab, (key, value) => {
      myForm.append(value.name, value.value);
    });

    console.log(myForm);
    $.ajax({
      method: 'POST',
      url: $(this).attr('action'),
      data: myForm,
      processData: false,
      contentType: false,

    }).done((msg) => {
      const button = $('button[type = submit]', thisForm);
      $(button).addClass('disabled');
      $(button).removeClass('hvr-sweep-to-right');
    });

    event.preventDefault();
  });
  $('#search-club').keyup(function () {
    $('#slide').carousel('cycle');
    if (this.value != '') {
      $('#slide').carousel('pause');
    }
  });
  $('#search-club').autocomplete({
    source: 'http://localhost:8000/search/autocomplete',
    minLength: 1,
    select(event, ui) {
      window.location.href = `http://localhost:8000/clubs/${ui.item.id}`;
    },


  })

    .data('ui-autocomplete')._renderItem = function (ul, item) {
      if (item.label.length > 30) {
        item.label = `${item.label.substr(0, 30)}...`;
      }
      return $("<li class='ui-menu-item'>")


        .attr('data-value', item.id)

        .append(item.label)
        .append(`<span class="pull-right">${item.locality}</span>`)
        .appendTo(ul);
    };
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
  });
  $('.full').click(function () {
    const input = this.previousSibling;

    const myData = new FormData();
    myData.append('club_id', input.dataset.club);
    myData.append('user_id', input.dataset.user);
    myData.append('rate', input.value);
    $.ajax({
      method: 'POST',
      url: club_rate,
      data: myData,
      processData: false,
      contentType: false,

    }).done((msg) => {
      const label = input.nextSibling;
      const parent = label.parentNode;
      $(parent).children('label').each((index, element) => {
        element.style.color = 'rgba(255,255,255,0.1)';
      });
      $(parent).children('label').reverse().each((index, element) => {
        element.style.color = 'rgb(239, 58, 177)';
        if (element == label) {
          return false;
        }
      });
    });
  });
  $('[data-toggle="tooltip"]').tooltip();

  $('.remove_rate').click(function () {
    const button = this;
    const myForm = new FormData();
    myForm.append('club_id', this.dataset.club);
    myForm.append('user_id', this.dataset.user);
    myForm.append('_token', token);

    $.ajax({
      url: club_rate_delete,
      method: 'POST',
      data: myForm,
      contentType: false,
      processData: false,


    }).done((msg) => {
      console.log(button);
      const fieldset = button.previousSibling.previousSibling;
      console.log(fieldset);
      $(button).remove();
      $(fieldset).children('label').each((index, element) => {
        element.style.color = 'rgba(255,255,255,0.1)';
      });
      alert(msg.message);
    });
  });


  $('#image').on('change', function () {
    console.log('AMIRNWFW');
    const image_place = $('#image-place');

    const club_id = this.dataset.clubid;
    const user_id = this.dataset.userid;


    const myformData = new FormData();
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
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      },


    })
      .done((msg) => {
        const errors = msg.responseJSON;
        console.log(errors);
        const main_input = document.createElement('input');


        const img_src = `${url}/${user_id}/${msg.image_path}`;
        console.log(img_src);
        const div = document.createElement('div');
        div.className = 'image_div';
        const image = document.createElement('img');

        image.setAttribute('src', img_src);
        const place = document.getElementById('image-place');
        place.appendChild(div);
        div.appendChild(image);
        const new_div = document.createElement('div');
        new_div.className = 'button';
        div.appendChild(new_div);
        const delete_button = document.createElement('a');
        const refresh = document.createElement('a');
        refresh.setAttribute('href', '#');
        refresh.innerText = 'odswież';
        delete_button.setAttribute('onclick', 'delete_club_image(this)');

        delete_button.setAttribute('data-clubImageId', msg.id);
        delete_button.innerText = 'usun';

        new_div.appendChild(delete_button);

        const child = image_place.children();
        if (child[0].tagName == 'P') {
          child[0].remove();
        }
      });
  });


  $('#user-image-input').on('change', function () {
    $(this.previousElementSibling).empty();
    this.previousElementSibling.append(this.files[0].name);
    const user_id = this.getAttribute('data-user_id');
    const myformData = new FormData();
    myformData.append('image', this.files[0]);
    myformData.append('user_id', user_id);

    myformData.append('_token', token);

    $.ajax({
      method: 'POST',
      url: 'update_user_image',
      data: myformData,
      processData: false,
      contentType: false,

    }).done((msg) => {
      console.log(msg);
      const img_src = `${url}/${user_id}/${msg.image_path}`;
      $('#user_image').attr('src', img_src);
    });
  });

  $('#remove_user_image').on('click', function () {
    const myForm = new FormData();
    const user_id = this.getAttribute('data-user_id');

    myForm.append('user_id', user_id);
    myForm.append('_token', token);

    $.ajax({
      method: 'POST',
      url: 'remove_user_image',
      data: myForm,
      processData: false,
      contentType: false,
    }).done((msg) => {
      $('#user_image').attr('src', msg);
    });
  });
});
