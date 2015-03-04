<div class="footer">
				<p>Todos los <a>derechos</a> reservados</p>
			</div>
		</div>
	</body>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	<script type="text/javascript" src="jquery.easing.1.3.js"></script>
	<script type="text/javascript">
		$(function() {
			var slideCount = $('#slider ul li').length;
			var slideWidth = $('#slider ul li').width();
			var sliderUlWidth = slideCount * slideWidth;

			$('#slider ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });
			
			$('#slider ul li:last-child').prependTo('#slider ul');

			function moveLeft() {
				$('#slider ul').animate({
					left: + slideWidth
				}, 200, function () {
					$('#slider ul li:last-child').prependTo('#slider ul');
					$('#slider ul').css('left', '');
				});
			};

			function moveRight() {
				$('#slider ul').animate({
					left: - slideWidth
				}, 200, function () {
					$('#slider ul li:first-child').appendTo('#slider ul');
					$('#slider ul').css('left', '');
				});
			};

			$('#slider a.control_prev').click(moveLeft);
			$('#slider a.control_next').click(moveRight);
			setInterval(moveRight, 3000);

			function detectmob() { //Si venis desde un celular
				if( navigator.userAgent.match(/Android/i)
					|| navigator.userAgent.match(/webOS/i)
					|| navigator.userAgent.match(/iPhone/i)
					|| navigator.userAgent.match(/iPad/i)
					|| navigator.userAgent.match(/iPod/i)
					|| navigator.userAgent.match(/BlackBerry/i)
					|| navigator.userAgent.match(/Windows Phone/i)
				){
					return true;
				} else {
					return false;
				}
			}
			
			$('.sidebar a').bind('mouseenter', function(){
				$(this).find('img').stop(true).animate({'margin-left':'30px'}, 400, 'easeOutBack');
			}).bind('mouseleave', function(){
				$(this).find('img').stop(true).animate({'margin-left':'0'}, 300);
			});
			
			/**
			* for each menu element, on mouseenter, 
			* we enlarge the image, and show both sdt_active span and 
			* sdt_wrap span. If the element has a sub menu (sdt_box),
			* then we slide it - if the element is the last one in the menu
			* we slide it to the left, otherwise to the right
			*/
			$('#sdt_menu > li').bind(detectmob() ? 'click': 'mouseenter',function(){
				var $elem = $(this);
				$elem.find('img')
					.stop(true)
					.animate({
						'width':'137px',
						'height':'137px',
						'left':'0px'
					},400,'easeOutBack')
					.andSelf()
					.find('.sdt_wrap')
					.stop(true)
					.animate({'top':'140px'},500,'easeOutBack')
					.andSelf()
					.find('.sdt_active')
					.stop(true)
					.animate({'height':'170px'},300,function(){
						var $sub_menu = $elem.find('.sdt_box');
						if($sub_menu.length){
							var left = '137px';
							if($elem.parent().children().length == $elem.index()+1)
								left = '-170px';
							$sub_menu.show().animate({'left':left},200);
						}	
					});
			}).bind('mouseleave',function(){
				var $elem = $(this);
				var $sub_menu = $elem.find('.sdt_box');
				if($sub_menu.length)
					$sub_menu.hide().css('left','0px');
				
				$elem.find('.sdt_active')
					.stop(true)
					.animate({'height':'0px'},300)
					.andSelf().find('img')
					.stop(true)
					.animate({
						'width':'0px',
						'height':'0px',
						'left':'85px'
					},400)
					.andSelf()
					.find('.sdt_wrap')
					.stop(true)
					.animate({'top':'25px'},500);
			});
		});
	</script>
</html>