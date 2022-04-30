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