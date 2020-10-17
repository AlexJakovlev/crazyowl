<?php 
$user_id = wp_get_current_user();
// print_r($user_id;
?>
	<div class="account__profile">
      <div class="account__top">
         <div class="account__profile-title">
            <h6 class="profile__email-title">Your email3</h6>
            <p class="profile__email-text"><?php echo $user_id->user_email ?></p>
         </div>
         <div class="account__profile-btns">
            <button type="button" class="btn btn-danger">Change password</button>
            <button type="button" class="btn btn-danger">Edit</button>
         </div>
      </div>
      <h4 class="profile__title">Your contacts and auto-fill information</h4>
      <div class="profile__info">
         <ul class="profile__info-column">
            <li class="profile__info-item">
               <p class="profile__info-item-text_plain">Your login in game service</p>
               <p class="profile__info-item-text">MyProfile</p>
            </li>
            <li class="profile__info-item">
               <p class="profile__info-item-text_plain">Prefered method to contact you</p>
               <p class="profile__info-item-text">WhatsApp</p>
            </li>
            <li class="profile__info-item">
               <p class="profile__info-item-text_plain">Your WhatsApp number</p>
               <p class="profile__info-item-text">+1(234)567-89-01</p>
            </li>
         </ul>
         <ul class="profile__info-column">
            <li class="profile__info-item">
               <p class="profile__info-item-text_plain">Your prefered payment method</p>
               <p class="profile__info-item-text">Credit card (Visa, MasterCard, etc.)</p>
            </li>
         </ul>
      </div>
      <div class="profile__referal">
         <div class="profile__referal-top">
            <p class="profile__referal-code">
               Your referal code to invite your friends: <span class="profile__referal-code_indent">G32414EFW2</span></p>
            <p class="profile__referal-invited">Friends invited: <span class="profile__referal-invited-count">4</span></p>
         </div>
         <div class="profile__referal-link">
            <p class="profile__referal-link-text">https://saturblde.com/registration?invitation_link=g32414efw2</p>
            <p class="profile__referal-link-btn">Copy</p>
         </div>
         <p class="profile__referal-description">For inviting you will recieve 10.00&euro; for each invite, if somebody would make an order after registration.</p>
      </div>
   </div>
