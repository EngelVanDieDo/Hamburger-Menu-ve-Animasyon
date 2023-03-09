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
		let activeIndex = 0;

const groups = document.getElementsByClassName("card-group");

const handleLoveClick = () => {
  const nextIndex = activeIndex + 1 <= groups.length - 1 ? activeIndex + 1 : 0;
  
  const currentGroup = document.querySelector(`[data-index="${activeIndex}"]`),
        nextGroup = document.querySelector(`[data-index="${nextIndex}"]`);
        
  currentGroup.dataset.status = "after";
  
  nextGroup.dataset.status = "becoming-active-from-before";
  
  setTimeout(() => {
    nextGroup.dataset.status = "active";
    activeIndex = nextIndex;
  });
}

const handleHateClick = () => {
  const nextIndex = activeIndex - 1 >= 0 ? activeIndex - 1 : groups.length - 1;
  
  const currentGroup = document.querySelector(`[data-index="${activeIndex}"]`),
        nextGroup = document.querySelector(`[data-index="${nextIndex}"]`);
  
  currentGroup.dataset.status = "before";
  
  nextGroup.dataset.status = "becoming-active-from-after";
  
  setTimeout(() => {
    nextGroup.dataset.status = "active";
    activeIndex = nextIndex;
  });
}