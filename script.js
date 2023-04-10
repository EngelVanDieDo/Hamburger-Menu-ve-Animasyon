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
  autoMatchOsTheme: false 
}

const darkmode = new Darkmode(options);
darkmode.showWidget();

function removeChecked() {
			var checkbox = document.getElementById("menu-toggle");
			if (checkbox.checked) {
				checkbox.checked = false;
			}
}
function activeChecked() {
			var checkbox = document.getElementById("menu-toggle");
			if (!checkbox.checked) {
				checkbox.checked = true;
			}
}
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
function scrollToElement(event) {

  event.preventDefault();


  const targetElementId = "gt";

  const targetElement = document.getElementById(targetElementId);
  const targetElementPosition = targetElement.getBoundingClientRect().top;

  window.scroll({
    top: targetElementPosition,
    behavior: "smooth"
  });
}
function scrollToElement1(event) {
  
   event.preventDefault();


  const targetElementId = "cardid";


   const targetElement = document.getElementById(targetElementId);
   const targetElementPosition = targetElement.getBoundingClientRect().top;


  window.scroll({
     top: targetElementPosition,
     behavior: "smooth"
  });
}
function baglan() {
  window.location.href = "/sohbet";
}
var h5mzaölsün= document.getElementById("ayır");
h5mzaölsün.addEventListener('click', function(e) {
  var tıklananIcerik = e.target.textContent;
  console.log(tıklananIcerik); 
});