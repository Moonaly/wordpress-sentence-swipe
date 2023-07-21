<?php
function swipe_word_en($atts) {
// Attributes
$atts = shortcode_atts(
array(
	'postid' => get_the_ID(),
), 
$atts
);
// Attributes in var
$post_id = $atts['postid']; 
ob_start();
?>

<style>
@font-face {
   font-family: FZChaoCuHei;
   src: url(https://dev.zhi.services/nrs/wp-content/themes/betheme-child/fonts/FZChaoCuHei-M10S.ttf);
}
@font-face {
   font-family: microsoft-yahei;
   src: url(https://dev.zhi.services/nrs/wp-content/themes/betheme-child/fonts/microsoft-yahei.ttf);
}
.word_swipe {
  overflow: hidden;
}
.column_column ul.flip2{
    margin:auto;
}
.flip2 {
  list-style: none;
  padding: 0;
  margin: 0;
  height: 200px; /* Set the height to match the height of each list item */
  position: relative;
  animation: wordSwipe 9s infinite; /* Adjust the animation duration to your preference */
}

.word_swipe li {
  position: absolute;
  top: -30px; /* Slide in from the top */
  left: 0;
  text-align: center;
  font-size: 75px;
  opacity: 0;
  transition: top 1s, opacity 0.5s;
  border-radius: 5px;
}

.word_swipe li.active-li {
  top: 0;
  opacity: 1;
}

@keyframes wordSwipe {
  0%, 100% {
    transform: translateY(0);
  }
  33%, 66% {
    transform: translateY(10px); /* Adjust the distance for the slide effect */
  }
}

</style>

<div class="word_swipe">
  <h2>
    <ul class="flip2">
      <li class="active-li"><span style="color:#EE0404;">Unable to receive </span>SMS verification codes?</li>
      <li><span style="color:#EE0404;">Losing customer </span>trust and patience?</li>
      <li>Even basic text messages also <span style="color:#EE0404;">failed?</span></li>
    </ul>
  </h2>
</div>

<script>


jQuery(document).ready(function() {
  let currentLi = 0;
  const jQuerylis = jQuery(".flip2 li");
  
  function showNextLi() {
    jQuerylis.removeClass("active-li");
    jQuery(jQuerylis[currentLi]).addClass("active-li");
    currentLi = (currentLi + 1) % jQuerylis.length;
  }

  // Initial setup
  showNextLi();
  setInterval(showNextLi, 3000); // Change to the next <li> every 3000ms (3 seconds)
});




</script>

<?php
return ob_get_clean();
}
add_shortcode('swipe_word_en','swipe_word_en');