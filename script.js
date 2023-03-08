const options = {
  bottom: '20px', 
  right: '28px', 
  left: 'unset', 
  time: '0.5s', 
  mixColor: '#fff', 
  backgroundColor: '#fff', 
  buttonColorDark: '#100f2c',  
  buttonColorLight: '#fff', 
  saveInCookies: false, 
  label: '🌓', 
  autoMatchOsTheme: true 
}

const darkmode = new Darkmode(options);
darkmode.showWidget();

function kaydir() {
var div = document.getElementById("gt");
  div.style.transform = "translateX(0px)";
}

function removeChecked() {
			var checkbox = document.getElementById("menu-toggle");
			if (checkbox.checked) {
				checkbox.checked = false;
			}
}
function scrollToLink() {
			window.scrollBy(0, 0);
		}