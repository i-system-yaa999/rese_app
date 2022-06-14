/* -------------------------------------------------- */
function tabChange() {
  let form = document.getElementById('admin');
  // form.action = '/admin';
  form.method = 'get';
  form.submit();
}
/* -------------------------------------------------- */
function itemModify(id){
  document.querySelector('#tbl-item'+id).classList.add('tbl-newitem');
}
/* -------------------------------------------------- */
function itemModify2(id) {
  document.querySelector('#modify-message'+id).classList.add('unsaved_message');
}
/* -------------------------------------------------- */
function unregisteredOwner(id){
  this.itemModify(id);

  let newOwnerId = document.getElementById('owner_id' + id);
  let newOwnerUserId = document.getElementById('owner_user_id' + id);
  let newOwnerUserName = document.getElementById('owner_user_name' + id);
  let newOwnerUserEmail = document.getElementById('owner_user_email' + id);
  let newOwnerUserPassword = document.getElementById('owner_user_password' + id);
  let newOwnerShopId = document.getElementById('owner_shop_id' + id);
  // let newOwnerShopName = document.getElementById('owner_shop_name' + id);

  let sendOwnerId = document.getElementById('owner_id');
  let sendOwnerUserId = document.getElementById('owner_user_id');
  let sendOwnerUserName = document.getElementById('owner_user_name');
  let sendOwnerUserEmail = document.getElementById('owner_user_email');
  let sendOwnerUserPassword = document.getElementById('owner_user_password');
  let sendOwnerShopId = document.getElementById('owner_shop_id');
  // let sendOwnerShopName = document.getElementById('owner_shop_name');
  
  sendOwnerId.value = newOwnerId.innerHTML;
  sendOwnerUserId.value = newOwnerUserId.value;
  sendOwnerUserName.value = newOwnerUserName.value;
  sendOwnerUserEmail.value = newOwnerUserEmail.value;
  sendOwnerUserPassword.value = newOwnerUserPassword.value;
  sendOwnerShopId.value = newOwnerShopId.value;
  // sendOwnerShopName.value = newOwnerShopName.value;
}
/* -------------------------------------------------- */
function unregisteredOwnerSend(id) {
  let form = document.getElementById('admincng');
  // form.action = "/admin/" + id;
  form.action = "/admin";
  // form.method = 'put';
  this.unregisteredOwner(id);

  form.submit();
}
/* -------------------------------------------------- */
function unregisteredUser(id){
  this.itemModify(id);

  let newUserId = document.getElementById('user_id' + id);
  let newUserName = document.getElementById('user_name' + id);
  let newUserRole = document.getElementById('user_role' + id);
  let newUserEmail = document.getElementById('user_email' + id);
  let newUserPassword = document.getElementById('user_password' + id);
  
  let sendUserId = document.getElementById('user_id');
  let sendUserName = document.getElementById('user_name');
  let sendUserRole = document.getElementById('user_role');
  let sendUserEmail = document.getElementById('user_email');
  let sendUserPassword = document.getElementById('user_password');

  sendUserId.value = newUserId.innerHTML;
  sendUserName.value = newUserName.value;
  sendUserRole.value = newUserRole.value;
  sendUserEmail.value = newUserEmail.value;
  sendUserPassword.value = newUserPassword.value;
}
/* -------------------------------------------------- */
function unregisteredUserSend(id) {
  let form = document.getElementById('admincng');
  // form.action = "/admin/" + id;
  form.action = "/admin";
  // form.method = 'put';
  this.unregisteredUser(id);

  form.submit();
}
/* -------------------------------------------------- */
function unregisteredShop(id){
  this.itemModify(id);

  let newShopId = document.getElementById('shop_id' + id);
  let newShopName = document.getElementById('shop_name' + id);
  let newShopAreaId = document.getElementById('shop_area_id' + id);
  // let newShopAreaName = document.getElementById('shop_area_name' + id);
  let newShopGenreId = document.getElementById('shop_genre_id' + id);
  // let newShopGenreName = document.getElementById('shop_genre_name' + id);
  let newShopSummary = document.getElementById('shop_summary' + id);
  let newShopImageURL = document.getElementById('shop_image_url' + id);

  let sendShopId = document.getElementById('shop_id');
  let sendShopName = document.getElementById('shop_name');
  let sendShopAreaId = document.getElementById('shop_area_id');
  // let sendShopAreaName = document.getElementById('shop_area_name');
  let sendShopGenreId = document.getElementById('shop_genre_id');
  // let sendShopGenreName = document.getElementById('shop_genre_name');
  let sendShopSummary = document.getElementById('shop_summary');
  let sendShopImageURL = document.getElementById('shop_image_url');

  sendShopId.value = newShopId.innerHTML;
  sendShopName.value = newShopName.value;
  sendShopAreaId.value = newShopAreaId.value;
  // sendShopAreaName.value = newShopAreaName.value;
  sendShopGenreId.value = newShopGenreId.value;
  // sendShopGenreName.value = newShopGenreName.value;
  sendShopSummary.value = newShopSummary.value;
  sendShopImageURL.value = newShopImageURL.value;
}
/* -------------------------------------------------- */
function unregisteredShopSend(id) {
  let form = document.getElementById('admincng');
  // form.action = "/admin/" + id;
  form.action = "/admin";
  // form.method = 'put';
  this.unregisteredShop(id);

  form.submit();
}
/* -------------------------------------------------- */
function unregisteredShop2(id) {
  this.itemModify2(id);

  let newShopId = document.getElementById('shop_id' + id);
  let newShopName = document.getElementById('shop_name' + id);
  let newShopAreaId = document.getElementById('shop_area_id' + id);
  // let newShopAreaName = document.getElementById('shop_area_name' + id);
  let newShopGenreId = document.getElementById('shop_genre_id' + id);
  // let newShopGenreName = document.getElementById('shop_genre_name' + id);
  let newShopSummary = document.getElementById('shop_summary' + id);
  let newShopImageURL = document.getElementById('shop_image_url' + id);

  let sendShopId = document.getElementById('shop_id');
  let sendShopName = document.getElementById('shop_name');
  let sendShopAreaId = document.getElementById('shop_area_id');
  // let sendShopAreaName = document.getElementById('shop_area_name');
  let sendShopGenreId = document.getElementById('shop_genre_id');
  // let sendShopGenreName = document.getElementById('shop_genre_name');
  let sendShopSummary = document.getElementById('shop_summary');
  let sendShopImageURL = document.getElementById('shop_image_url');

  sendShopId.value = newShopId.value;
  sendShopName.value = newShopName.value;
  sendShopAreaId.value = newShopAreaId.value;
  // sendShopAreaName.value = newShopAreaName.value;
  sendShopGenreId.value = newShopGenreId.value;
  // sendShopGenreName.value = newShopGenreName.value;
  sendShopSummary.value = newShopSummary.value;
  sendShopImageURL.value = newShopImageURL.value;
}
/* -------------------------------------------------- */
function unregisteredShopSend2(id) {
  let form = document.getElementById('ownercng');
  // form.action = "/admin/" + id;
  form.action = "/owner";
  // form.method = 'put';
  this.unregisteredShop2(id);

  form.submit();
}
/* -------------------------------------------------- */
function unregisteredArea(id){
  this.itemModify(id);

  let newAreaId = document.getElementById('area_id' + id);
  let newAreaName = document.getElementById('area_name' + id);

  let sendAreaId = document.getElementById('area_id');
  let sendAreaName = document.getElementById('area_name');

  sendAreaId.value = newAreaId.innerHTML;
  sendAreaName.value = newAreaName.value;
}
/* -------------------------------------------------- */
function unregisteredAreaSend(id) {
  let form = document.getElementById('admincng');
  // form.action = "/admin/" + id;
  form.action = "/admin";
  // form.method = 'put';
  this.unregisteredArea(id);

  form.submit();
}
/* -------------------------------------------------- */
function unregisteredGenre(id){
  this.itemModify(id);

  let newGenreId = document.getElementById('genre_id' + id);
  let newGenreName = document.getElementById('genre_name' + id);

  let sendGenreId = document.getElementById('genre_id');
  let sendGenreName = document.getElementById('genre_name');

  sendGenreId.value = newGenreId.innerHTML;
  sendGenreName.value = newGenreName.value;
}
/* -------------------------------------------------- */
function unregisteredGenreSend(id) {
  let form = document.getElementById('admincng');
  // form.action = "/admin/" + id;
  form.action = "/admin";
  // form.method = 'put';
  this.unregisteredGenre(id);

  form.submit();
}
/* -------------------------------------------------- */
function unregisteredReserve(id){
  this.itemModify(id);

  let newReserveId = document.getElementById('reserve_id' + id);
  let newReserveUserId = document.getElementById('reserve_user_id' + id);
  // let newReserveUserName = document.getElementById('reserve_user_name' + id);
  let newReserveShopId = document.getElementById('reserve_shop_id' + id);
  // let newReserveShopName = document.getElementById('reserve_shop_name' + id);
  let newReserveDate = document.getElementById('reserve_date' + id);
  let newReserveTime = document.getElementById('reserve_time' + id);
  let newReserveNumber = document.getElementById('reserve_number' + id);

  let sendReserveId = document.getElementById('reserve_id');
  let sendReserveUserId = document.getElementById('reserve_user_id');
  // let sendReserveUserName = document.getElementById('reserve_user_name');
  let sendReserveShopId = document.getElementById('reserve_shop_id');
  // let sendReserveShopName = document.getElementById('reserve_shop_name');
  let sendReserveDate = document.getElementById('reserve_date');
  let sendReserveTime = document.getElementById('reserve_time');
  let sendReserveNumber = document.getElementById('reserve_number');

  sendReserveId.value = newReserveId.innerHTML;
  sendReserveUserId.value = newReserveUserId.value;
  // sendReserveUserName.value = newReserveUserName.value;
  sendReserveShopId.value = newReserveShopId.value;
  // sendReserveShopName.value = newReserveShopName.value;
  sendReserveDate.value = newReserveDate.value;
  sendReserveTime.value = newReserveTime.value;
  sendReserveNumber.value = newReserveNumber.value;
}
/* -------------------------------------------------- */
function unregisteredReserveSend(id) {
  let form = document.getElementById('admincng');
  // form.action = "/admin/" + id;
  form.action = "/admin";
  // form.method = 'put';
  this.unregisteredReserve(id);

  form.submit();
}
/* -------------------------------------------------- */
function unregisteredLike(id){
  this.itemModify(id);

  let newLikeId = document.getElementById('like_id' + id);
  let newLikeUserId = document.getElementById('like_user_id' + id);
  // let newLikeUserName = document.getElementById('like_user_name' + id);
  let newLikeShopId = document.getElementById('like_shop_id' + id);
  // let newLikeShopName = document.getElementById('like_shop_name' + id);

  let sendLikeId = document.getElementById('like_id');
  let sendLikeUserId = document.getElementById('like_user_id');
  // let sendLikeUserName = document.getElementById('like_user_name');
  let sendLikeShopId = document.getElementById('like_shop_id');
  // let sendLikeShopName = document.getElementById('like_shop_name');

  sendLikeId.value = newLikeId.innerHTML;
  sendLikeUserId.value = newLikeUserId.value;
  // sendLikeUserName.value = newLikeUserName.value;
  sendLikeShopId.value = newLikeShopId.value;
  // sendLikeShopName.value = newLikeShopName.value;
}
/* -------------------------------------------------- */
function unregisteredLikeSend(id) {
  let form = document.getElementById('admincng');
  form.action = "/admin/" + id;
  form.action = "/admin";
  // form.method = 'put';
  this.unregisteredLike(id);

  form.submit();
}
/* -------------------------------------------------- */
function unregisteredComment(id){
  this.itemModify(id);

  let newCommentId = document.getElementById('comment_id' + id);
  let newCommentUserId = document.getElementById('comment_user_id' + id);
  // let newCommentUserName = document.getElementById('comment_user_name' + id);
  let newCommentShopId = document.getElementById('comment_shop_id' + id);
  // let newCommentShopName = document.getElementById('comment_shop_name' + id);
  let newCommentEvaluation = document.getElementById('my_star' + id);
  let newCommentComment = document.getElementById('comment_comment' + id);

  let sendCommentId = document.getElementById('comment_id');
  let sendCommentUserId = document.getElementById('comment_user_id');
  // let sendCommentUserName = document.getElementById('comment_user_name');
  let sendCommentShopId = document.getElementById('comment_shop_id');
  // let sendCommentShopName = document.getElementById('comment_shop_name');
  let sendCommentEvaluation = document.getElementById('comment_evaluation');
  let sendCommentComment = document.getElementById('comment_comment');

  sendCommentId.value = newCommentId.innerHTML;
  sendCommentUserId.value = newCommentUserId.value;
  // sendCommentUserName.value = newCommentUserName.value;
  sendCommentShopId.value = newCommentShopId.value;
  // sendCommentShopName.value = newCommentShopName.value;
  sendCommentEvaluation.value = newCommentEvaluation.value;
  sendCommentComment.value = newCommentComment.value;
}
/* -------------------------------------------------- */
function unregisteredCommentSend(id) {
  let form = document.getElementById('admincng');
  // form.action = "/admin/" + id;
  form.action = "/admin";
  // form.method = 'put';
  this.unregisteredComment(id);

  form.submit();
}


function cngValue(id){
  shop_name = document.getElementById('shop_name' + id).value;
  shop_image = document.getElementById('shop_image_url' + id).value;
  shop_area_id = document.getElementById('shop_area_id' + id).value;
  shop_area = document.getElementById('shop_area_id' + id).options[shop_area_id].innerHTML;
  shop_genre_id = document.getElementById('shop_genre_id' + id).value;
  shop_genre = document.getElementById('shop_genre_id' + id).options[shop_genre_id].innerHTML;
  shop_summary = document.getElementById('shop_summary' + id).value;
  
  document.getElementById('confirm_shop_name').innerHTML = id + '：' + shop_name;
  document.getElementById('confirm_shop_image').src = shop_image;

  index = shop_area.indexOf('：');
  document.getElementById('confirm_shop_area').innerHTML = shop_area.slice(index).replace('：', '#');
  
  index = shop_genre.indexOf('：');
  document.getElementById('confirm_shop_genre').innerHTML = shop_genre.slice(index).replace('：','#');;
  document.getElementById('confirm_shop_summary').innerHTML = shop_summary;
}