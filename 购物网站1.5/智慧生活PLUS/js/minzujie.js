window.onload = function() {

	var container = document.getElementById('container');

	var list = document.getElementById('list');

	var buttons = document.getElementById('buttons').getElementsByTagName('span');

	var pre = document.getElementById('prev');

	var next = document.getElementById('next');

	var index = 1;

	var animated = false;

	var timer;

	function showButton() {

		for (var i = 0; i < buttons.length; i++) {

			if (buttons[i].className == 'on') {

				buttons[i].className = '';

				break;

			}

		}

		buttons[index - 1].className = "on";

	}

	function animate(offset) {

		animated = true;

		var newleft = parseInt(list.style.left) + offset;

		var time = 200; //位移总时间

		var interval = 1; //位移间隔时间

		var speed = offset / (time / interval); //每一次的位移量



		function go() {

			if ((speed < 0 && parseInt(list.style.left) > newleft) || (speed > 0 && parseInt(list.style.left) < newleft)) {

				list.style.left = parseInt(list.style.left) + speed + 'px';

				setTimeout(go, interval);

			} else {

				animated = false;

				list.style.left = newleft + 'px';

				if (newleft > -650) {

					list.style.left = -3250 + 'px';

				}

				if (newleft < -3250) {

					list.style.left = -650 + 'px';

				}

			}

		}

		go();

	}

	function play() {

		timer = setInterval(function() {

			next.onclick();

		}, 2500);

	}

	function stop() {

		clearInterval(timer);

	}



	next.onclick = function() {

		if (index == 5) {

			index = 1;

		} else {

			index += 1;

		}

		showButton();

		if (animated == false) {

			animate(-650);

		}

	}

	pre.onclick = function() {

		if (index == 1) {

			index = 5;

		} else {

			index -= 1;

		}

		showButton();

		if (animated == false) {

			animate(650);

		}

	}



	for (var i = 0; i < buttons.length; i++) {

		buttons[i].onclick = function() {

			if (this.className == 'on') {

				return;

			}

			var myIndex = parseInt(this.getAttribute('index'));

			var offset = -650 * (myIndex - index);



			index = myIndex;

			showButton();

			if (animated == false) {

				animate(offset);

			}

		}

	}



	container.onmouseover = stop;

	container.onmouseout = play;

	play();

}
