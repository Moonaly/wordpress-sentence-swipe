<?php
function swipe_word($atts) {
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
        list-style: none;
}
.flip2 {
  list-style: none;
  padding: 0;
  margin: 0;
  height: 150px; /* Set the height to match the height of each list item */
  position: relative;
  animation: wordSwipe 9s infinite; /* Adjust the animation duration to your preference */
}

.word_swipe li {
  position: absolute;
  top: -10px; /* Slide in from the top */
  left: 50%;
  transform:translatex(-50%);
  text-align: center;
  font-size: 120px;
  opacity: 0;
  transition: top 1s, opacity 0.5s;
  border-radius: 5px;
  width:100%;
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
        <li>短信验证码<span style="color:#EE0404;">无法收到?</span></li>
        <li>通话短信都<span style="color:#EE0404;">没办法发送？</span></li>
        <li>客户<span style="color:#EE0404;">严重失去信心与耐心</span>吗？</li>
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
add_shortcode('swipe_word','swipe_word');



