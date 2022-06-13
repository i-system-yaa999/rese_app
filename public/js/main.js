function test() {
  alert('test ok');
}

/* -------------------------------------------------- */
function tabChange() {
  let form = document.getElementById('search');
  // form.action = '/shop';
  // form.method = 'get';
  form.submit();
}
/* -------------------------------------------------- */
function selectboxChange() {
  let form = document.getElementById('search');
  form.action = '/shop/search';
  form.method = 'get';
  form.submit();
}

/* -------------------------------------------------- */
function cngReserve() {
  let date = document.getElementById('inputDate');
  let time = document.getElementById('inputTime');
  let number = document.getElementById('inputNumber');
  document.getElementById('confirmDate').innerText = date.value;
  document.getElementById('confirmTime').innerText = time.value + " ～";
  document.getElementById('confirmNumber').innerText = number.value + " 人";
}


/* -------------------------------------------------- */
function cngMyReserveToggle(id) {
  let change = document.getElementById('reserve_change' + id);
  let reserve_value = document.getElementById('reserve_value' + id);

  change.classList.toggle('toggle_open');
  reserve_value.classList.toggle('toggle_open');

  if (change.classList.contains('toggle_open')) {
    change.textContent = '予約の変更';
  } else {
    change.textContent = '変更取り消し';
  }

  let olddate = document.getElementById('confirmDate' + id);
  let oldtime = document.getElementById('confirmTime' + id);
  let oldnumber = document.getElementById('confirmNumber' + id);

  let newDate = document.getElementById('inputDate' + id);
  let newTime = document.getElementById('inputTime' + id);
  let newNumber = document.getElementById('inputNumber' + id);

  newDate.value = olddate.innerText;
  newTime.value = oldtime.innerText.replace('～', '');
  newNumber.options[oldnumber.innerText.replace('人', '')].selected = true;
}
/* -------------------------------------------------- */
function cngMyReserve(id) {

  let newDate = document.getElementById('inputDate' + id);
  let newTime = document.getElementById('inputTime' + id);
  let newNumber = document.getElementById('inputNumber' + id);

  let sendDate = document.getElementById('inputDate');
  let sendTime = document.getElementById('inputTime');
  let sendNumber = document.getElementById('inputNumber');
  let sendId = document.getElementById('inputId');

  sendDate.value = newDate.value;
  sendTime.value = newTime.value;
  sendNumber.value = newNumber.value;
  sendId.value = id;
}
/* -------------------------------------------------- */
function myReserveSend(id) {
  let form = document.getElementById('reservecng');
  form.action = "/reserve/" + id;
  // form.method = 'put';
  this.cngMyReserve(id);
  form.submit();
}
/* -------------------------------------------------- */
function myReserveCancel(id) {
  alert('キャンセルしますか？');
  let form = document.getElementById('reservedel');
  form.action = "/reserve/" + id;
  // form.method = 'delete';
  form.submit();
}



/* -------------------------------------------------- */
  function star_change(number,id){
    let my_star1=document.getElementById('my_star1' + id);
    let my_star2=document.getElementById('my_star2' + id);
    let my_star3=document.getElementById('my_star3' + id);
    let my_star4=document.getElementById('my_star4' + id);
    let my_star5=document.getElementById('my_star5' + id);
    let my_star = 0;
    switch (number){
      case 1:
        if(my_star2.classList.contains('star_on') == false ){
          my_star1.classList.toggle('star_on');
        }
        if(my_star1.classList.contains('star_on') == true ){
          my_star = 1;
        }else{
          my_star = 0;
        }
        my_star2.classList.remove('star_on');
        my_star3.classList.remove('star_on');
        my_star4.classList.remove('star_on');
        my_star5.classList.remove('star_on');
        break;
      case 2:
        if(my_star3.classList.contains('star_on') == false ){
          my_star2.classList.toggle('star_on');
        }
        if(my_star2.classList.contains('star_on') == true ){
          my_star1.classList.add('star_on');
          my_star = 2;
        }else{
          my_star = 1;
        }
        my_star3.classList.remove('star_on');
        my_star4.classList.remove('star_on');
        my_star5.classList.remove('star_on');
        break;
      case 3:
        if(my_star4.classList.contains('star_on') == false ){
          my_star3.classList.toggle('star_on');
        }
        if(my_star3.classList.contains('star_on') == true ){
          my_star1.classList.add('star_on');
          my_star2.classList.add('star_on');
          my_star = 3;
        }else{
          my_star = 2;
        }
        my_star4.classList.remove('star_on');
        my_star5.classList.remove('star_on');
        break;
      case 4:
        if(my_star5.classList.contains('star_on') == false ){
          my_star4.classList.toggle('star_on');
        }
        if(my_star4.classList.contains('star_on') == true ){
          my_star1.classList.add('star_on');
          my_star2.classList.add('star_on');
          my_star3.classList.add('star_on');
          my_star = 4;
        }else{
          my_star = 3;
        }
        my_star5.classList.remove('star_on');
        break;
      case 5:
        my_star5.classList.toggle('star_on');
        if(my_star5.classList.contains('star_on') == true ){
          my_star1.classList.add('star_on');
          my_star2.classList.add('star_on');
          my_star3.classList.add('star_on');
          my_star4.classList.add('star_on');
          my_star = 5;
        }else{
          my_star = 4;
        }
        break;
    }
    document.getElementById('my_star' + id).value = my_star;
    // alert(my_star);
  }